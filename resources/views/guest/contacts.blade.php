@extends('layouts.guest')

@section('title', 'Contact Us')

@section('content')
<!-- Contact Section -->
<section class="pt-5" id="contact">
    <div class="container">
        <div class="row">
            <!-- Informasi Kontak -->
            <div class="col-lg-4 mb-4">
                <h5 class="text-secondary">Hubungi Kami</h5>
                <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Informasi Kontak</h3>
                @foreach ($contacts as $contact)
                    <div class="d-flex align-items-center mb-4 p-3 bg-light rounded shadow-sm">
                        @if ($contact->icon)
                            <div class="icon-wrapper d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background-color: #f0f0f0; border-radius: 50%;">
                                <i class="{{ $contact->icon }} text-primary" style="font-size: 1.5rem;"></i>
                            </div>
                        @else
                            <div class="icon-wrapper d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background-color: #f0f0f0; border-radius: 50%;">
                                <i class="fa fa-question text-secondary" style="font-size: 1.5rem;"></i>
                            </div>
                        @endif
                        <div>
                            <h5 class="mb-1 fw-bold">{{ $contact->label }}</h5>
                            <p class="mb-0 text-secondary">{{ $contact->value }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Peta Lokasi -->
            <div class="col-lg-8">
                <div class="map-wrapper border rounded shadow-sm overflow-hidden">
                    <iframe 
                        src="https://maps.google.com/maps?q=your+address&t=&z=13&ie=UTF8&iwloc=&output=embed" 
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
    </div>
</section>
@endsection
