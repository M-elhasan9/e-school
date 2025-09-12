<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'price',
        'duration',
        'enrolled_students',
        'status',
        'is_featured'
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // pivot: enrollments
    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withTimestamps(); // enrolled_at kaldırıldı
    }

    // Tekil öğretmen (teacher_id üzerinden)
   public function teacher()
{
    return $this->belongsTo(\App\Models\User::class, 'teacher_id');
}


    /*
     * === Öğrenci ve Öğretmen ilişkileri ===
     * (İki farklı yazımı da koruduk)
     */

    // Versiyon 1: pivot tabloyu elle tanımlayan
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id')
                    ->wherePivot('is_teacher', 0);
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id')
                    ->wherePivot('is_teacher', 1);
    }

    // Versiyon 2: users() ilişkisi üzerinden filtreleyen
    public function studentsAlt()
    {
        return $this->users()->wherePivot('is_teacher', false);
    }

    public function teachersAlt()
    {
        return $this->users()->wherePivot('is_teacher', true);
    }
}
