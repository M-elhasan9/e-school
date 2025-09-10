<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'comment' => 'required|string',
            'stars' => 'required|integer|min:1|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return back()->with('success', 'Recent Addead Successfully!');
    }
}
