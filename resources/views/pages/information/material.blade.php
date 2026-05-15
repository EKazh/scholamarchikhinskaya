@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | Материально-техническое обеспечение и оснащенность образовательного процесса. Доступная среда')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Материально-техническое обеспечение и оснащенность образовательного процесса. Доступная среда</h1>
        </div>

        <div class="bg-light rounded-4 p-4 shadow-sm mb-3">
            <p>Образовательная организация обеспечена всем необходимым для качественного обучения, воспитания и развития обучающихся. Ниже представлена информация об учебных помещениях, оборудовании, библиотечных ресурсах, спортивных объектах и условиях доступности для лиц с ограниченными возможностями здоровья (ОВЗ).</p>
        </div>

        <div class="bg-light rounded-4 p-3 mb-5 d-none d-lg-block">
            <div class="row text-center g-3">
                <div class="col"><a href="#classrooms" class="text-decoration-none text-dark fw-medium">Учебные кабинеты</a></div>
                <div class="col"><a href="#library" class="text-decoration-none text-dark fw-medium">Библиотека</a></div>
                <div class="col"><a href="#workshop" class="text-decoration-none text-dark fw-medium">Мастерские и лаборатории</a></div>
                <div class="col"><a href="#sports" class="text-decoration-none text-dark fw-medium">Спорт</a></div>
                <div class="col"><a href="#it" class="text-decoration-none text-dark fw-medium">IT-инфраструктура</a></div>
                <div class="col"><a href="#accessibility" class="text-decoration-none text-dark fw-medium">Доступная среда</a></div>
            </div>
        </div>

         <!-- classrooms -->
        <section id="classrooms" class="mb-5">
            <h3 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-book-open-reader me-2"></i>Учебные кабинеты</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><strong>Количество:</strong> 16 учебных кабинета</li>
                        <li><strong>Площадь:</strong> от 45 до 70 м²</li>
                        <li><strong>Оснащение:</strong> интерактивные доски, проекторы, компьютеры, мебель по росту</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="/images/classroom.jpg" alt="Учебный кабинет" class="rounded-3 w-100 shadow-sm" style="object-fit: cover; height: 200px;">
                </div>
            </div>
        </section>

        <!-- library -->
        <section id="library" class="mb-5">
            <h3 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-book me-2"></i>Библиотека</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <p class="text-muted">Основание библиотеки 1971 год</p>
                    <ul class="list-unstyled">
                        <li><strong>Режим работы:</strong> 9:00-12:30</li>
                        <li><strong>Телефон:</strong> <a href="tel:+7352369-21-85" class="text-decoration-none">+7 (352) 369-21-85</a></li>
                        <li><strong>Количество книг:</strong> 7338</li>
                        <li><strong>Площадь:</strong> 16,6 м²</li>
                        <li><strong>Количество стеллажей:</strong> 17 шкафов</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('media/school_library.jpg') }}" alt="Библиотека" class="rounded-3 w-100 shadow-sm" style="object-fit: cover; height: 250px;">
                </div>
            </div>
        </section>

        <!-- workshop -->
        <section id="workshop" class="mb-5">
            <h3 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-hammer me-2"></i>Мастерские и лаборатории</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <p>В школе функционируют два кабинета труда:</p>
                    <ul class="list-unstyled">
                        <li><strong>Для девочек</strong> — оснащён швейными машинами, гладильной доской, кухонной техникой и инвентарём для обучения готовке и шитью.</li>
                        <li><strong>Для мальчиков</strong> — оборудован станками по дереву и металлу, электроинструментами, верстаками и средствами защиты.</li>
                    </ul>
                    <p>Оба кабинета полностью подготовлены для практического обучения и соблюдения техники безопасности.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('media/tekhnology_for_girls.jpeg') }}" alt="Кабинет труда для девочек" class="rounded-3 w-100 shadow-sm mb-3" style="object-fit: cover; height: 250px;">
                    <img src="{{ asset('media/tekhnology_for_boys.jpg') }}" alt="Кабинет труда для мальчиков" class="rounded-3 w-100 shadow-sm" style="object-fit: cover; height: 250px;">
                </div>
            </div>
        </section>

        <!-- sport -->
        <section id="sports" class="mb-5">
            <h3 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-basketball me-2"></i>Спортивные объекты</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <p>Школа располагает:</p>
                    <ul class="list-unstyled">
                        <li><strong>Спортивный зал</strong> — оснащённым инвентарём для занятий гимнастикой, командными играми (волейбол, баскетбол), лёгкой атлетикой, шахматами, лыжной подготовкой и другими видами спорта.</li>
                        <li><strong>Спортивная площадка</strong> — для проведения уроков и мероприятий на открытом воздухе.</li>
                    </ul>
                    <p>Оборудование позволяет реализовать все требования учебной программы по физической культуре.</p>
                </div>
                <div class="col-md-6">
                    <img src="/images/sports.jpg" alt="Спортзал" class="rounded-3 w-100 shadow-sm" style="object-fit: cover; height: 200px;">
                </div>
            </div>
        </section>

        <!-- IT -->
        <section id="it" class="mb-5">
            <h3 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-laptop-code me-2"></i>IT-инфраструктура</h3>
            <div class="row g-4">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><strong>Компьютерные классы:</strong> кабинет Информатики, по 16 рабочих мест</li>
                        <li><strong>Провайдер, предоставляющий услуги доступа к информационным системам информационно-телекоммуникационных сетей, в том числе к сети Интернет в МКОУ «Маршихинская СОШ» «Ростелеком».</strong></li>
                        <li><strong>Цифровые платформы:</strong> «Сферум», «Решу ОГЭ», Яндекс.Учебник</li>
                        <li><strong>Оборудование:</strong>локальная компьютерная сеть с контент-фильтруемым доступом к Интернет, 5 станционарных компьютеров, 38 ученических ноутбуков, 3 мультимедийных проекторов, 5 лазерных принтеров, 3 МФУ, 3 интерактивных досок, 1 веб-камер</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="/images/it.jpg" alt="IT-класс" class="rounded-3 w-100 shadow-sm" style="object-fit: cover; height: 200px;">
                </div>
            </div>
        </section>

        <!-- accessibility -->
        <section id="accessibility" class="mb-5">
            <h3 class="fw-bold mb-3 border-bottom pb-2"><i class="fas fa-universal-access me-2"></i>Информация об обеспечении возможности получения образования инвалидами и лицами с ограниченными возможностями здоровья</h3>
                <p>Инвалиды и лица с ОВЗ  участвуют в образовательном процессе на общих основаниях, в том числе при работе с имеющимся в образовательной организации оборудованных учебных кабинетов, библиотеки, актового и спортивных залов, а также при работе с имеющимися электронными образовательными ресурсами в библиотеке или кабинетах информатики.</p>
                <p>Особые условия доступа к информационным системам и информационно-коммуникационным сетям для инвалидов и лиц с ОВЗ могут быть предоставлены при работе с официальным сайтом школы.</p>
                <p>Специальные технические средства обучения коллективного и индивидуального пользования для инвалидов и лиц с ОВЗ в школе отсутствуют.</p>
        </section>

        <!-- documents -->
        <section class="mt-5">
            <h4>Документы</h4>
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
        </section>

    </div>
</section>
@endsection