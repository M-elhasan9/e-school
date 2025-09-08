@extends('layouts.admin')

@section('title', 'Add New User')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-plus"></i>
    </span>
    Add New User
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User Details</h4>

        <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label for="userName">Name</label>
            <input type="text" class="form-control" name="name" id="userName" placeholder="Enter user name" required>
          </div>

          <div class="form-group">
            <label for="userEmail">Email</label>
            <input type="email" class="form-control" name="email" id="userEmail" placeholder="Enter email address" required>
          </div>

          <div class="form-group">
            <label for="userRole">Role</label>
            <select class="form-control" name="is_teacher" id="userRole">
              <option value="0">Student</option>
              <option value="1">Instructor</option>
            </select>
          </div>

          <div class="form-group">
            <label for="userCourses">Courses</label>
            <select class="form-control" name="course_ids[]" id="userCourses" multiple>
              @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->title }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="userLessons">Lessons</label>
            <select class="form-control" name="lesson_ids[]" id="userLessons" multiple>
              @foreach($lessons as $lesson)
                <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-account-plus">Add User</i>
          </button>
          <a href="{{ route('admin.users.index') }}" class="btn btn-light mt-3">Cancel</a>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
