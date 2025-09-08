<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

// Admin Controller importları
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UserController;

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // Çıkış yaptıktan sonra ana sayfaya yönlendir
})->name('logout');

// Ana sayfa
Route::get('/', [HomeController::class, 'index'])->name('home');

// Genel sayfalar
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/courses/{id}', [HomeController::class, 'showCourse'])->name('courses.show');
Route::get('/details', [HomeController::class, 'details'])->name('details');

// Student sayfaları (sadece auth ile korunan)
Route::middleware(['auth'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/courses/{id}', [StudentController::class, 'viewCourse'])->name('student.course');
    Route::get('/student/lessons/{id}', [StudentController::class, 'viewLesson'])->name('student.lesson');
});

// Admin sayfaları (sadece auth ile korunan)
Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');

    // Courses CRUD
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // Lessons CRUD
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/lessons', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');

    // Users CRUD
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});


// Ekstra auth ve settings dosyaları
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
