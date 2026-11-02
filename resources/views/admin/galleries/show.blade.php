@extends('layouts.admin')

@section('title', 'View Gallery')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>View Gallery</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}">Galleries</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Gallery Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $gallery->title }}</p>
                        <p><strong>Description:</strong> {{ $gallery->description }}</p>
                        <p><strong>Images:</strong></p>
                        <div class="row">
                            @foreach ($gallery->images as $image)
                                <div class="col-md-3 mb-3">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery Image" class="img-thumbnail">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
