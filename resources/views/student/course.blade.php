@extends('layouts.app')
@section('title', $course->title)

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span><a href="{{ route('courses') }}">Courses <i class="fa fa-chevron-right"></i></a></span>
                    <span>{{ $course->title }} <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">{{ $course->title }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2>{{ $course->title }}</h2>
                <p>{{ $course->description ?? 'No description available.' }}</p>

                <h4 class="mt-4">Lessons</h4>
                <ul class="list-group">
                    @foreach($course->lessons as $lesson)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('student.lesson', $lesson->id) }}">
                                <i class="fa fa-play-circle"></i> {{ $lesson->title }}
                            </a>
                            <span class="badge badge-primary badge-pill">{{ $lesson->duration ?? 'N/A' }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4">
                <div class="sidebar-box bg-white p-4 ftco-animate">
                    <h3 class="heading-sidebar">Course Info</h3>
                    <p><strong>Instructor:</strong> {{ $course->teacher?->name ?? 'No Teacher' }}</p>
                    <p><strong>Price:</strong> ${{ $course->price ?? 0 }}</p>
                    <p><strong>Enrolled Students:</strong> {{ $course->enrolled_students ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
