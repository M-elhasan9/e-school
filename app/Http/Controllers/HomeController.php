<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Post;

class HomeController extends Controller
{
    // Ana sayfa → courses gönderilmez
    public function index() {
    $recentPosts = Post::latest()->take(3)->get();
    return view('home.index', compact('recentPosts'));
}

    // Kurs listesi
    public function courses() {
        $courses = Course::all();  // tüm kursları al
        return view('home.courses', compact('courses')); // Blade dosyasına courses gönder
    }

    // Kurs detay sayfası
    public function showCourse($id) {
        $course = Course::with('lessons')->findOrFail($id);
        return view('home.showCourse', compact('course')); // örnek detay sayfası
    }
}
