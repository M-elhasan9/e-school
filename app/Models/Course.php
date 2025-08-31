<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
      // Kursun dersleri
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // Kursa kayıtlı kullanıcılar (Enrollments üzerinden)

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
        // ->withPivot(['role', 'enrolled_at']); // if you added pivot fields
    }

    // Convenience relations
    public function teachers()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->where('is_teacher', true);
    }

    public function students()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->where('is_teacher', false);
    }
}
