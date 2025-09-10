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

                {{-- 📸 Dersin Fotoğrafı --}}
                @if($lesson->image)
                    <div class="mb-4 text-center">
                       <img src="{{ asset($lesson->image) }}" alt="{{ $lesson->title }}" class="img-fluid rounded">
                             alt="{{ $lesson->title }}"
                             class="img-fluid rounded shadow">
                    </div>
                @endif

                <h2 class="mb-4">{{ $lesson->title }}</h2>

                {{-- 🎥 Ders Videosu --}}
                @if($lesson->video_url)
                    @if(Str::endsWith($lesson->video_url, '.mp4'))
                        <video class="w-100 mb-4" controls>
                            <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                            Tarayıcınız video oynatmayı desteklemiyor.
                        </video>
                    @else
                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                            <iframe class="embed-responsive-item" src="{{ $lesson->video_url }}" allowfullscreen></iframe>
                        </div>
                    @endif
                @endif

                {{-- 📝 Ders Notları --}}
                <div class="content mb-4">
                    {!! $lesson->content ?? '<p>No content available.</p>' !!}
                </div>

                {{-- 📂 Ek Dosya İndir --}}
                @if($lesson->attachment)
                    <div class="mt-3">
                        <h5>Additional Resources</h5>
                        <a href="{{ asset('storage/' . $lesson->attachment) }}" class="btn btn-sm btn-success" download>
                            <i class="fa fa-download"></i> Download Resource
                        </a>
                    </div>
                @endif

                <a href="{{ route('student.course', $lesson->course->id) }}" class="btn btn-outline-primary mt-4">
                    <i class="fa fa-arrow-left"></i> Back to Course
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
