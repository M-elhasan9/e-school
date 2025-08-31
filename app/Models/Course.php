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
        return $this->belongsToMany(User::class, 'enrollments');
    }
}
