@extends('layout.index')
@section('main')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Лента новостей</h1>
            <a href="{{ route('home.show') }}" class="link link-primary text-decoration-none d-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i>
                <span>На главную</span>
            </a>
        </div>

        <!-- start row of news -->
        <div class="row g-4">
            @forelse($news as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('news.show', $item->id) }}" class="text-decoration-none">
                        <article class="card card-feature h-100 border-0 shadow-sm">
                            @if($item->news_image)
                                <div class="card-feature__media position-relative overflow-hidden rounded-3">
                                    <img src="{{ asset('storage/' . $item->news_image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge bg-primary">{{ $item->created_at->format('d.m.Y') }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="card-body p-0 mt-3">
                                <h5 class="h5 mb-2">{{ $item->news_title }}</h5>
                                <p class="mb-3 text-muted">
                                    {{ Str::limit($item->news_description, 100) }}
                                </p>
                                <span class="btn btn-outline-primary">
                                    Читать далее
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </span>
                            </div>
                        </article>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5 bg-light rounded-3">
                        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                        <p class="h5 text-muted">Новостей пока нет.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <!-- end row of news -->

        <!-- pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $news->links('vendor.pagination.custom-pagination') }}
        </div>

    </div>
</section>
@endsection