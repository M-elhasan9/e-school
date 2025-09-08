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
                <th>#</th>
                <th>Lesson Title</th>
                <th>Content</th>
                <th>Course</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($lessons as $lesson)
              <tr>
                <td>{{$lesson->id}}</td>
                <td>{{$lesson->title}}</td>
                <td>{{$lesson->content}}</td>
                <td>{{ $lesson->course ? $lesson->course->title : 'N/A' }}</td>
                <td>{{$lesson->duration}}</td>
                <td>
                  @if($lesson->status == 'active')
                    <label class="badge badge-success">Active</label>
                  @else
                    <label class="badge badge-secondary">Inactive</label>
                  @endif
                </td>
                <td>
                  <img src="/Lesson/{{$lesson->image}}" style="width:100px; height:60px; border-radius:8px; object-fit:cover;">
                </td>
                <td>
                  <a href="{{route('lessons.edit',$lesson->id)}}" class="btn btn-sm btn-primary">
                    <i class="mdi mdi-pencil"></i>
                  </a>

                  <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
            {{ $lessons->links('vendor.pagination.custom') }}
        </div>

        <div class="mt-3">
          <a href="{{route('lessons.create')}}" class="btn btn-outline-primary">
            <i class="mdi mdi-plus"></i> Add New Lesson
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
