<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\RoleMiddleware;


/*Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');*/
Route::get('/', function () {
    return view('home.index');
})->name('home');
Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', function () {
    return 'Welcome, Admin!';
})->middleware(RoleMiddleware::class.':admin');

Route::get('/student', function () {
    return 'Welcome, Student!';
})->middleware(RoleMiddleware::class.':student');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
})->name('admin.dashboard');


Route::get('/admin/courses/index', function () {
    return view('admin.courses.index');
})->name('courses');
Route::get('/admin/courses/create', function () {
    return view('admin.courses.create');
})->name('create_courses');
Route::get('/admin/courses/edit', function () {
    return view('admin.courses.edit');
})->name('edit_courses');

Route::get('/admin/lessons/index', function () {
    return view('admin.lessons.index');
})->name('lessons');
Route::get('/admin/lessons/create', function () {
    return view('admin.lessons.create');
})->name('create_lessons');
Route::get('/admin/lessons/edit', function () {
    return view('admin.lessons.edit');
})->name('edit_lessons');

Route::get('/admin/users/index', function () {
    return view('admin.users.index');
})->name('users');
Route::get('/admin/users/create', function () {
    return view('admin.users.create');
})->name('create_users');
Route::get('/admin/users/edit', function () {
    return view('admin.users.edit');
})->name('edit_users');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
