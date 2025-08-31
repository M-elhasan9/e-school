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
      <li class="breadcrumb-item"><a href="#">Lessons</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Lesson Details</h4>
        <form enctype="multipart/form-data">
          <div class="form-group">
            <label for="lessonTitle">Lesson Title</label>
            <input type="text" class="form-control" id="lessonTitle" placeholder="Enter lesson title">
          </div>

          <div class="form-group">
            <label for="course">Course</label>
            <select class="form-control" id="course">
              <option>Web Development</option>
              <option>Mobile App Design</option>
              <option>Machine Learning</option>
            </select>
          </div>

          <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" id="duration" placeholder="Enter duration (e.g., 45 min)">
          </div>

          <div class="form-group">
            <label for="lessonImage">Lesson Image</label>
            <input type="file" class="form-control-file" id="lessonImage">
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>

          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-plus"></i> Add Lesson
          </button>
          <button type="reset" class="btn btn-light mt-3">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection