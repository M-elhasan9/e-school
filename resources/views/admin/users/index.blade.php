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
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Is Teacher</th>
                <th>Courses</th>
                <th>Lessons</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>
<img src="/User/{{$user->image}}" style="width:100px  !important;  height:60px !important; border-radius:8px !important; object-fit:cover;">
                </td>
                <td>

                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_teacher ? 'Yes' : 'No' }}</td>
                <td>
                  @if($user->is_teacher)
                    @foreach($user->teachingCourses as $course)
                      <span class="badge badge-info">{{ $course->title }}</span>
                    @endforeach
                  @else
                    @foreach($user->learningCourses as $course)
                      <span class="badge badge-info">{{ $course->title }}</span>
                    @endforeach
                  @endif
                </td>
                <td>
                  @foreach($user->lessons as $lesson)
                    <span class="badge badge-secondary">{{ $lesson->title }}</span>
                  @endforeach
                </td>
                <td>
                  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                    <i class="mdi mdi-pencil"></i>
                  </a>

                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </form>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <div class="mt-3">
            {{ $users->links('vendor.pagination.custom') }}
        </div>

        <div class="mt-3">
          <a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary">
            <i class="mdi mdi-plus"></i> Add New User
          </a>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(form) {
    event.preventDefault(); // Formun anında submit olmasını engelle
    Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit(); // Seçilen formu gönder
        }
    });
    return false; // Default submit’i iptal et
}
</script>
