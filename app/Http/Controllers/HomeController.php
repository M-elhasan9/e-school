<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Testimonial;

class HomeController extends Controller
{
    // Ana sayfa
    public function index()
    {
        // Öne çıkan kurslar
        $featuredCourses = Course::with('teacher')
                                ->where('is_featured', true)
                                ->latest()
                                ->take(6)
                                ->get();

        // Yorumlar
        $testimonials = Testimonial::latest()->get();

        return view('home.index', compact('featuredCourses', 'testimonials'));
    }

    // Kurs listesi
    public function courses()
    {
        $courses = Course::with('teacher')
                        ->latest()  // created_at DESC
                        ->paginate(6); // her sayfada 6 kurs
        return view('home.courses', compact('courses'));
    }

    public function showCourse(Course $course)
    {
        $course->load(['lessons', 'teacher']);
        return view('home.showCourse', compact('course'));
    }

    public function instructors()
    {
        // is_teacher = 1 olan kullanıcılar + verdiği kurs sayısı
        $teachers = User::where('is_teacher', true)
                        ->withCount('teachingCourses')
                        ->orderBy('name')
                        ->paginate(9);

        return view('home.instructors', compact('teachers'));
    }

    public function showInstructor(User $user)
    {
        abort_unless($user->is_teacher, 404);

        // Eğitmenin verdiği kursları da getir (ders sayılarıyla birlikte)
        $user->load([
            'teachingCourses' => fn ($q) => $q->latest()->withCount('lessons')
        ]);

        return view('home.showInstructor', compact('user'));
    }
}
