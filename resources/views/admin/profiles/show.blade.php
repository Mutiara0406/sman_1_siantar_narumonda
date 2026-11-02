@extends('layouts.admin')

@section('title', 'View Profile')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>View Profile</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Profiles</a></li>
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
                        <h3 class="card-title">Profile Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Category:</strong> {{ $profile->category }}</p>
                        <p><strong>Title:</strong> {{ $profile->title }}</p>
                        <p><strong>Content:</strong></p>
                        <p>{{ $profile->content }}</p>
                        @if ($profile->image_path)
                            <p><strong>Image:</strong></p>
                            <img src="{{ asset('storage/' . $profile->image_path) }}" alt="Profile Image" class="img-fluid mt-2" style="max-height: 300px;">
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('profiles.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
