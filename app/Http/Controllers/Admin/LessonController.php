<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::with('course')->paginate(10);
        return view('admin.lessons.index', compact('lessons'));
    }

    public function create()
    {
        $courses = Course::orderBy('title')->get();
        return view('admin.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
        // Basit doğrulama
        $request->validate([
            'title'     => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'image'     => 'nullable|image|max:4096',
            'attachment'=> 'nullable|file|max:10240', // 10MB
            'video_url' => 'nullable|string|max:1000',
        ]);

        $lesson = new Lesson();
        $lesson->title      = $request->title;
        $lesson->content    = $request->content;
        $lesson->course_id  = $request->course_id;
        $lesson->duration   = $request->duration;
        $lesson->status     = $request->status;
        $lesson->video_url  = $request->video_url;

        // Resim (public/Lesson)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Lesson'), $imagename);
            $lesson->image = $imagename;
        }

        // Attachment -> storage disk 'public' (storage/app/public/attachments)
        if ($request->hasFile('attachment')) {
            $filename = time() . '_' . Str::random(6) . '.' . $request->attachment->getClientOriginalExtension();
            $request->attachment->storeAs('attachments', $filename, 'public');
            $lesson->attachment = 'attachments/' . $filename;
        }

        $lesson->save();

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $courses = Course::orderBy('title')->get();
        return view('admin.lessons.edit', compact('lesson','courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'image'     => 'nullable|image|max:4096',
            'attachment'=> 'nullable|file|max:10240',
            'video_url' => 'nullable|string|max:1000',
        ]);

        $lesson = Lesson::findOrFail($id);
        $lesson->title      = $request->title;
        $lesson->content    = $request->content;
        $lesson->course_id  = $request->course_id;
        $lesson->duration   = $request->duration;
        $lesson->status     = $request->status;
        $lesson->video_url  = $request->video_url;

        // Yeni resim geldi ise eskiyi silip değiştirme (isteğe bağlı)
        if ($request->hasFile('image')) {
            // eski dosya varsa sil (görevsel, dikkat: kontrollü)
            if ($lesson->image && file_exists(public_path('Lesson/'.$lesson->image))) {
                @unlink(public_path('Lesson/'.$lesson->image));
            }
            $image = $request->file('image');
            $imagename = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('Lesson'), $imagename);
            $lesson->image = $imagename;
        }

  

        $lesson->save();

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }


    public function destroy($id)
    {
        $data = Lesson::findOrFail($id);
        $data->delete();
        return redirect()->route('lessons.index')->with('success','Lesson deleted successfully.');
    }
}
