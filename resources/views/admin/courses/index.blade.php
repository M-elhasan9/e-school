@extends('layouts.admin') {{-- PurpleAdmin genel layout dosyasını kullanıyoruz --}}

@section('title', 'Courses')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-school"></i>
    </span>
    Courses
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Courses</li>
    </ul>
  </nav>
</div>

<div class="row">
  <!-- Course List Card -->
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Course List</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Price</th>
                <th>Level</th>
                <th>Duration</th>
                <th>Enrolled Students</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><img src="{{ asset('assets/images/course1.jpg') }}" alt="Web Development" width="50"></td>
                <td>Web Development</td>
                <td>John Doe</td>
                <td>$199</td>
                <td>Beginner</td>
                <td>12 weeks</td>
                <td>120</td>
                <td><label class="badge badge-success">Active</label></td>
                <td>
                  <button class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></button>
                  <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td><img src="{{ asset('assets/images/course2.jpg') }}" alt="Mobile App Design" width="50"></td>
                <td>Mobile App Design</td>
                <td>Jane Smith</td>
                <td>$249</td>
                <td>Intermediate</td>
                <td>10 weeks</td>
                <td>85</td>
                <td><label class="badge badge-secondary">Inactive</label></td>
                <td>
                  <button class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></button>
                  <button class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td><img src="{{ asset('assets/images/course3.jpg') }}" alt="Machine Learning" width="50"></td>
                <td>Machine Learning</td>
                <td>Michael Brown</td>
                <td>$299</td>
                <td>Advanced</td>
                <td>14 weeks</td>
                <td>200</td>
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
            <i class="mdi mdi-plus"></i> Add New Course
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
