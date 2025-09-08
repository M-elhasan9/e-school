<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    // Ana sayfa → courses gönderilmez
    public function index() {
        return view('home.index'); // ana sayfa farklı bir view
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
