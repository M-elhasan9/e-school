@extends('layouts.app')
@section('title', $lesson->title)

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_1.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span><a href="{{ route('student.course', $lesson->course->id) }}">{{ $lesson->course->title }} <i class="fa fa-chevron-right"></i></a></span>
                    <span>{{ $lesson->title }}</span>
                </p>
                <h1 class="mb-0 bread">{{ $lesson->title }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 ftco-animate">
                <h2>{{ $lesson->title }}</h2>
                <div class="content">
                    {!! $lesson->content ?? '<p>No content available.</p>' !!}
                </div>
                <a href="{{ route('student.course', $lesson->course->id) }}" class="btn btn-primary mt-3">
                    <i class="fa fa-arrow-left"></i> Back to Course
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
