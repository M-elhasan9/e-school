<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['courses', 'lessons'])->paginate(10); // 10 kullanıcı per page
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $courses = Course::all();
        $lessons = Lesson::all();

        return view('admin.users.create', compact('courses', 'lessons'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_teacher = $request->is_teacher ?? 0;
        $user->password = bcrypt(Str::random(10));
        $user->save();

        // Courses ekleme
        if ($request->course_ids) {
            if ($user->is_teacher) {
                $syncData = [];
                foreach ($request->course_ids as $courseId) {
                    $syncData[$courseId] = ['is_teacher' => 1];
                }
                $user->courses()->sync($syncData);
            } else {
                $syncData = [];
                foreach ($request->course_ids as $courseId) {
                    $syncData[$courseId] = ['is_teacher' => 0];
                }
                $user->courses()->sync($syncData);
            }
        }

        // Lessons ekleme
        if ($request->lesson_ids) {
            $user->lessons()->sync($request->lesson_ids);
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $courses = Course::orderBy('title')->get();
        $lessons = Lesson::orderBy('title')->get();

        return view('admin.users.edit', compact('user', 'courses', 'lessons'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_teacher = $request->is_teacher;
        $user->save();

        // Courses güncelleme
        if ($request->has('course_ids')) {
            if ($user->is_teacher) {
                $syncData = [];
                foreach ($request->course_ids as $courseId) {
                    $syncData[$courseId] = ['is_teacher' => 1];
                }
                $user->courses()->sync($syncData);
            } else {
                $syncData = [];
                foreach ($request->course_ids as $courseId) {
                    $syncData[$courseId] = ['is_teacher' => 0];
                }
                $user->courses()->sync($syncData);
            }
        } else {
            $user->courses()->sync([]);
        }

        // Lessons güncelleme
        if ($request->has('lesson_ids')) {
            $user->lessons()->sync($request->lesson_ids);
        } else {
            $user->lessons()->sync([]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
