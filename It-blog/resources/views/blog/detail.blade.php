@extends('blog.master')

@section('content')
<div class="">
    <div class="py-3">

        <div class="small post-category mb-3">
            <a href="#" rel="category tag">{{ $article->category->title }}</a>
        </div>

        <h2 class="fw-bolder">{{ $article->title }}</h2>
        <div class="my-3 feature-image-box">
            {{-- <img width="1024" height="682" src="assets/images/de0d23dd-86f6-3ee1-a871-6325fb45bd06-1024x682.jpg"> --}}
            <div class="d-block d-md-flex justify-content-between align-items-center my-3">

                <div class="">
                    <img alt="" src="{{ isset($article->user->photo) ? asset('storage/profile/'.$article->user->photo) : asset('dashboard/img/user-default-photo.png') }}" class="avatar avatar-30 photo rounded-circle" height="30" width="30" loading="lazy"> 
                    <p class="d-inline-block ms-2 fw-bold">{{ $article->user->name }}</p>
                </div>

                <div class="text-primary">
                    <i class="feather-calendar"></i>
                   {{ $article->created_at->format('d M Y H:i a') }}
                </div>
            </div>

            <p style="white-space: pre-line">{{ $article->description }}</p>
            <div class="nav d-flex justify-content-between p-3">
                <a href="#" class="btn btn-outline-primary page-mover rounded-circle">
                    <i class="feather-chevron-left"></i>
                </a>

                <a class="btn btn-outline-primary px-3 rounded-pill" href="{{ route('index') }}">
                    Read All
                </a>

                <a href="#" class="btn btn-outline-primary page-mover rounded-circle">
                    <i class="feather-chevron-right"></i>
                </a>
            </div>
        </div>


    </div>

    <div class="d-block d-lg-none d-flex justify-content-center">
    </div>

</div>
@endsection
