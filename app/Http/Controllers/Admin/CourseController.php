<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller

{public function index()
{
    $courses = Course::paginate(10); // Sayfa başına 10 kurs
    return view('admin.courses.index', compact('courses'));
}


    public function create()
{
    $teachers = User::where('is_teacher', 1)->orderBy('name')->get();
    return view('admin.courses.create', compact('teachers'));
}

    public function store(Request $request)
    {
         $data=new Course;
         $data->title = $request->title;
         $data->description = $request->description;
         $data->teacher_id= $request->teacher_id;
         $data->duration = $request->duration;
         $data->status = $request->status;
         $data->price = $request->price;
         $data->enrolled_students = $request->enrolled_students;
         $image=$request->image;
         if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('Course',$imagename);
            $data->image=$imagename;
         }
         $data->save();
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = User::where('is_teacher', 1)->orderBy('name')->get();
        return view('admin.courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $data = Course::findOrFail($id);
        $data->title = $request->title;
         $data->description = $request->description;
         $data->teacher_id= $request->teacher_id;
         $data->duration = $request->duration;
         $data->status = $request->status;
         $data->price = $request->price;
         $data->enrolled_students = $request->enrolled_students;
         $image=$request->image;
         if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('Course',$imagename);
            $data->image=$imagename;
         }
         $data->save();
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $data = Course::findOrFail($id);
        $data->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
