<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
      // Dersin ait olduğu kurs
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
