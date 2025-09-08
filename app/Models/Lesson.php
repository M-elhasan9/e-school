<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ← ekle
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory; // ← ekle

    protected $fillable = ['title','content','course_id','order'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // opsiyonel: ilerleme takibi pivot ile
    public function users()
    {
        return $this->belongsToMany(User::class, 'lesson_user')
                    ->withTimestamps()
                    ->withPivot(['status','completed_at']);
    }
}
