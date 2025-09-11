<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'course_id',
        'order',
        'video_url',    // eklendi
        'attachment'    // eklendi
    ];

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
