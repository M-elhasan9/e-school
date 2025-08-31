<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


public function enrollments()
{
    return $this->hasMany(Enrollment::class, 'user_id');
}

public function isAdmin()
{
    return $this->role === 'admin';
}

public function isStudent()
{
    return $this->role === 'student';
}
    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
        // ->withPivot(['role', 'enrolled_at']); // if you added pivot fields
    }

    // Handy scopes if you want to separate teachers/students
    public function teachingCourses()
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps()
            ->where('is_teacher', true);
    }

    public function learningCourses()
    {
        return $this->belongsToMany(Course::class)
            ->withTimestamps()
            ->where('is_teacher', false);
    }

}
