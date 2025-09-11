@extends('layouts.app')
@section('title', $user->name . ' | Instructor')

@section('content')
<section class="ftco-section bg-light">
  <div class="container">
    <div class="mb-5 text-center">
      <img src="{{ $user->image ? asset('User/'.$user->image) : asset('images/default-teacher.jpg') }}"
           alt="{{ $user->name }}" style="width:120px;height:120px;object-fit:cover;border-radius:50%;">
      <h2 class="mt-3">{{ $user->name }}</h2>
      <div class="text-muted">{{ $user->email }}</div>
    </div>

    <h4 class="mb-3">Courses by {{ $user->name }}</h4>
    <div class="row">
      @forelse ($user->teachingCourses as $course)
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="project-wrap border rounded overflow-hidden shadow-sm">
            <a href="{{ route('courses.show', $course->id) }}" class="d-block h-40"
               style="background:center/cover no-repeat url('{{ $course->image ? asset('Course/'.$course->image) : asset('images/default-course.jpg') }}');"></a>
            <div class="p-3">
              <h5 class="mb-1"><a href="{{ route('courses.show', $course->id) }}">{{ $course->title }}</a></h5>
              <div class="small text-muted">Lessons: {{ $course->lessons_count ?? $course->lessons()->count() }}</div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-muted">No courses yet.</div>
      @endforelse
    </div>
  </div>
</section>
@endsection
