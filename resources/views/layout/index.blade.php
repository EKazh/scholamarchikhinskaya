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
    <link rel="canonical" href="https://scholamarshikhinskaya.ru">
    <!-- end link canonical -->

    <!-- start styles -->
    <link rel="preload" href="{{ asset('css/bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/carousel.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/font-awesome/css/all.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('css/accessibility.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <!-- end styles -->

    <!-- Custom styles for color schemes will be handled by accessibility.css -->
</head>
<body class="my-theme bd-body-tertiary" id="body-tag">
    <!-- START HEADER -->
    <header class="navbar p-4 bg-body-secondary border-bottom">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home.show') }}">
                    <img src="{{ asset('media/logo.svg') }}" class="me-2" alt="Логотип школы" height="30" width="auto">
                    <span class="d-none d-lg-inline">МКОУ "Маршихинская средняя образовательная школа"</span>
                </a>
                <div class="d-flex gap-2 justify-content-center align-items-center">                   
                    <button type="button" class="btn btn-outline-secondary" id="load-preferences-btn" data-bs-toggle="modal" data-bs-target="#visionModal">
                        <i class="fas fa-glasses"></i>
                        <span class="visually-hidden">Версия для слабовидящих</span>
                    </button>
                    <button type="button" class="btn btn-outline-secondary" id="reset-preferences-btn">
                        <i class="fas fa-undo"></i>
                        <span class="visually-hidden">Сбросить настройки</span>
                    </button>
                    <form role="search" action="{{ route('search') }}" method="GET">
                        <div class="input-group me-2">
                            <input class="form-control search-input fst-italic" name="query" placeholder="Поиск..." aria-label="Поиск" type="search" required>
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </header>
    <!-- END HEADER -->

    <!-- START DESKTOP NAVBAR -->
        <nav class="navbar bg-body-secondary navbar-expand-lg p-3" id="navbar-tag">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                    aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Переключатель навигации"
                    id="navbar-toggler-button">
                    <i class="fa-solid fa-bars" id="navbar-toggler-icon"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center flex-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('information.show') }}">
                                <i class="fas fa-school"></i> Сведения об ОО
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('students.show') }}">
                                <i class="fas fa-children"></i> Обучающимся
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('parents.show') }}">
                                <i class="fas fa-person"></i> Родителям
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('contacts.show') }}">
                                <i class="fas fa-phone"></i> Контакты
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="{{ route('register.show') }}">
                                    <i class="fas fa-user-plus"></i> Регистрация
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="{{ route('login.show') }}">
                                    <i class="fas fa-sign-in-alt"></i> Войти
                                </a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" href="{{ route('account.show') }}">
                                    <i class="fas fa-tachometer-alt"></i> Личный кабинет
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="nav-link text-uppercase btn btn-link p-0 text-danger" style="background: none; border: none;">
                                        <i class="fas fa-sign-out-alt"></i> Выйти
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    <!-- END DESKTOP NAVBAR -->

    <!-- START MAIN -->
    <main>
        @yield('main')
    </main>
    <!-- END MAIN -->

    <!-- START FOOTER -->
    <footer class="py-5 bg-dark text-white">
        <div class="container-xxl">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-4 border-bottom pb-2 text-light">О нашей школе</h5>
                    <p>Муниципальное казённое общеобразовательное учреждение «Маршихинская средняя образовательная школа».</p>
                </div>
                
                <div class="col-md-4 mb-4">
                    <h5 class="mb-4 border-bottom pb-2 text-light">Быстрые ссылки</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home.show') }}" class="text-white text-decoration-none hover-link">Главная</a></li>
                        <li class="mb-2"><a href="{{ route('news-feed.show') }}" class="text-white text-decoration-none hover-link">Новости</a></li>
                        <li class="mb-2"><a href="{{ route('lessons.show') }}" class="text-white text-decoration-none hover-link">Расписание уроков</a></li>
                        <li class="mb-2"><a href="{{ route('contacts.show') }}" class="text-white text-decoration-none hover-link">Контакты</a></li>
                        <li class="mb-2"><a href="{{ route('management.show') }}" class="text-white text-decoration-none hover-link">Руководство</a></li>
                        <li class="mb-2"><a href="{{ route('teaching-staff.show') }}" class="text-white text-decoration-none hover-link">Педагогический состав</a></li>
                        <li class="mb-2"><a href="{{ route('documents.show') }}" class="text-white text-decoration-none hover-link">Документы</a></li>
                    </ul>
                </div>
                
                <div class="col-md-4 mb-4">
                    <h5 class="mb-4 border-bottom pb-2 text-light">Подпишитесь на нас</h5>
                    <div class="social-links mb-4">
                        <a href="https://vk.com/club174688116" class="text-white text-decoration-none me-3 hover-icon" aria-label="ВКонтакте" target="_blank">
                            <i class="fab fa-vk fa-2x"></i>
                        </a>
                    </div>
                    <p class="small">Будьте в курсе последних новостей и событий нашей школы.</p>
                </div>
            </div>
            
            <hr class="bg-light mb-4">
            
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small">© 2026 МКОУ "Маршихинская средняя образовательная школа". Все права защищены.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white text-decoration-none small hover-link">Политика конфиденциальности</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

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
    <script defer src="{{ asset('js/accessibility.js') }}"></script>
    <script>
        /* script search input font-transition */
        const input = document.querySelector('.form-control');
        input.addEventListener('focus', () => input.classList.remove('fst-italic'));
        input.addEventListener('blur', () => input.classList.add('fst-italic'));
    </script>
    <!-- end scripts -->
</body>
</html>