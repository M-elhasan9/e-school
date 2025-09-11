<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    // Dashboard → öğrencinin kayıtlı kursları
    public function dashboard() {
        $user = Auth::user();
        $courses = $user->courses; // Enrollments ilişkisi üzerinden
        return view('student.dashboard', compact('courses'));
    }

    // Kurs görüntüleme
    public function viewCourse($id) {
        $course = Course::with('lessons')->findOrFail($id);
        return view('student.course', compact('course'));
    }

    // Ders görüntüleme
   public function viewLesson($id)
    {
        $lesson = Lesson::with('course')->findOrFail($id);
        return view('student.lesson', compact('lesson'));
    }
}

