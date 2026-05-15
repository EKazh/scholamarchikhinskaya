@extends('layout.index')

@section('main')
<section>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h1">Результаты поиска</h1>
    </div>
    
    @if (request('query'))
        <p>По запросу "<strong>{{ request('query') }}</strong>":</p>
        
        @if ($results['news']->isEmpty() && $results['documents']->isEmpty())
            <p>Ничего не найдено.</p>
        @else
            @if (!$results['news']->isEmpty())
                <h3>Новости</h3>
                <ul class="list-group mb-4">
                    @foreach ($results['news'] as $news)
                        <li class="list-group-item">
                            <a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if (!$results['documents']->isEmpty())
                <h3>Документы</h3>
                <ul class="list-group">
                    @foreach ($results['documents'] as $document)
                        <li class="list-group-item">
                            <a href="{{ route('documents.view', $document->id) }}">{{ $document->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endif
    @else
        <p>Введите запрос в строке поиска.</p>
    @endif
    
    <a href="{{ url()->previous() }}" class="btn btn-link">Назад</a>
</div>
</section>
@endsection