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
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="#">Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ul>
  </nav>
</div>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User Details</h4>
        <form enctype="multipart/form-data">
          <div class="form-group">
            <label for="userName">Name</label>
            <input type="text" class="form-control" id="userName" value="John Doe">
          </div>

          <div class="form-group">
            <label for="userEmail">Email</label>
            <input type="email" class="form-control" id="userEmail" value="john@example.com">
          </div>

          <div class="form-group">
            <label for="userRole">Role</label>
            <select class="form-control" id="userRole">
              <option selected>Admin</option>
              <option>Instructor</option>
              <option>Student</option>
            </select>
          </div>

          <div class="form-group">
            <label for="userImage">Profile Image</label>
            <input type="file" class="form-control-file" id="userImage">
            <small class="text-muted">Current image: <img src="{{ asset('assets/images/users/john.jpg') }}" alt="user" style="width:50px;"></small>
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control">
              <option value="1" selected>Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>

          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-content-save"></i> Save Changes
          </button>
          <button type="reset" class="btn btn-light mt-3">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection