<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\CourseModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    public function list()
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
                'image_path' => ['file', 'mimes:jpg,jpeg,png,svg'],
                'teacher' => ['required', 'integer', 'exists:m_user,user_id'],
                'category' => ['required', 'integer', 'exists:m_category,category_id'],
                'title' => ['required', 'max:150'],
                'info' => ['required', 'max:130'],
                'description' => ['required']
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

            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                $path = $file->store('uploads/moduls', 'public');

                CourseModel::create([
                    'image_path' => $path,
                    'teacher' => $request->teacher,
                    'category' => $request->category,
                    'title' => $request->title,
                    'info' => $request->info,
                    'description' => $request->description
                ]);
            } else {
                CourseModel::create($request->all());
            }

            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }
        return redirect('/');
    }

    public function edit(string $id)
    {
        $course = CourseModel::find($id);
        $user = userModel::select('user_id', 'name')->get();
        $category = CategoryModel::select('category_id', 'name')->get();

        return view('courses.edit', [
            'course' => $course,
            'category' => $category,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'image_path' => ['file', 'mimes:jpg,jpeg,png,svg'],
                'category' => ['required', 'integer', 'exists:m_category,category_id'],
                'title' => ['required', 'max:150'],
                'info' => ['required', 'max:130'],
                'description' => ['required']
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $check = CourseModel::find($id);
            if ($check) {
                if ($request->hasFile('image_path')) {
                    $file = $request->file('image_path');
                    $path = $file->store('uploads/moduls', 'public');
                    $check->update([
                        'image_path' => $path,
                        'category' => $request->category,
                        'title' => $request->title,
                        'info' => $request->info,
                        'description' => $request->description
                    ]);
                } else {
                    $check->update($request->all());
                }
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

    public function delete($id)
    {
        $course = CourseModel::find($id);

        if ($course) {
            $course->lessons()->delete();
            $course->assigments()->delete();
            $course->enrolls()->delete();
            $course->delete();
            return response()->json(['status' => true, 'message' => 'Pelajaran Berhasi Dihapus.']);
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
