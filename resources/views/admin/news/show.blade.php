@extends('layouts.admin')

@section('title', 'View News')

@section('content')
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>View News</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}">News</a></li>
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
                        <h3 class="card-title">News Details</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Title:</strong> {{ $news->title }}</p>
                        <p><strong>Content:</strong> {{ $news->content }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-success">{{ $news->status }}</span></p>
                        @if ($news->image_path)
                            <p><strong>Image:</strong> <img src="{{ asset('storage/' . $news->image_path) }}" alt="News Image" style="max-width: 100%; height: auto;"></p>
                        @endif
                        <p><strong>Published At:</strong> {{ $news->published_at }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('news.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
