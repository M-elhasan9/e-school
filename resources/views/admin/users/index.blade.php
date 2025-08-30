@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>
    </span>
    Users
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ul>
  </nav>
</div>

<div class="row">
  <!-- Users List Card -->
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User List</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th> # </th>
                <th> Image </th>
                <th> Name </th>
                <th> Email </th>
                <th> Role </th>
                <th> Status </th>
                <th> Actions </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <img src="{{ asset('assets/images/users/john.jpg') }}" alt="John Doe" class="rounded-circle" width="40">
                </td>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td>Admin</td>
                <td><label class="badge badge-success">Active</label></td>
                <td>
                  <button class="btn btn-sm btn-primary">
                    <i class="mdi mdi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-danger">
                    <i class="mdi mdi-delete"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  <img src="{{ asset('assets/images/users/jane.jpg') }}" alt="Jane Smith" class="rounded-circle" width="40">
                </td>
                <td>Jane Smith</td>
                <td>jane@example.com</td>
                <td>Instructor</td>
                <td><label class="badge badge-success">Active</label></td>
                <td>
                  <button class="btn btn-sm btn-primary">
                    <i class="mdi mdi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-danger">
                    <i class="mdi mdi-delete"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>
                  <img src="{{ asset('assets/images/users/michael.jpg') }}" alt="Michael Brown" class="rounded-circle" width="40">
                </td>
                <td>Michael Brown</td>
                <td>michael@example.com</td>
                <td>Student</td>
                <td><label class="badge badge-secondary">Inactive</label></td>
                <td>
                  <button class="btn btn-sm btn-primary">
                    <i class="mdi mdi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-danger">
                    <i class="mdi mdi-delete"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <button class="btn btn-outline-primary">
            <i class="mdi mdi-plus"></i> Add New User
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
