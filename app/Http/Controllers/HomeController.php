<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Testimonial; // senin
use App\Models\Post;        // arkadaşının

class HomeController extends Controller
{
    // Ana sayfa
    public function index()
    {
        // Öne çıkan kurslar (senin)
        $featuredCourses = Course::with('teacher')
                                ->where('is_featured', true)
                                ->latest()
                                ->take(6)
                                ->get();

        // Yorumlar (senin)
        $testimonials = Testimonial::latest()->get();

        // Son paylaşımlar (arkadaşının)
        $recentPosts = Post::latest()->take(3)->get();

        // Tüm verileri view'e gönder
        return view('home.index', compact('featuredCourses', 'testimonials', 'recentPosts'));
    }

    // Kurs listesi
    public function courses()
    {
        $courses = Course::with('teacher')
                        ->latest()
                        ->paginate(6);
        return view('home.courses', compact('courses'));
    }

    // Tek kurs gösterimi
    public function showCourse(Course $course)
    {
        $course->load(['lessons', 'teacher']);
        return view('home.showCourse', compact('course'));
    }

    // Eğitmenler
    public function instructors()
    {
        $teachers = User::where('is_teacher', true)
                        ->withCount('teachingCourses')
                        ->orderBy('name')
                        ->paginate(9);

        return view('home.instructors', compact('teachers'));
    }

    // Tek eğitmen sayfası
    public function showInstructor(User $user)
    {
        abort_unless($user->is_teacher, 404);

        $user->load([
            'teachingCourses' => fn ($q) => $q->latest()->withCount('lessons')
        ]);

        return view('home.showInstructor', compact('user'));
    }
}
