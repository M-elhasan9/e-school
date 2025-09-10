@extends('layouts.admin')

@section('title', 'Edit Lesson')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-pencil-box"></i>
    </span>
    Edit Lesson
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="">Lessons</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Lesson Details</h4>

        <form action="{{route('lessons.update',$lesson->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="title" class="form-control"  placeholder="Enter course name" value="{{$lesson->title}}">
          </div>
             <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control"  placeholder="Enter lesson content">{{$lesson->content}}</textarea>
          </div>
         <div class="form-group">
    <label>Course</label>
    <select name="course_id" class="form-control">
        @foreach($courses as $course)
            <option value="{{ $course->id }}">
                {{ $course->title }}
            </option>
        @endforeach
    </select>
</div>

          <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control"  placeholder="Course price" value="{{$lesson->price}}">
          </div>
         <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control"  placeholder="Course duration e.g. 12 weeks" value="{{$lesson->duration}}">

          </div>
           <div class="form-group">
            <label>Enrolled Stusent</label>
            <input type="text" name="enrolled_students" class="form-control"  placeholder="enrolled_student" value="{{$lesson->enrolled_students}}">

          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
            <option selected> {{$lesson->status}} </option>
              <option >Active</option>
              <option >Inactive</option>
            </select>
          </div>
          <div class="form-group">
    <label>Video URL</label>
    <input type="text" name="video_url" class="form-control" value="{{ $lesson->video_url }}" placeholder="Enter video URL (YouTube or mp4)">
</div>

<div class="form-group">
    <label>Attachment (PDF, DOCX, etc.)</label>
    <input type="file" name="attachment" class="form-control">
    @if($lesson->attachment)
        <p class="mt-2">
            <a href="{{ asset('storage/' . $lesson->attachment) }}" target="_blank" class="btn btn-sm btn-info">
                <i class="mdi mdi-file"></i> View Current Attachment
            </a>
        </p>
    @endif
</div>

           <div class="form-group">
            <label>Lesson Image</label>
            <input type="file" name="image" class="form-control">
            @if($lesson->image)
                  <img src="{{ asset('Lesson/' . $lesson->image) }}" alt="Lesson Image" width="50">
            @endif
            </div>
          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-content-save"> Save Changes</i>
          </button>
          <a href="{{route('lessons.index')}}" class="btn btn-light mt-3">Cancel</a>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
