@extends('layouts.guest')

@section('title', $gallery->title)

@section('content')
<section class="pt-7" style="margin-top: 60px;">
    <div class="container">
        <div class="mb-7 text-center">
            <h5 class="text-secondary">GALLERY DETAIL</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">{{ $gallery->title }}</h3>
            <p class="text-secondary">{{ $gallery->description }}</p>
        </div>
        <div class="row justify-content-center align-items-center"> 
            @forelse ($images as $image)
                <div class="col-lg-4 col-md-6 d-flex justify-content-center align-items-center mb-4" style="height: 300px;">
                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                         alt="{{ $gallery->title }}" 
                         style="max-width: 100%; max-height: 100%; object-fit: cover; border-radius: 5px;">
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No images available for this gallery.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
