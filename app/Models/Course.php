<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','teacher_id'];

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

    // yardımcı: sadece öğrenciler (is_teacher alanı varsa)
    public function students()
    {
        return $this->users()->where('is_teacher', false);
    }

    public function teachers()
    {
        return $this->users()->where('is_teacher', true);
    }
}

