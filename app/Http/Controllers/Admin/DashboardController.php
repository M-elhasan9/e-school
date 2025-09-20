<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Toplam öğrenciler
        $totalStudents = User::where('is_teacher', 0)->count();

        // Toplam öğretmenler
        $totalTeachers = User::where('is_teacher', 1)->count();

        // Toplam aktif kurslar
        $totalCourses = Course::count();

        // Bar chart için (Top 5 kurs)
        $courses = Course::withCount(['students as students_count', 'teachers as teachers_count'])
                         ->orderByDesc('students_count')
                         ->take(5)
                         ->get();

        $chartLabels = $courses->pluck('title'); // Kurs isimleri
        $studentData = $courses->pluck('students_count');
        $teacherData = $courses->pluck('teachers_count');

        // Login kaynakları
        $loginSources = [
            'Students' => $totalStudents,
            'Teachers' => $totalTeachers,
        ];

        $loginLabels = array_keys($loginSources);
        $loginData = array_values($loginSources);

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'chartLabels',
            'studentData',
            'teacherData',
            'loginLabels',
            'loginData'
        ));
    }
}
