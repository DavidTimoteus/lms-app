<?php

namespace App\Http\Controllers;

use App\Models\CourseModel;
use App\Models\LessonModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Topik Pelajaran',
            'list' => ['Home', 'Daftar Topik Pelajaran']
        ];
        $page = (object) [
            'title' => ""
        ];
        $activeMenu = 'lesson';
        $courses = CourseModel::all();
        return view('lessons.index', [
            'breadcrumb' => $breadcrumb,
            'courses' => $courses,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }
    public function list()
    {
        $lesson = LessonModel::select('lesson_id', 'lesson_title', 'modul_path', 'progress_percentage', 'lesson_score', 'course')
            ->with('courses');

        return DataTables::of($lesson)
            ->addIndexColumn()
            ->addColumn('modul', function ($lesson) {
                if ($lesson->modul_path) {
                    $fileUrl = Storage::url($lesson->modul_path);
                    $extension = pathinfo($lesson->modul_path, PATHINFO_EXTENSION);
                    if ($extension === 'pdf') {
                        $label = 'Lihat Modul PDF';
                        return '<a href="' . $fileUrl . '" target="_blank">' . $label . '</a>';
                    }
                } else {
                    return 'Tidak Ada Modul';
                }
            })
            ->addColumn('aksi', function ($lesson) {
                $btn = '<button onclick="modalAction(\'' . url('/lesson/' . $lesson->lesson_id . '/edit') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/lesson/' . $lesson->lesson_id . '/delete') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['modul', 'aksi'])
            ->make(true);
    }

    public function create(string $id)
    {
        $course = CourseModel::find($id);
        return view('lessons.create', [
            'course' => $course
        ]);
    }
    public function store(Request $request)
    {
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'course' => ['required', 'integer', 'exists:m_course,course_id'],
                'lesson_title' => ['required', 'max:150'],
                'modul_path' => ['required', 'file', 'mimes:pdf,docx,xlsx']
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            // Cek dan simpan file modul
            if ($request->hasFile('modul_path')) {
                $file = $request->file('modul_path'); // Ambil file yang diunggah
                $path = $file->store('uploads/moduls', 'public'); // Simpan file ke direktori

                // Simpan data ke database
                LessonModel::create([
                    'course' => $request->course,
                    'lesson_title' => $request->lesson_title,
                    'modul_path' => $path // Simpan path file sebagai string
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }

        return redirect('/courses');
    }
    public function edit(string $id)
    {
        $lesson = LessonModel::with('courses')->find($id);
        return view('lessons.edit', [
            'lesson' => $lesson
        ]);
    }
    public function update(Request $request, $id)
    {
        Log::info('Request data:', $request->all());
        Log::info('Request Type:', ['is_ajax' => $request->ajax(), 'wants_json' => $request->wantsJson()]);
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'lesson_title' => ['required', 'max:150'],
                'modul_path' => ['required', 'file', 'mimes:pdf,docx,xlsx']
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $check = LessonModel::find($id);
            if ($check) {
                if ($request->hasFile('modul_path')) {
                    $file = $request->file('modul_path');
                    $path = $file->store('uploads/moduls', 'public');
                    $check->update([
                        'lesson_title' => $request->lesson_title,
                        'modul_path' => $path
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
        return redirect('/lesson');
    }
    public function confirm($id)
    {
        $lesson = LessonModel::find($id);
        return view('lessons.confirm')->with('lesson', $lesson);
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $lesson = LessonModel::find($id);
            if ($lesson) {
                if ($lesson) {
                    $lesson->delete();
                    return response()->json(['status' => true, 'message' => 'Topik Pelajaran Dihapus.']);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/lesson');
    }
}
