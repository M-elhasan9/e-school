<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    // Enrollment -> User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Enrollment -> Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
