@extends('layouts.guest')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section style="padding-top: 7rem;">
        <div class="bg-holder" style="background-image:url(guest/img/hero/hero-bg.svg);">
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end">
                    <img class="pt-7 pt-md-0 hero-img" src="guest/img/hero/sma.png" alt="hero-header" />
                </div>
                <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
                    <h4 class="fw-bold text-danger mb-3">Welcome to Our School</h4>
                    <h1 class="hero-title">SMAN 1 SIANTAR NARUMONDA</h1>
                    <p class="mb-4 fw-medium">Kab. Toba Samosir, Sumatera Utara</p>
                    <div class="text-center text-md-start">
                        <p class="fw-bold text-primary fs-4">Membangun Generasi Unggul di Toba</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profiles Section -->
    <section class="pt-5" id="profiles">
        <div class="container">
            <div class="mb-7 text-center">
                <h5 class="text-secondary">ABOUT US</h5>
                <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Our School Profile</h3>
            </div>
            <div class="row">
                @if (isset($profiles) && $profiles->isEmpty())
                    <div class="col-12 text-center">
                        <p>No profiles available at this time.</p>
                    </div>
                @else
                    @foreach ($profiles as $profile)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card overflow-hidden shadow">
                                <div class="card-body p-4">
                                    <h4 class="text-secondary fw-medium mb-3">{{ $profile->title }}</h4>
                                    <p>{{ Str::limit($profile->content, 150) }}</p>
                                    @if ($profile->image_path)
                                        <img src="{{ asset('storage/' . $profile->image_path) }}" 
                                            alt="{{ $profile->title }}" 
                                            class="img-fluid rounded mt-3">
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Contact Section -->
<section class="pt-6" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                {{-- <h5 class="text-secondary">CONTACT US</h5> --}}
                <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Hubungi Kami</h3>
                @foreach ($contacts as $contact)
                    <div class="d-flex align-items-center mb-3">
                        @if ($contact->icon)
                            <i class="{{ $contact->icon }} me-3 text-primary" style="font-size: 1.5rem;"></i>
                        @endif
                        <div>
                            <h5 class="mb-1">{{ $contact->label }}</h5>
                            <p class="mb-0">{{ $contact->value }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-8">
                <iframe src="https://maps.google.com/maps?q=your+address&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="400" 
                        frameborder="0" 
                        style="border:0;" 
                        allowfullscreen="" 
                        aria-hidden="false" 
                        tabindex="0"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .pagination {
        justify-content: center;
    }
    .pagination .page-link {
        color: #212529;
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        border-radius: 0.3rem;
    }
    .pagination .active .page-link {
        background-color: #FF946D;
        border-color: #FF946D;
    }
    .profile-card img {
        max-height: 200px;
        object-fit: cover;
        margin-top: 15px;
    }
    #profiles img {
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    #profiles h4 {
        color: #FF946D;
    }

    #profiles p {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    #profiles hr {
        border-top: 1px solid #e0e0e0;
        margin: 2rem 0;
    }
</style>
@endpush