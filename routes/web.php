<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\RoleMiddleware;


Route::get('/', function () {
    return Inertia::render('Welcome');
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

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
