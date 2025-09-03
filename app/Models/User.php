<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_teacher', // eklediğimiz sütun
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_teacher' => 'boolean',
        ];
    }

    // Bir öğrencinin tüm kayıtları (Enrollment)
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'user_id');
    }

    // Kullanıcının dersleri (öğrenci veya öğretmen olabilir)
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withTimestamps();
                    // ->withPivot(['enrolled_at']); // opsiyonel
    }

    // Öğretmen olarak verdiği dersler
    public function teachingCourses()
    {
        return $this->belongsToMany(Course::class)
                    ->withTimestamps()
                    ->wherePivot('is_teacher', true);
    }

    // Öğrenci olarak aldığı dersler
    public function learningCourses()
    {
        return $this->belongsToMany(Course::class)
                    ->withTimestamps()
                    ->wherePivot('is_teacher', false);
    }

    // Kullanıcının dersleri (lesson_user pivot tablosu ile)
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_user')
                    ->withTimestamps()
                    ->withPivot(['status','completed_at']); // opsiyonel
    }
}
