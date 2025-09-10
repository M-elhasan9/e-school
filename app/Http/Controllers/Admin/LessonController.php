<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
class LessonController extends Controller
{
    // /admin/courses/{course}/lessons
    public function index()
{
    $lessons = Lesson::with('course')->paginate(10); // Her sayfada 10 kayıt
    return view('admin.lessons.index', compact('lessons'));
}


    public function create()
    {
        $courses = Course::orderBy('title')->get();
        return view('admin.lessons.create', compact('courses'));
    }

    public function store(Request $request)
    {
         $data=new Lesson;
         $data->title = $request->title;
         $data->content = $request->content;
         $data->course_id= $request->course_id;
         $data->duration = $request->duration;
         $data->status = $request->status;
         $image=$request->image;
         $data->video_url = $request->video_url;
         if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('Lesson',$imagename);
            $data->image=$imagename;
         }
         // Attachment
if ($request->hasFile('attachment')) {
    $filename = time() . '.' . $request->attachment->getClientOriginalExtension();
    $request->attachment->storeAs('attachments', $filename, 'public');
    $data->attachment = 'attachments/' . $filename;
}
         $data->save();
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

        $data = Lesson::findOrFail($id);
        $data->title = $request->title;
         $data->content = $request->content;
         $data->course_id= $request->course_id;
         $data->duration = $request->duration;
         $data->status = $request->status;
         $image=$request->image;
         $data->video_url = $request->video_url;
         if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('Lesson',$imagename);
            $data->image=$imagename;
         }
         // Attachment
if ($request->hasFile('attachment')) {
    $filename = time() . '.' . $request->attachment->getClientOriginalExtension();
    $request->attachment->storeAs('attachments', $filename, 'public');
    $data->attachment = 'attachments/' . $filename;
}
         $data->save();
        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy($id)
    {
        $data = Lesson::findOrFail($id);
        $data->delete();
        return redirect()->route('lessons.index')->with('success','Lesson deleted successfully.');
    }
}
