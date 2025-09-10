<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'student_name',
        'position',
        'image',
        'comment',
        'stars',
    ];
}
