<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Testimonial; 
class HomeController extends Controller
{
    // Ana sayfa → courses gönderilmez


public function index() {
    $testimonials = Testimonial::latest()->get(); // yorumları veritabanından al
    return view('home.index', compact('testimonials')); // Blade'e gönder
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
