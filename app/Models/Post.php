<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;  // Bu satır çok önemli!

    protected $fillable = [
        'title',
        'content',
        'image',
        'author',
        'published_at',
    ];
    protected $casts = [
        'published_at' => 'datetime', // Bu satır, format() metodunu kullanabilmek için
    ];
}
