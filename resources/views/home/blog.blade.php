@extends('layouts.app')
@section('title','Courses')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="{{ route('home') }}">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Our Blog <i class="fa fa-chevron-right"></i></span>
                </p>
                <h1 class="mb-0 bread">Our Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row d-flex">

            @foreach($posts as $post)
            <div class="col-lg-4 ftco-animate">
                <div class="blog-entry">
                    <a href="{{ route('blog.index', $post->id) }}" class="block-20"
                       style="background-image: url('{{ asset($post->image) }}');">
                    </a>
                    <div class="text d-block">
                        <div class="meta">
                            <p>
                                <a href="#"><span class="fa fa-calendar mr-2"></span>{{ $post->created_at->format('M d, Y') }}</a>
                                <a href="#"><span class="fa fa-user mr-2"></span>{{ $post->author ?? 'Admin' }}</a>
                                <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> {{ $post->comments_count ?? 0 }}</a>
                            </p>
                        </div>
                        <h3 class="heading"><a href="{{ route('blog.index', $post->id) }}">{{ $post->title }}</a></h3>
                        <p>{{ Str::limit($post->content, 100) }}</p>
                       
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row mt-5">
            <div class="col text-center">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</section>

@endsection
