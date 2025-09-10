<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','teacher_id','price','duration','enrolled_students','status'];

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


    // tekil öğretmen
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Course.php
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

}

