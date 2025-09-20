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
                    <span><a href="{{ route('student.course', $lesson->course->id) }}">{{ $lesson->course->title ?? 'Course' }} <i class="fa fa-chevron-right"></i></a></span>
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

                {{-- Öğretmenin adı ve kurs --}}
                <div class="mb-3">
                    <small class="text-muted">
                      Course:
                      <a href="{{ route('student.course', $lesson->course->id ?? '#') }}">
                        {{ $lesson->course->title ?? '—' }}
                      </a>
                      @if(isset($lesson->course->teacher))
                        &nbsp; | &nbsp; Instructor:
                        <a href="{{ route('instructors.show', $lesson->course->teacher->id) ?? '#' }}">
                          {{ $lesson->course->teacher->name }}
                        </a>
                      @endif
                    </small>
                </div>

                {{-- Resim --}}
                @if(!empty($lesson->image) && file_exists(public_path('Lesson/'.$lesson->image)))
                    <div class="mb-4">
                        <img src="{{ asset('Lesson/'.$lesson->image) }}" alt="{{ $lesson->title }}" class="img-fluid rounded" style="max-height:400px; width:100%; object-fit:cover;">
                    </div>
                @endif

                {{-- Meta: duration / status --}}
                <div class="mb-3">
                    @if(!empty($lesson->duration))
                        <span class="badge badge-info mr-2">Duration: {{ $lesson->duration }}</span>
                    @endif
                    @if(!empty($lesson->status))
                        <span class="badge badge-secondary">Status: {{ ucfirst($lesson->status) }}</span>
                    @endif
                </div>

                {{-- Video (basit YouTube embed desteği) --}}
                @if(!empty($lesson->video_url))
                    <div class="mb-4">
                        @php
                            $video = $lesson->video_url;
                        @endphp

                        @if(\Illuminate\Support\Str::contains($video, 'youtube.com') || \Illuminate\Support\Str::contains($video, 'youtu.be'))
                            @php
                              // basit YouTube embed dönüştürme
                              if(Str::contains($video, 'watch?v=')) {
                                  $videoId = Str::after($video, 'watch?v=');
                                  // temizle parametreleri
                                  $videoId = explode('&', $videoId)[0];
                              } elseif(Str::contains($video, 'youtu.be/')) {
                                  $videoId = Str::after($video, 'youtu.be/');
                                  $videoId = explode('?',$videoId)[0];
                              } else {
                                  $videoId = null;
                              }
                            @endphp

                            @if(!empty($videoId))
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $videoId }}" allowfullscreen></iframe>
                                </div>
                            @else
                                <p><a href="{{ $video }}" target="_blank">Watch video</a></p>
                            @endif
                        @else
                            <p><a href="{{ $video }}" target="_blank">Watch video</a></p>
                        @endif
                    </div>
                @endif

                {{-- Attachment (download) --}}
                @if(!empty($lesson->attachment))
                    <div class="mb-4">
                        @php
                            // Eğer attachment public disk'e kaydedildiyse storage link üzerinden eriş
                            $attachUrl = Str::startsWith($lesson->attachment, 'attachments/')
                                ? asset('storage/'.$lesson->attachment)
                                : asset($lesson->attachment);
                        @endphp

                        <a href="{{ $attachUrl }}" class="btn btn-outline-primary" target="_blank" download>
                            <i class="fa fa-download"></i> Download Attachment
                        </a>
                    </div>
                @endif

                {{-- İçerik --}}
                <div class="content">
                    {!! $lesson->content ?? '<p>No content available.</p>' !!}
                </div>

                <a href="{{ route('student.course', $lesson->course->id) }}" class="btn btn-primary mt-3">
                    <i class="fa fa-arrow-left"></i> Back to Course
                </a>

            </div> {{-- col-lg-9 --}}

            {{-- Sağ sütun: ders listesi (isteğe bağlı) --}}
            <div class="col-lg-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h6>Lessons in this course</h6>
                        <ul class="list-unstyled">
                            @foreach($lesson->course->lessons()->orderBy('order')->get() as $l)
                                <li class="{{ $l->id == $lesson->id ? 'font-weight-bold' : '' }}">
                                    <a href="{{ route('student.lesson', $l->id) }}">{{ $l->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div> {{-- row --}}
    </div> {{-- container --}}
</section>
@endsection
