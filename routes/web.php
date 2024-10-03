<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister'])->name('postregister');

route::get('/', function () {
    $activeMenu = 'home';
    return view('welcome', compact('activeMenu'));
});

Route::middleware(['auth', 'authorize:ADM'])->group(function () {
    Route::prefix('level')->name('level.')->group(function () {
        Route::get('/', [LevelController::class, 'index']);
        Route::post('/list', [LevelController::class, 'list']);
        Route::get('/create', [LevelController::class, 'create']);
        Route::delete('/reset', [LevelController::class, 'reset']);
        Route::post('/store', [LevelController::class, 'store']);
        Route::get('/{id}/edit', [LevelController::class, 'edit']);
        Route::put('/{id}/update', [LevelController::class, 'update']);
        Route::get('/{id}/delete', [LevelController::class, 'confirm']);
        Route::delete('/{id}/delete', [LevelController::class, 'delete']);
    });
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::post('/list', [CategoryController::class, 'list']);
        Route::get('/create', [CategoryController::class, 'create']);
        Route::delete('/reset', [CategoryController::class, 'reset']);
        Route::post('/store', [CategoryController::class, 'store']);
        Route::get('/{id}/edit', [CategoryController::class, 'edit']);
        Route::put('/{id}/update', [CategoryController::class, 'update']);
        Route::get('/{id}/delete', [CategoryController::class, 'confirm']);
        Route::delete('/{id}/delete', [CategoryController::class, 'delete']);
    });
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/list', [UserController::class, 'list']);
        Route::get('/create', [UserController::class, 'create']);
        Route::delete('/reset', [UserController::class, 'reset']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/{id}/edit', [UserController::class, 'edit']);
        Route::put('/{id}/update', [UserController::class, 'update']);
        Route::get('/{id}/delete', [UserController::class, 'confirm']);
        Route::delete('/{id}/delete', [UserController::class, 'delete']);
    });
});

Route::middleware(['auth', 'authorize:MHS'])->group(function () {
    route::get('/userDB', function () {
        $activeMenu = 'userDB';
        return view('dashboard.MahasiswaDB', compact('activeMenu'));
    });
    route::get('/mycourse', function () {
        $activeMenu = 'mycourse';
        return view('courses.mycourse', compact('activeMenu'));
    });
    route::get('/selectedCourse', function () {
        $activeMenu = 'selectedCourse';
        return view('courses.progress', compact('activeMenu'));
    });
    route::get('/submission', function () {
        $activeMenu = 'submission';
        return view('submissions.index', compact('activeMenu'));
    });
});

Route::middleware(['auth', 'authorize:PGJ'])->group(function () {
    route::get('/dashboard', function () {
        $activeMenu = 'dashboard';
        return view('dashboard.PengajarDB', compact('activeMenu'));
    });
    Route::prefix('courses')->name('courses.')->group(function () {
        Route::get('/', [CourseController::class, 'list']);
        Route::get('/create', [CourseController::class, 'create']);
        Route::post('/store', [CourseController::class, 'store']);
        Route::get('/{id}/edit', [CourseController::class, 'edit']);
        Route::put('/{id}/update', [CourseController::class, 'update']);
        Route::delete('/{id}/delete', [CourseController::class, 'delete']);
        // Tambah Data Lesson Baru
        Route::get('/{id}/create', [LessonController::class, 'create']);
    });
    Route::prefix('lesson')->name('lesson.')->group(function () {
        Route::get('/', [LessonController::class, 'index']);
        Route::post('/list', [LessonController::class, 'list']);
        Route::post('/store', [LessonController::class, 'store']);
        Route::get('/{id}/edit', [LessonController::class, 'edit']);
        Route::put('/{id}/update', [LessonController::class, 'update']);
        Route::delete('/{id}/delete', [LessonController::class, 'delete']);
    });
});
