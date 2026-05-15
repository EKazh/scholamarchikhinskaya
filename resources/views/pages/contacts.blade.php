@extends('layout.index')
@section('main')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Контакты</h1>
        </div>

        <!-- start contacts and form -->
        <div class="row g-4 mb-5">

            <!-- start contacts -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-info-circle"></i> Контактная информация</h5>
                        <ul class="list-unstyled mt-3">
                            <li class="mb-2"><strong>Адрес:</strong><br>ул. Советская, 14, с. Моршиха</li>
                            <li class="mb-2"><strong>Телефон:</strong><br><a href="tel:+73523692185">+7 (352) 369-21-85</a></li>
                            <li class="mb-2"><strong>Email:</strong><br><a href="mailto:marsh.shcola@yandex.ru">marsh.shcola@yandex.ru</a></li>
                            <li class="mb-2"><strong>Режим работы:</strong><br>Пн–Пт: 8:00–17:00<br>Сб–Вс: Выходные</li>
                            <li class="mb-2"><strong>Группа в ВКонтакте:</strong><br>
                                <a href="https://vk.com/club174688116" class="text-dark text-decoration-none me-3 hover-icon" aria-label="ВКонтакте" target="_blank">
                                    <i class="fab fa-vk fa-2x"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end contacts -->

            <!-- start form -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-envelope"></i> Напишите нам</h5>
                        <!-- Flash Messages -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
                            </div>
                        @endif

                        <form action="{{ route('feedback.store') }}" method="POST" class="mt-3" novalidate>
                            @csrf

                            <div style="display: none;">
                                <input type="text" name="website" value="" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="feedback_name" class="form-label">ФИО</label>
                                <input type="text" class="form-control {{ $errors->has('feedback_name') ? 'is-invalid' : '' }}" id="feedback_name" name="feedback_name" placeholder="Иванов Иван Иванович" required value="{{ old('feedback_name') }}">
                                @error('feedback_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="feedback_email" class="form-label">Email</label>
                                <input type="email" class="form-control {{ $errors->has('feedback_email') ? 'is-invalid' : '' }}" id="feedback_email" name="feedback_email" placeholder="ivanov@yandex.ru" required value="{{ old('feedback_email') }}">
                                @error('feedback_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="feedback_message" class="form-label">Сообщение</label>
                                <textarea class="form-control {{ $errors->has('feedback_message') ? 'is-invalid' : '' }}" id="feedback_message" name="feedback_message" rows="4" required>{{ old('feedback_message') }}</textarea>
                                @error('feedback_message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- start Math Capcha -->
                            <div class="mb-3">
                                <label for="math_answer" class="form-label">
                                    Проверка: сколько будет <strong>{{ session('feedback_captcha_question', '3 + 5') }}</strong>?
                                </label>
                                <input type="number"
                                    class="form-control @error('math_answer') is-invalid @enderror"
                                    id="math_answer"
                                    name="math_answer"
                                required>
                                @error('math_answer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- end Math Capcha -->

                            <button type="submit" class="btn btn-secondary w-100">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end form -->

        </div>
        <!-- end contacts and form -->

        <!-- start map -->
            <div id="map" style="width: 100%; height: 400px;"></div>
        <!-- end map -->
    </div>
</section>

<script>
    // global queue init ymaps
    window.ymapsInitQueue = window.ymapsInitQueue || [];

    // show map
    function initMap() {
        if (typeof ymaps === 'undefined') return;

        new ymaps.Map('map', {
            center: [55.379651, 67.060380],
            zoom: 16
        }).geoObjects.add(
            new ymaps.Placemark([55.379651, 67.060380], {
                hintContent: 'МКОУ Маршихинская средняя образовательная школа',
                balloonContent: 'Адрес: ул. Советская, 14, с. Моршиха<br>Телефон: +7 (352) 369-21-85<br>Email: marsh.shcola@yandex.ru'
            })
        );
    }

    // function
    window.ymapsInitQueue.push(initMap);

    // script api
    (function() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=c8bb72b1-64ea-4871-affc-b6195daffbb5';
        script.onload = function() {
            // waiting for ymaps
            ymaps.ready(function() {
                window.ymapsInitQueue.forEach(function(func) { 
                    if (typeof func === 'function') func(); 
                });
            });
        };
        document.head.appendChild(script);
    })();
</script>
@endsection