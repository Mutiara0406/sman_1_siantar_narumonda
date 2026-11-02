@extends('layouts.guest')

@section('title', 'Gallery')

@section('content')
<section class="pt-7" style="margin-top: 60px;">
    <div class="container">
        <div class="mb-7 text-center">
            <h5 class="text-secondary">OUR GALLERY</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">School Gallery</h3>
        </div>
        <div class="row">
            @if ($galleries->isEmpty())
                <div class="col-12 text-center">
                    <p>No galleries available at this time.</p>
                </div>
            @else
                @foreach ($galleries as $gallery)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card overflow-hidden shadow">
                            @if ($gallery->images->first())
                                <img src="{{ asset('storage/' . $gallery->images->first()->image_path) }}" 
                                     alt="{{ $gallery->title }}" 
                                     class="card-img-top" 
                                     style="max-width: 100%; max-height: 300px; object-fit: contain; background-color: #f8f9fa;">
                            @endif
                            <div class="card-body p-4">
                                <h4 class="text-secondary fw-medium mb-3">{{ $gallery->title }}</h4>
                                <p>{{ Str::limit($gallery->description, 100) }}</p>
                                <a href="{{ route('guest.galleries.show', $gallery->id) }}" 
                                   class="btn btn-primary btn-sm">
                                    View Gallery
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $galleries->links() }}
        </div>
    </div>
</section>
@endsection
