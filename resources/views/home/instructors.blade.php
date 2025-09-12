@extends('layouts.app')
@section('title', 'Instructors')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
        <p class="breadcrumbs">
          <span class="mr-2">
            <a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a>
          </span>
          <span>Instructors <i class="fa fa-chevron-right"></i></span>
        </p>
        <h1 class="mb-0 bread">Instructors</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      @foreach ($teachers as $t)
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-4 ftco-animate">
          <div class="project-wrap border rounded overflow-hidden shadow-sm w-100">
            
            {{-- Burada background yerine img etiketi kullanıyoruz --}}
            <a href="{{ route('instructors.show', $t) }}" class="d-block">
              <img src="{{ $t->image ? asset('User/'.$t->image) : asset('images/default-teacher.jpg') }}"
                   alt="{{ $t->name }}"
                   class="img-fluid w-100"
                   style="height:250px; object-fit:cover;">
            </a>

            <div class="p-4 text-center">
              <h3 class="mb-1">
                <a href="{{ route('instructors.show', $t) }}">{{ $t->name }}</a>
              </h3>
              <div class="text-muted mb-2">Instructor</div>
              <div class="small">Courses: {{ $t->teaching_courses_count }}</div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-4 d-flex justify-content-center">
      {{ $teachers->links('pagination::bootstrap-4') }}
    </div>
  </div>
</section>
@endsection
