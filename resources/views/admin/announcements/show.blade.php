@extends('layouts.admin')

@section('title', 'View Announcement')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>View Announcement</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}">Announcements</a></li>
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
                        <h3 class="card-title">Announcement Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $announcement->title }}</p>
                        <p><strong>Content:</strong> {{ $announcement->content }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-success">{{ $announcement->status }}</span></p>
                        @if ($announcement->file_path)
                            <p><strong>File:</strong> <a href="{{ asset('storage/' . $announcement->file_path) }}" target="_blank">Download File</a></p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
