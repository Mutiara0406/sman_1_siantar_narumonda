@extends('layouts.guest')

@section('title', 'News')

@section('content')
<section class="pt-7" style="margin-top: 60px;">
    <div class="container">
        <div class="mb-7 text-center">
            <h5 class="text-secondary">LATEST UPDATES</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">School News</h3>
        </div>
        <div class="row">
            @if (isset($news) && $news->isEmpty())
                <div class="col-12 text-center">
                    <p>No news available at this time.</p>
                </div>
            @else
                @foreach ($news as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card overflow-hidden shadow">
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="card-img-top" style="max-width: 100%; height: auto; max-height: 200px;">
                            @endif
                            <div class="card-body p-4">
                                <h4 class="text-secondary fw-medium mb-3">{{ $item->title }}</h4>
                                <p>{{ Str::limit($item->content, 150) }}</p>
                                <div class="d-flex align-items-center mb-3">
                                    <span class="fs-0 fw-medium">
                                        @if ($item->published_at)
                                            {{ $item->published_at->format('d M Y') }}
                                        @else
                                            <em>Not Published</em>
                                        @endif
                                    </span>
                                </div>
                                <a href="{{ route('guest.news.show', $item->slug) }}" class="btn btn-primary btn-sm">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $news->links() }}
        </div>
    </div>
</section>
@endsection
