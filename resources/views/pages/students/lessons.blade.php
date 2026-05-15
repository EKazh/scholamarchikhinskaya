@extends('layout.index')
@section('main')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Расписание уроков</h1>
        </div>
        
        <div class="card shadow-sm">
            <div class="card-body">
                @if($documents->isEmpty())
                    <p class="text-muted text-center mb-0">Документы не найдены.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($documents as $document)
                            <div class="list-group-item list-group-item-action d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center px-2 py-3 gap-3">
                                <div class="d-flex align-items-center flex-fill">
                                    <i class="{{ match(strtoupper($document->type)) { 'PDF' => 'fas fa-file-pdf', 'DOC', 'DOCX' => 'fas fa-file-word', 'XLS', 'XLSX' => 'fas fa-file-excel', default => 'fas fa-file' }; }} text-secondary mx-2" style="font-size: 1.25rem; color: {{ match(strtoupper($document->type)) { 'PDF' => 'red', 'DOC', 'DOCX' => 'blue', 'XLS', 'XLSX' => 'green', default => '#6c757d' }; }} !important;"></i>
                                    <span class="fw-medium me-3 document-title">{{ $document->title }}</span>
                                </div>
                                <div class="document-actions d-flex gap-2">
                                    <a href="{{ route('documents.view', $document->id) }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                        <i class="fas fa-eye me-1"></i> Просмотреть
                                    </a>
                                    <a href="{{ route('documents.download', $document->id) }}" class="btn btn-sm btn-outline-success d-flex align-items-center">
                                        <i class="fas fa-download me-1"></i> Скачать
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection