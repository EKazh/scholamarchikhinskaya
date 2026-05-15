@if ($paginator->hasPages())
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mt-4 text-muted">
        <div>
            Показано от 
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span> 
            до 
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span> 
            из 
                @php
                    $count = $paginator->total();
                    $word = match(true) {
                        $count % 10 == 1 && $count % 100 != 11 => 'новость',
                        in_array($count % 10, [2, 3, 4]) && !in_array($count % 100, [12, 13, 14]) => 'новости',
                        default => 'новостей'
                    };
                @endphp
            <span class="fw-semibold">{{ $count }}</span> {{ $word }}
        </div>

        <ul class="pagination m-0 d-flex gap-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link rounded">&larr; Назад</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded" href="{{ $paginator->previousPageUrl() }}" rel="prev">&larr; Назад</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded" href="{{ $paginator->nextPageUrl() }}" rel="next">Вперёд &rarr;</a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link rounded">Вперёд &rarr;</span>
                </li>
            @endif
        </ul>
    </div>
@endif