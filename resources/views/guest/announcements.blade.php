@extends('layouts.guest')

@section('title', 'Announcements')

@section('content')
<section class="pt-7" style="margin-top: 60px;">
    <div class="container">
        <div class="mb-7 text-center">
            <h5 class="text-secondary">INFORMATION</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">School Announcements</h3>
        </div>
        <div class="row">
            @if (isset($announcements) && $announcements->isEmpty())
                <div class="col-12 text-center">
                    <p>No announcements available at this time.</p>
                </div>
            @else
                @foreach ($announcements as $announcement)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card overflow-hidden shadow">
                            <div class="card-body p-4">
                                <h4 class="text-secondary fw-medium mb-3">{{ $announcement->title }}</h4>
                                <p>{{ Str::limit($announcement->content, 150) }}</p>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="fs-0 fw-medium">
                                        {{ $announcement->start_date->format('d M Y') }}
                                        @if ($announcement->end_date)
                                            - {{ $announcement->end_date->format('d M Y') }}
                                        @endif
                                    </span>
                                </div>
                                @if ($announcement->file_path)
                                    <a href="{{ route('download.file', ['filename' => $announcement->file_path]) }}" 
                                    class="btn btn-primary btn-sm">
                                        Download Attachment
                                    </a>
                                @endif                                           
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $announcements->links() }}
        </div>
    </div>
</section>
@endsection
