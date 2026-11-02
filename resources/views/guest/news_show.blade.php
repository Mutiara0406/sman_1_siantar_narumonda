@extends('layouts.guest')

@section('title', $news->title)

@section('content')
<section class="pt-7" style="margin-top: 60px;">
    <div class="container">
        <div class="mb-7 text-center">
            <h5 class="text-secondary">LATEST UPDATES</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">{{ $news->title }}</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                @if ($news->image_path)
                     <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="img-fluid mb-4" style="max-width: 100%; max-height: 400px; object-fit: cover;">
                @endif
                <p class="fs-1 text-secondary mb-4">
                    Published on 
                    @if ($news->published_at)
                        {{ $news->published_at->format('d M Y') }}
                    @else
                        <em>Not Published</em>
                    @endif
                </p>
                <div class="content">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
