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
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
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
                <th>Course Name</th>
                <th>Description</th>
                <th>Teacher_id</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Enrolled Students</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($courses as $course )
              <tr>
                <td>{{$course->id}}</td>
                <td>{{$course->title}}</td>
                <td>{{$course->description}}</td>
                <td>{{$course->teacher ? $course->teacher->name : 'N/A' }}</td>
                <td>{{$course->price}}</td>
                <td>{{$course->duration}}</td>
                <td>{{$course->enrolled_students}}</td>
                <td>{{$course->status}}</td>
                <td>
<img src="/Course/{{$course->image}}" style="width:100px  !important;  height:60px !important; border-radius:8px !important; object-fit:cover;">
                </td>
                <td>
                  <a href="{{route('courses.edit',$course->id)}}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i></a>
                <form method="POST" action="{{ route('courses.destroy', $course->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this.form)">
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
    {{ $courses->links('vendor.pagination.custom') }}
</div>

        <div class="mt-3">
          <a href="{{route('courses.create')}}" class="btn btn-outline-primary">
            <i class="mdi mdi-plus"></i> Add New Course
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script>
function confirmDelete(form) {
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
      form.submit();
    }
  })
}
</script>


