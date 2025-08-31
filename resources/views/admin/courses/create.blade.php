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
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="#">Courses</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Course Details</h4>
        <form>
          <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" class="form-control" id="courseName" placeholder="Enter course name">
          </div>

          <div class="form-group">
            <label for="image">Course Image</label>
            <input type="file" class="form-control" id="image">
          </div>

          <div class="form-group">
            <label for="instructor">Instructor</label>
            <input type="text" class="form-control" id="instructor" placeholder="Instructor name">
          </div>

          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Course price">
          </div>

          <div class="form-group">
            <label for="level">Level</label>
            <select class="form-control" id="level">
              <option>Beginner</option>
              <option>Intermediate</option>
              <option>Advanced</option>
            </select>
          </div>

          <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" class="form-control" id="duration" placeholder="Course duration e.g. 12 weeks">
          </div>

          <div class="form-group">
            <label for="studentsCount">Enrolled Students</label>
            <input type="number" class="form-control" id="studentsCount" placeholder="Number of students">
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control" id="status">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>

          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-plus"></i> Add Course
          </button>
          <button type="reset" class="btn btn-light mt-3">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection