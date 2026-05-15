<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'МКОУ "Маршихинская СОШ"')</title>

    <!-- start favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="26x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="13x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="144x180" href="{{ asset('apple-touch-icon.png') }}">
    <!-- end favicon -->

    <!-- start link canonical -->
    <link rel="canonical" href="https://scholamarchikhinskaya.ru">
    <!-- end link canonical -->

    <!-- start styles -->
    <link rel="preload" href="{{ asset('css/bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/carousel.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/font-awesome/css/all.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/accessibility.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <!-- end styles -->

    <!-- Custom styles for color schemes will be handled by accessibility.css -->

    <style>
        body {
            margin: 0;
            padding: 1rem;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }
    </style>

</head>
<body class="my-theme bd-body-tertiary" id="body-tag">
    
    <main class="form-auth w-100 m-auto">
        @yield('main-auth')
    </main>

    <!-- Modal for vision accessibility -->
<div class="modal fade" id="visionModal" tabindex="-1" aria-labelledby="visionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visionModalLabel">Версия сайта для слабовидящих</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-4">Настройте параметры для удобства чтения и восприятия контента.</p>
                
                <div class="mb-4">
                    <h6 class="text-primary mb-3">Размер шрифта</h6>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary font-size" data-size="small">Маленький</button>
                        <button type="button" class="btn btn-outline-primary font-size" data-size="normal">Средний</button>
                        <button type="button" class="btn btn-outline-primary font-size" data-size="large">Большой</button>
                    </div>
                </div>
                
                <div class="mb-4">
                    <h6 class="text-primary mb-3">Цветовая схема</h6>
                    <div class="row g-2">
                        <div class="col-12 col-sm-6">
                            <button type="button" class="btn btn-outline-primary w-100 color-scheme" data-scheme="dark-white">
                                <i class="fas fa-moon me-2"></i> Темная тема
                            </button>
                        </div>
                        <div class="col-12 col-sm-6">
                            <button type="button" class="btn btn-outline-primary w-100 color-scheme" data-scheme="white-black">
                                <i class="fas fa-sun me-2"></i> Светлая тема
                            </button>
                        </div>
                        <div class="col-12 col-sm-6">
                            <button type="button" class="btn btn-outline-primary w-100 color-scheme" data-scheme="dark-green">
                                <i class="fas fa-leaf me-2"></i> Зеленая тема
                            </button>
                        </div>
                        <div class="col-12 col-sm-6">
                            <button type="button" class="btn btn-outline-primary w-100 color-scheme" data-scheme="beige-brown">
                                <i class="fas fa-palette me-2"></i> Теплая тема
                            </button>
                        </div>
                        <div class="col-12 col-sm-6">
                            <button type="button" class="btn btn-outline-primary w-100 color-scheme" data-scheme="blue-navy">
                                <i class="fas fa-cloud me-2"></i> Голубая тема
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="toggle-images">
                            <label class="form-check-label" for="toggle-images">
                                Отключить изображения
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="toggle-high-contrast">
                            <label class="form-check-label" for="toggle-high-contrast">
                                Улучшенная контрастность (для лучшего восприятия)
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="toggle-focus-indicator">
                            <label class="form-check-label" for="toggle-focus-indicator">
                                Показывать индикатор фокуса
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="toggle-text-spacing">
                            <label class="form-check-label" for="toggle-text-spacing">
                                Увеличить интервалы текста
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="save-preferences-btn">
                    <i class="fas fa-check-circle me-1"></i> Применить
                </button>
                <button type="button" class="btn btn-outline-secondary" id="reset-all-preferences">
                    <i class="fas fa-undo me-1"></i> Сбросить
                </button>
            </div>
        </div>
    </div>
</div>
    <!-- start scripts -->
    <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('js/scripts.js') }}"></script>
    <script defer src="{{ asset('js/accessibility.js') }}"></script>
    <!-- end scripts -->
</body>
</html>