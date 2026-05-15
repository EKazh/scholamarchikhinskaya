@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | Организация питания в образовательной организации')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Организация питания в образовательной организации</h1>
        </div>

        <div class="bg-light rounded-4 p-4 shadow-sm">
            <ol>
                <li>
                    Сведения об организации питания: <br>
                    <p>Организатор питания: МКОУ "Маршихинская средняя общеобразовательная школа"</p>
                </li>
                <li>
                    Режим питания обучающихся: <br>
                    Завтрак <br>
                    1– 5 классы: с 10:50 до 11:05 часов; <br>
                    6 – 11 классы: 11:45 до 12:00 часов.
                </li>
                <li>
                    Контактная информация ответственного лица от образовательного учреждения за организацию питания обучающихся: <br>
                    И.о. директора: Горбунова Наталья Анатольевна  – +7 (352) 369-21-85 – marsh.shckola@yandex.ru <br>
                    Лицо, ответственное за питание: Черепанова Полина Викторовна – +7 (352) 369-21-85 – marsh.shckola@yandex.ru 
                </li>
                <li>
                    Телефон горячей линии школы: +7 (352) 369-21-85
                </li>
                <li>
                    Телефон горячей линии муниципального органа управления образованием по вопросам организации питания для школьников: <br>
                    Начальник Отдела образования Романенко Ирина Николаевна  +7 (352) 369-83-36
                </li>
                <li>
                    Телефон горячей линии в г. Курган по вопросам организации питания для школьников: <br>
                    Горячая линия 8 (352) 246-14-41. <br>
                    Обращение через Telegram, Viber, WhatsApp по телефону: 8 (912) 970-04-60
                </li>
                <li>
                    Телефон горячей линии Минпросвещения России по вопросам организации питания для школьников: +7 (800) 200-34-85
                </li>
                <li>
                    Телефон горячей линии Общероссийского общественного движения "Народный фронт "За Россию": +7 (800) 200-04-11
                </li>
                <li>
                    Программа производственного контроля
                </li>
            </ol>
        </div>

        <h4 class="mt-5">Меню ежедневного горячего питания</h4>
        <div class="card shadow-sm">
            <div class="card-body">
                @if($menuDocuments->isEmpty())
                    <p class="text-muted text-center mb-0">Документы не найдены.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($menuDocuments as $menuDocument)
                            <div class="list-group-item list-group-item-action d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center px-2 py-3 gap-3">
                                <div class="d-flex align-items-center flex-fill">
                                    <i class="{{ match(strtoupper($menuDocument->type)) { 'PDF' => 'fas fa-file-pdf', 'DOC', 'DOCX' => 'fas fa-file-word', 'XLS', 'XLSX' => 'fas fa-file-excel', default => 'fas fa-file' }; }} text-secondary mx-2" style="font-size: 1.25rem; color: {{ match(strtoupper($menuDocument->type)) { 'PDF' => 'red', 'DOC', 'DOCX' => 'blue', 'XLS', 'XLSX' => 'green', default => '#6c757d' }; }} !important;"></i>
                                    <span class="fw-medium me-3 document-title">{{ $menuDocument->title }}</span>
                                </div>
                                <div class="document-actions d-flex gap-2">
                                    <a href="{{ route('documents.view', $menuDocument->id) }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                        <i class="fas fa-eye me-1"></i> Просмотреть
                                    </a>
                                    <a href="{{ route('documents.download', $menuDocument->id) }}" class="btn btn-sm btn-outline-success d-flex align-items-center">
                                        <i class="fas fa-download me-1"></i> Скачать
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <h4 class="mt-5">Информация о наличии диетического меню в образовательной организации</h4>
        <div class="bg-light rounded-4 p-4 shadow-sm">
            На диетическое меню запросов не поступало, так как отсутствуют дети, которым такое меню рекомендовано.
        </div>

        <h4 class="mt-5">Перечень юридических лиц и индивидуальных предпринимателей, оказывающих услуги по организации питания в общеобразовательной организации</h4>
        <div class="bg-light rounded-4 p-4 shadow-sm">
            Питание организуется Пользовательским кооперативом "Макушинский районный союз потребительских обществ"
        </div>
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                @if($contractDocuments->isEmpty())
                    <p class="text-muted text-center mb-0">Документы не найдены.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($contractDocuments as $contractDocument)
                            <div class="list-group-item list-group-item-action d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center px-2 py-3 gap-3">
                                <div class="d-flex align-items-center flex-fill">
                                    <i class="{{ match(strtoupper($contractDocument->type)) { 'PDF' => 'fas fa-file-pdf', 'DOC', 'DOCX' => 'fas fa-file-word', 'XLS', 'XLSX' => 'fas fa-file-excel', default => 'fas fa-file' }; }} text-secondary mx-2" style="font-size: 1.25rem; color: {{ match(strtoupper($contractDocument->type)) { 'PDF' => 'red', 'DOC', 'DOCX' => 'blue', 'XLS', 'XLSX' => 'green', default => '#6c757d' }; }} !important;"></i>
                                    <span class="fw-medium me-3 document-title">{{ $contractDocument->title }}</span>
                                </div>
                                <div class="document-actions d-flex gap-2">
                                    <a href="{{ route('documents.view', $contractDocument->id) }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                        <i class="fas fa-eye me-1"></i> Просмотреть
                                    </a>
                                    <a href="{{ route('documents.download', $contractDocument->id) }}" class="btn btn-sm btn-outline-success d-flex align-items-center">
                                        <i class="fas fa-download me-1"></i> Скачать
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <h4 class="mt-5">Перечень юридических лиц и индивидуальных предпринимателей, поставляющих (реализующих) пищевые продукты и продовольственное сырье в общеобразовательную организацию</h4>
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                @if($supplierDocuments->isEmpty())
                    <p class="text-muted text-center mb-0">Документы не найдены.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($supplierDocuments as $supplierDocument)
                            <div class="list-group-item list-group-item-action d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center px-2 py-3 gap-3">
                                <div class="d-flex align-items-center flex-fill">
                                    <i class="{{ match(strtoupper($supplierDocument->type)) { 'PDF' => 'fas fa-file-pdf', 'DOC', 'DOCX' => 'fas fa-file-word', 'XLS', 'XLSX' => 'fas fa-file-excel', default => 'fas fa-file' }; }} text-secondary mx-2" style="font-size: 1.25rem; color: {{ match(strtoupper($supplierDocument->type)) { 'PDF' => 'red', 'DOC', 'DOCX' => 'blue', 'XLS', 'XLSX' => 'green', default => '#6c757d' }; }} !important;"></i>
                                    <span class="fw-medium me-3 document-title">{{ $supplierDocument->title }}</span>
                                </div>
                                <div class="document-actions d-flex gap-2">
                                    <a href="{{ route('documents.view', $supplierDocument->id) }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center">
                                        <i class="fas fa-eye me-1"></i> Просмотреть
                                    </a>
                                    <a href="{{ route('documents.download', $supplierDocument->id) }}" class="btn btn-sm btn-outline-success d-flex align-items-center">
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