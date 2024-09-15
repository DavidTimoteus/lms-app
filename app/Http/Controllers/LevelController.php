<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\LevelModel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level Pengguna',
            'list' => ['Home', 'Data Level']
        ];
        $page = (object) [
            'title' => "Level pengguna menunjukkan peran dan hak akses seseorang dalam sistem, seperti 'Admin', 'Siswa', atau 'Pengajar'."
        ];
        $activeMenu = 'level';
        $level = LevelModel::all();
        //Set menu yang sedang aktif
        return view('level.index', [
            'breadcrumb' => $breadcrumb,
            'level' => $level,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list()
    {
        $levels = LevelModel::select('level_id', 'level_code', 'level_name');
        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn(
                'aksi',
                function ($level) {
                    $btn = '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/edit') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                    $btn .= '<button onclick="modalAction(\'' . url('/level/' . $level->level_id . '/delete') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';

                    return $btn;
                }
            )
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_code' => ['required', 'string', 'min:2', 'max:10', 'unique:m_level,level_code'],
                'level_name' => ['required', 'min:3', 'max:100']
            ];
            $messages = [
                'level_code.unique' => 'Kode Level sudah ada. Silakan gunakan kode yang lain.',
                'level_name.required' => 'Nama Level wajib diisi.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            LevelModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }
        return redirect('/');
    }
    public function edit(string $id)
    {
        $level = LevelModel::find($id);
        return view('level.edit')->with('level', $level);
    }

    public function update(Request $request, $id)
    {
        // cek apakah request dari ajax
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_code' => ['required', 'min:3', 'max:10', 'unique:m_level,level_code,' . $id . ',level_id'],
                'level_name' => ['required', 'max:100']
            ];

            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // respon json, true: berhasil, false: gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }
            $check = LevelModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
    public function confirm($id)
    {
        $level = LevelModel::find($id);
        return view('level.confirm')->with('level', $level);
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $level = LevelModel::find($id);
            if ($level) {
                $level->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
    public function reset()
    {
        try {
            LevelModel::query()->delete();
            return response()->json([
                'status' => true,
                'message' => 'Semua data level berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage(),
            ]);
        }
    }

}
