@extends('layouts.admin')

@section('title', 'Add New User')

@section('content')
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-plus"></i>
    </span>
    Add New User
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="#">Users</a></li>
      <li class="breadcrumb-item active" aria-current="page">Add New</li>
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
            <input type="text" class="form-control" id="userName" placeholder="Enter user name">
          </div>

          <div class="form-group">
            <label for="userEmail">Email</label>
            <input type="email" class="form-control" id="userEmail" placeholder="Enter email address">
          </div>

          <div class="form-group">
            <label for="userRole">Role</label>
            <select class="form-control" id="userRole">
              <option>Admin</option>
              <option>Instructor</option>
              <option>Student</option>
            </select>
          </div>

          <div class="form-group">
            <label for="userImage">Profile Image</label>
            <input type="file" class="form-control-file" id="userImage">
          </div>

          <div class="form-group">
            <label>Status</label>
            <select class="form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
          </div>

          <button type="submit" class="btn btn-gradient-primary mt-3">
            <i class="mdi mdi-account-plus"></i> Add User
          </button>
          <button type="reset" class="btn btn-light mt-3">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection