@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | Структура и органы управления образовательной организацией')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Структура и органы управления образовательной организацией</h1>
        </div>

        <div class="bg-light rounded-4 p-4 shadow-sm mb-5">
            <p>
                Управление Учреждением осуществляется в соответствии с действующим законодательством, Уставом Учреждения и строится на принципах единоначалия и коллегиальности. 
            </p>
            <p>
                Учреждение возглавляет директор, назначаемый на эту должность и освобождаемый от неё Учредителем.
            </p>
            <p>
                Формами коллегиального управления в Учреждении являются: Управляющий совет, педагогический совет, общее собрание работников.
            </p>

            <!-- start table -->
            <h2 class="h3 mt-5 mb-4">Информация о структурных подразделениях школы</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <!-- start table names -->
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Наименование структурного подразделения</th>
                            <th scope="col" class="text-center">ФИО руководителя структурного подразделения</th>
                            <th scope="col" class="text-center">Адрес структурного подразделения</th>
                            <th scope="col" class="text-center">Контактная информация</th>
                        </tr>
                    </thead>
                    <!-- end table names -->
                    <!-- start table body -->
                    <tbody>
                        <tr>
                            <td scope="row">Управляющий совет школы</td>
                            <td class="text-center">Горбунова Наталья Анатольевна</td>
                            <td>
                                641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:+73523692185" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-21-85
                                    </a>
                                    <a href="https://marsh-shckola-r45.gosuslugi.ru/" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-globe me-2 text-primary"></i>
                                        https://marsh-shckola-r45.gosuslugi.ru/
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Педагогический совет</td>
                            <td class="text-center">Горбунова Наталья Анатольевна</td>
                            <td>
                                641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:+73523692185" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-21-85
                                    </a>
                                    <a href="https://marsh-shckola-r45.gosuslugi.ru/" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-globe me-2 text-primary"></i>
                                        https://marsh-shckola-r45.gosuslugi.ru/
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Общее собрание работников</td>
                            <td class="text-center">Горбунова Наталья Анатольевна</td>
                            <td>
                                641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:+73523692185" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-21-85
                                    </a>
                                    <a href="https://marsh-shckola-r45.gosuslugi.ru/" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-globe me-2 text-primary"></i>
                                        https://marsh-shckola-r45.gosuslugi.ru/
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Родительское самоуправление</td>
                            <td class="text-center">Достовалова Наталья Сергеевна</td>
                            <td>
                                641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:+73523692185" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-21-85
                                    </a>
                                    <a href="https://marsh-shckola-r45.gosuslugi.ru/" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-globe me-2 text-primary"></i>
                                        https://marsh-shckola-r45.gosuslugi.ru/
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Совет отцов</td>
                            <td class="text-center">Смирнов Михаил Викторович</td>
                            <td>
                                641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:+73523692185" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-21-85
                                    </a>
                                    <a href="https://marsh-shckola-r45.gosuslugi.ru/" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-globe me-2 text-primary"></i>
                                        https://marsh-shckola-r45.gosuslugi.ru/
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">Детское самоуправление</td>
                            <td class="text-center">Волосникова Алёна Андреевна</td>
                            <td>
                                641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14
                            </td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:+73523692185" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-21-85
                                    </a>
                                    <a href="https://marsh-shckola-r45.gosuslugi.ru/" target="_blank" class="text-decoration-none">
                                        <i class="fas fa-globe me-2 text-primary"></i>
                                        https://marsh-shckola-r45.gosuslugi.ru/
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <!-- end table body -->
                </table>
            </div>
            <!-- end table -->
        </div>
        
        <!-- start documents -->
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
        <!-- end documents -->
    </div>
</section>
@endsection