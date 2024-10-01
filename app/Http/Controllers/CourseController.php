<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\CourseModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pelajaran',
            'list' => ['Home', 'Daftar Pelajaran']
        ];
        $page = (object) [
            'title' => ""
        ];
        $activeMenu = 'courses';
        $user = UserModel::all();
        $category = CategoryModel::all();
        $courses = CourseModel::all();
        return view('courses.list', [
            'breadcrumb' => $breadcrumb,
            'user' => $user,
            'category' => $category,
            'courses' => $courses,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
    public function create()
    {
        $user = userModel::select('user_id', 'name')->get();
        $category = CategoryModel::select('category_id', 'name')->get();
        return view('courses.create', [
            'user' => $user,
            'category' => $category,
        ]);
    }
    public function store(Request $request)
    {
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'teacher' => ['required', 'integer', 'exists:m_user,user_id'],
                'category' => ['required', 'integer', 'exists:m_category,category_id'],
                'title' => ['required', 'max:150'],
                'info' => ['required', 'max:130'],
                'description' => ['required'],
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
            CourseModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }
        return redirect('/');
    }
    public function delete($id)
    {
        $course = CourseModel::find($id);
        if ($course) {
            $course->delete();
            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
        }
        return response()->json(['status' => false, 'message' => 'Data tidak ditemukan.']);
    }

    public function filterByCategory(Request $request)
    {
        $categoryId = $request->get('category_id');

        // Ambil courses berdasarkan category_id
        $courses = CourseModel::where('category', $categoryId)->get();
        $categories = CategoryModel::all();

        // Buat tampilan course yang difilter
        $html = view('courses.filtered', compact('courses', 'categories'))->render();

        return response()->json(['html' => $html]);
    }

}
