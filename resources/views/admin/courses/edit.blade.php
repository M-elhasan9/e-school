@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-edit"></i>
    </span>
    Edit User
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="">Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User Details</h4>

        <form action="{{route('courses.update',$course->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="title" class="form-control"  placeholder="Enter course name" value="{{$course->title}}">
          </div>
             <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"  placeholder="Enter course description" >{{$course->description}}</textarea>
          </div>
          <div class="form-group">
            <label>Teacher_id</label>
            <select name="teacher_id" class="form-control">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->name }}
                </option>
                @endforeach
           </select>

          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control"  placeholder="Course price" value="{{$course->price}}">
          </div>
         <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control"  placeholder="Course duration e.g. 12 weeks" value="{{$course->duration}}">

          </div>
           <div class="form-group">
            <label>Enrolled Stusent</label>
<input type="number" name="enrolled_students" class="form-control" value="{{$course->enrolled_students}}">

          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option selected>{{$course->status}}</option>
              <option >Active</option>
              <option >Inactive</option>
            </select>
          </div>
          <div class="form-group form-check">
  <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1"
         {{ old('is_featured', $course->is_featured ?? false) ? 'checked' : '' }}>
  <label class="form-check-label" for="is_featured">Feature on Home</label>
</div>
           <div class="form-group">
            <label>Course Image</label>
            <input type="file" name="image" class="form-control">
            @if($course->image)
                  <img src="{{ asset('Course/' . $course->image) }}" alt="Course Image" width="50">
            @endif
            </div>
          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-content-save"></i> Save Changes
          </button>
          <a href="{{ route('admin.users.index') }}" class="btn btn-light mt-3">Cancel</a>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
