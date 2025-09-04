<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/'); // Çıkış yaptıktan sonra ana sayfaya yönlendir
})->name('logout');

// Genel sayfalar
Route::get('/', [HomeController::class, 'index'])->name('home'); // ana sayfa
Route::get('/courses', [HomeController::class, 'courses'])->name('courses'); // kurs listesi
Route::get('/courses/{id}', [HomeController::class, 'showCourse'])->name('courses.show'); // kurs detay
Route::get('/details', [HomeController::class, 'details'])->name('details'); // eğer detay sayfası controller ile yapılacaksa

// Student panel (middleware ile koru → sadece öğrenci)
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/student/courses/{id}', [StudentController::class, 'viewCourse'])->name('student.course');
    Route::get('/student/lessons/{id}', [StudentController::class, 'viewLesson'])->name('student.lesson');
});

// Admin panel
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Admin Courses
    Route::prefix('admin/courses')->group(function () {
        Route::get('/', function () { return view('admin.courses.index'); })->name('admin.courses.index');
        Route::get('/create', function () { return view('admin.courses.create'); })->name('admin.courses.create');
        Route::get('/edit', function () { return view('admin.courses.edit'); })->name('admin.courses.edit');
    });

    // Admin Lessons
    Route::prefix('admin/lessons')->group(function () {
        Route::get('/', function () { return view('admin.lessons.index'); })->name('admin.lessons.index');
        Route::get('/create', function () { return view('admin.lessons.create'); })->name('admin.lessons.create');
        Route::get('/edit', function () { return view('admin.lessons.edit'); })->name('admin.lessons.edit');
    });

    // Admin Users
    Route::prefix('admin/users')->group(function () {
        Route::get('/', function () { return view('admin.users.index'); })->name('admin.users.index');
        Route::get('/create', function () { return view('admin.users.create'); })->name('admin.users.create');
        Route::get('/edit', function () { return view('admin.users.edit'); })->name('admin.users.edit');
    });
    
});

// Laravel Breeze / Fortify gibi auth routeleri
require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
