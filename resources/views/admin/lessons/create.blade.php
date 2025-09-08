@extends('layouts.admin')

@section('title', 'Add New Lesson')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-plus-box"></i>
    </span>
    Add New Lesson
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="">Lessons</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Lesson Details</h4>

        <form action="{{route('lessons.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label >Lesson Title</label>
            <input type="text" name="title" class="form-control"  placeholder="Enter lesson title">
          </div>

          <div class="form-group">
            <label >Content</label>
            <textarea name="content" class="form-control" placeholder="Enter lesson content"></textarea>
          </div>

          <div class="form-group">
            <label>Course Name</label>
                <select name="course_id" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->title }}
                </option>
               @endforeach
           </select>
          </div>

         <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control"  placeholder="Course duration e.g. 12 weeks">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option >Active</option>
              <option >Inactive</option>
            </select>
          </div>

         <div class="form-group">
            <label>Lesson Image</label>
            <input type="file" name="image" class="form-control-file">
          </div>
          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-plus"></i> Add Lesson
          </button>
          <a href="{{route('lessons.index')}}" class="btn btn-light mt-3">Cancel</a>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
