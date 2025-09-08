@extends('layouts.admin')

@section('title', 'Add New Course')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-plus-box"></i>
    </span>
    Add New Course
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="">Courses</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Course Details</h4>

        {{-- Form backend ile çalışacak şekilde --}}
        <form action="{{route('courses.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Course Name</label>
            <input type="text" name="title" class="form-control"  placeholder="Enter course name" >
          </div>
             <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"  placeholder="Enter course description"></textarea>
          </div>
         <div class="form-group">
            <label>Teacher_id</label>
            <select name="teacher_id" class="form-control">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">
    {{ $teacher->name }}
</option>

                @endforeach
           </select>

          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control"  placeholder="Course price">
          </div>
         <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control"  placeholder="Course duration e.g. 12 weeks">

          </div>
           <div class="form-group">
            <label>Enrolled Stusent</label>
            <input type="text" name="enrolled_students" class="form-control"  placeholder="enrolled_student" >

          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option >Active</option>
              <option >Inactive</option>
            </select>
          </div>
           <div class="form-group">
            <label>Course Image</label>
            <input type="file" name="image" class="form-control">
          </div>
          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-plus"></i> Add Course
          </button>
          <a href="{{ route('courses.index') }}" class="btn btn-light mt-3">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
