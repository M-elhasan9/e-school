<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         // Önce kullanıcıları üret
        $teachers = User::factory(5)->teacher()->create();   // 5 öğretmen
        $students = User::factory(20)->student()->create();  // 20 öğrenci

        // Öğretmenlere kurslar verelim
        $teachers->each(function ($teacher) use ($students) {
            // Her öğretmene 3 kurs
            $courses = Course::factory(3)->create([
                'teacher_id' => $teacher->id,
            ]);

            // Her kursa dersler ekle
            $courses->each(function ($course) use ($students) {
                Lesson::factory(rand(5, 10))->create([
                    'course_id' => $course->id,
                ]);

                // Öğrencilerden rastgele 5-10 tanesini kursa kaydet
                $enrolledStudents = $students->random(rand(5, 10));
                $course->users()->attach($enrolledStudents);
            });
        });

        // Admin kullanıcı
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'is_teacher' => true,
            ]
        );

        // Demo öğrenci kullanıcı
        User::firstOrCreate(
            ['email' => 'student@example.com'],
            [
                'name' => 'Student User',
                'password' => Hash::make('password'),
                'is_teacher' => false,
            ]
        );
        // Blog yazıları
Post::factory(10)->create();

    }
}
