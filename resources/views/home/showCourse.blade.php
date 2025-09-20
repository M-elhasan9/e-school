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
                    <span>{{ $course->title }}</span>
                </p>
                <h1 class="mb-0 bread">{{ $course->title }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <!-- Course Details -->
            <div class="col-lg-8 ftco-animate">
                <div class="course-detail">
                    {{-- Resim --}}
<img src="/Course/{{$course->image}}">
                    {{-- Başlık ve açıklama --}}
                    <h2>{{ $course->title }}</h2>
                    <p>{{ $course->description }}</p>

                    {{-- Kurs bilgileri --}}
                    <ul class="list-unstyled">
                        <li><strong>Instructor:</strong> {{ $course->teacher->name ?? 'N/A' }}</li>
                        <li><strong>Price:</strong> ${{ $course->price }}</li>
                        <li><strong>Students Enrolled:</strong> {{ $course->enrolled_students }}</li>
                    </ul>

                    {{-- Dersler --}}
                    <h3 class="mt-4">Lessons</h3>
                    @if($course->lessons->count() > 0)
                        <ul class="list-group">
                            @foreach($course->lessons as $lesson)
                                <li class="list-group-item">
<a href="{{ route('student.lesson', $lesson->id) }}">{{ $lesson->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No lessons added yet.</p>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-box bg-white p-4 ftco-animate">
                    <h3 class="heading-sidebar">Course Info</h3>
                    <ul class="list-unstyled">
                        <li><strong>Duration:</strong> {{ $course->duration ?? 'N/A' }}</li>
                        <li><strong>Price:</strong> ${{ $course->price }}</li>
                        <li><strong>Status:</strong> {{ ucfirst($course->status) }}</li>
                        <li><strong>Featured:</strong> {{ $course->is_featured ? 'Yes' : 'No' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
