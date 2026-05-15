@extends('layout.index')
@section('main')
<section>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h1 class="h2 mb-4 text-center">{{ $newsItem->news_title }}</h1>
                        
                        @if($newsItem->news_image)
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/' . $newsItem->news_image) }}" 
                                     class="img-fluid rounded-4 shadow-sm" 
                                     alt="{{ $newsItem->news_title }}"
                                     style="max-height: 500px; object-fit: cover;">
                                <div class="mt-2 text-muted small">{{ $newsItem->news_title }}</div>
                            </div>
                        @endif
                        
                        <div class="news-content fs-5 text-center">
                            <p class="lead">{{ $newsItem->news_description }}</p>
                        </div>
                        
                        <div class="text-center mt-4 pt-3 border-top">
                            <small class="text-muted">
                                <i class="fas fa-calendar-alt me-2"></i>
                                Опубликовано: {{ $newsItem->created_at->format('d.m.Y') }}
                            </small>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection