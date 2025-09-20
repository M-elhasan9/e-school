<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    // Blog sayfası: tüm postları göster
    public function index()
    {
        $posts = Post::orderBy('published_at', 'desc')->paginate(6);
        return view('home.blog', compact('posts'));
    }
}
