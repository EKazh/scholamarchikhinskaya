@extends('layout.index')
@section('title', 'МКОУ "Маршихинская СОШ" | Образование')
@section('main')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Образование</h1>
        </div>

        <div class="card shadow-sm mb-3">
            <div class="card-body">
                @if($languageDocuments->isEmpty())
                    <p class="text-muted text-center mb-0">Документы не найдены.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($languageDocuments as $languageDocument)
                            <div class="list-group-item list-group-item-action d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center px-2 py-3 gap-3">
                                <div class="d-flex align-items-center flex-fill">
                                    <i class="{{ match(strtoupper($languageDocument->type)) { 'PDF' => 'fas fa-file-pdf', 'DOC', 'DOCX' => 'fas fa-file-word', 'XLS', 'XLSX' => 'fas fa-file-excel', default => 'fas fa-file' }; }} text-secondary mx-2" style="font-size: 1.25rem; color: {{ match(strtoupper($languageDocument->type)) { 'PDF' => 'red', 'DOC', 'DOCX' => 'blue', 'XLS', 'XLSX' => 'green', default => '#6c757d' }; }} !important;"></i>
                                    <span class="fw-medium me-3 document-title">{{ $languageDocument->title }}</span>
                                </div>
                                <div class="document-actions d-flex gap-2">
                                    <a href="{{ route('documents.view', $languageDocument->id) }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                        <i class="fas fa-eye me-1"></i> Просмотреть
                                    </a>
                                    <a href="{{ route('documents.download', $languageDocument->id) }}" class="btn btn-sm btn-outline-success d-flex align-items-center">
                                        <i class="fas fa-download me-1"></i> Скачать
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <h4 class="mt-5">Реализуемые уровни образования</h4>
        <div class="bg-light rounded-4 p-4 shadow-sm mb-3"> 
            <ul>
                <li>Начальное общее образование (1–4 классы)</li>
                <li>Основное общее образование (5–9 классы)</li>
                <li>Среднее общее образование (10–11 классы)</li>
            </ul>
        </div>

        <h4 class="mt-5">Формы обучения</h4>
        <div class="bg-light rounded-4 p-4 shadow-sm mb-3">
            <p>Очная форма обучения.</p>
        </div>

        <h4 class="mt-5">Описание образовательной программы</h4>
        <div class="bg-light rounded-4 p-4 shadow-sm mb-3">
            <p>Школа реализует основные общеобразовательные программы начального, основного и среднего общего образования в соответствии с федеральными государственными образовательными стандартами (ФГОС). Программы направлены на развитие личности, формирование универсальных учебных действий, ключевых компетенций и готовности к самообразованию.</p>
        </div>
        
    <div>
</section>
@endsection