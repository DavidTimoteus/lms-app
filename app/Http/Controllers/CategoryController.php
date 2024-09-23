<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CategoryModel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori Pelajaran',
            'list' => ['Home', 'Data Pelajaran']
        ];
        $page = (object) [
            'title' => "Data kategori pelajaran adalah pengelompokan informasi yang mengidentifikasi jenis atau tema dari suatu pelajaran"
        ];
        $activeMenu = 'category';
        $category = CategoryModel::all();
        //Set menu yang sedang aktif
        return view('category.index', [
            'breadcrumb' => $breadcrumb,
            'category' => $category,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list()
    {
        $categorys = CategoryModel::select('category_id', 'name');
        return DataTables::of($categorys)
            ->addIndexColumn()
            ->addColumn(
                'aksi',
                function ($category) {
                    $btn = '<button onclick="modalAction(\'' . url('/category/' . $category->category_id . '/edit') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                    $btn .= '<button onclick="modalAction(\'' . url('/category/' . $category->category_id . '/delete') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';

                    return $btn;
                }
            )
            ->rawColumns(['aksi'])
            ->make(true);
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'name' => ['required', 'min:3', 'max:50', 'unique:m_category,name']
            ];
            $messages = [
                'name.unique' => 'Nama Kategori Sudah Ada !. Silakan tambahkan yang lain.',
                'name.required' => 'Nama Kategori wajib diisi.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            CategoryModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }
        return redirect('/');
    }
    public function edit(string $id)
    {
        $category = CategoryModel::find($id);
        return view('category.edit')->with('category', $category);
    }
    public function update(Request $request, $id)
    {
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'name' => ['required', 'min:3', 'max:50', 'unique:m_category,name']
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }
            $check = CategoryModel::find($id);
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
        $category = CategoryModel::find($id);
        return view('category.confirm')->with('category', $category);
    }
    public function delete(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $category = CategoryModel::find($id);
            if ($category) {
                $category->delete();
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
            CategoryModel::query()->delete();
            return response()->json([
                'status' => true,
                'message' => 'Semua data category berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage(),
            ]);
        }
    }
}
