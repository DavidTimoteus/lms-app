<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pengguna',
            'list' => ['Home', 'Data Pengguna']
        ];
        $page = (object) [
            'title' => "Daftar Pengguna terkait seseorang yang terdaftar dan memiliki akses pada sistem"
        ];
        $activeMenu = 'user';
        $level = LevelModel::all();
        return view('user.index', [
            'breadcrumb' => $breadcrumb,
            'level' => $level,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list(Request $request)
    {
        $user = UserModel::select('user_id', 'email', 'name', 'level_id', 'created_at', 'updated_at')->with('level');
        if ($request->level_id) {
            $user->where('level_id', $request->level_id);
        }
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn(
                'aksi',
                function ($user) {
                    $btn = '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/edit') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                    $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/delete') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                    return $btn;
                }
            )
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        $level = LevelModel::select('level_id', 'level_name')->get();
        return view('user.create')->with('level', $level);
    }

    public function store(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => ['required', 'integer', 'exists:m_level,level_id'],
                'email' => ['required', 'email', 'min:4', 'max:50', 'unique:m_user,email'],
                'name' => ['required', 'min:5', 'max:100'],
                'password' => ['required', 'min:8', 'max:20']
            ];
            Log::info('Isi Validator:', $request->all());
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            UserModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }
        return redirect('/');
    }
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_name')->get();

        return view('user.edit')->with('user', $user)->with('level', $level);
    }
    public function update(Request $request, $id)
    {
        // cek apakah request dari ajax
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => ['required', 'integer', 'exists:m_level,level_id'],
                'email' => ['required', 'min:4', 'max:50', 'unique:m_user,email,' . $id . ',user_id'],
                'name' => ['required', 'min:5', 'max:100'],
                'password' => [
                    'nullable',
                    'min:8',
                    'max:20'
                ]
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            $check = UserModel::find($id);
            if ($check) {
                if (!$request->filled('password')) {
                    $request->request->remove('password');
                } else {
                    $request->merge(['password' => Hash::make($request->password)]);
                }

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
        $user = UserModel::find($id);
        return view('user.confirm')->with('user', $user);
    }
    public function delete(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = UserModel::find($id);
            if ($user) {
                $user->delete();
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
}
