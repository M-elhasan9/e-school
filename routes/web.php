<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\RoleMiddleware;

// Admin Controller importları
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UserController;

// Ana sayfa
Route::get('/', fn() => view('home.index'))->name('home');

// Dashboard (öğrenci genel dashboard)
Route::get('dashboard', fn() => view('student.dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Home sayfaları
Route::get('/courses', fn() => view('home.courses'))->name('courses');
Route::get('/details', fn() => view('home.details'))->name('details');

// Student sayfaları
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', fn() => view('student.dashboard'))->name('dashboard');
    Route::get('/course', fn() => view('student.course'))->name('course');
    Route::get('/lesson', fn() => view('student.lesson'))->name('lesson');
});

// Admin sayfaları
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

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

// Role bazlı test (opsiyonel)
Route::get('/student', fn() => 'Welcome, Student!')
    ->middleware(RoleMiddleware::class.':student');

// Auth ve settings routeleri
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
