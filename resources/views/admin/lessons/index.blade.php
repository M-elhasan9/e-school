@extends('layouts.admin')

@section('title', 'Lessons')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-book-open-page-variant"></i>
    </span>
    Lessons
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Lessons</li>
    </ul>
  </nav>
</div>

<div class="row">
  <!-- Lesson List Card -->
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Lesson List</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th> # </th>
                <th> Image </th>
                <th> Lesson Title </th>
                <th> Course </th>
                <th> Duration </th>
                <th> Status </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><img src="{{ asset('assets/images/lessons/html.png') }}" alt="HTML" class="img-thumbnail" style="width: 50px;"></td>
                <td>Introduction to HTML</td>
                <td>Web Development</td>
                <td>30 min</td>
                <td><label class="badge badge-success">Active</label></td>
                <td>
                  <button class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></button>
                  <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td><img src="{{ asset('assets/images/lessons/css.png') }}" alt="CSS" class="img-thumbnail" style="width: 50px;"></td>
                <td>CSS Basics</td>
                <td>Web Development</td>
                <td>45 min</td>
                <td><label class="badge badge-secondary">Inactive</label></td>
                <td>
                  <button class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></button>
                  <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td><img src="{{ asset('assets/images/lessons/js.png') }}" alt="JS" class="img-thumbnail" style="width: 50px;"></td>
                <td>JavaScript Fundamentals</td>
                <td>Web Development</td>
                <td>60 min</td>
                <td><label class="badge badge-success">Active</label></td>
                <td>
                  <button class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></button>
                  <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <button class="btn btn-outline-primary">
            <i class="mdi mdi-plus"></i> Add New Lesson
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection