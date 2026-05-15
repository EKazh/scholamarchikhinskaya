@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | Главная страница')
    <section class="hero-section bg-school-image text-white py-5">
        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-7">
                    <h1 class="h1 mb-4">МКОУ "Маршихинская средняя образовательная школа"</h1>
                    <p class="lead-photo mb-4">Рады приветствовать Вас на официальном сайте Муниципального казённого общеобразовательного учреждения «Маршихинская средняя образовательная школа». Здесь Вы найдёте всю необходимую информацию.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="{{ route('news-feed.show') }}" class="btn btn-primary btn-lg px-4">Новости</a>
                        <a href="{{ route('about.show') }}" class="btn btn-outline-light btn-lg px-4">О школе</a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="position-relative">
                        <img src="{{ asset('media/hero-section_main-page.jpg') }}" alt="Школа" class="img-fluid rounded-4 shadow-lg" style="width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h2">Результаты школы</h2>
            </div>

            <!-- start row of results -->
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <span style="font-size: 3rem;">19</span>
                            </div>
                            <p class="text-muted small mb-0">Призеров Всероссийской олимпиады за 3 года</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <span style="font-size: 3rem;">3,5</span>
                            </div>
                            <p class="text-muted small mb-0">Средний балл на ОГЭ в 2025 году</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <span style="font-size: 3rem;">100 %</span>
                            </div>
                            <p class="text-muted small mb-0">Количество выпускников, продолживших получение среднего общего образования в 2025</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row of results -->
        </div>
    </section>
    
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h2">Новости</h2>
                <a href="{{ route('news-feed.show') }}" class="link link-primary text-decoration-none d-flex align-items-center">
                    <span>Все новости</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
            
            <!-- start row of news -->
            <div class="row g-4">
                @forelse($news as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="card card-feature h-100 border-0">
                            @if($item->news_image)
                                <div class="card-feature__media position-relative overflow-hidden rounded-3">
                                    <img src="{{ asset('storage/' . $item->news_image) }}" class="img-fluid" alt="{{ $item->news_title }}">
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge bg-primary">{{ $item->created_at->format('d.m.Y') }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="card-body p-0 mt-3">
                                <h5 class="h5 mb-2">{{ $item->news_title }}</h5>
                                <p class="mb-3 text-muted">
                                    {{ Str::limit($item->news_description, 100) }}
                                </p>
                                <a href="{{ route('news.show', $item->id) }}" class="btn btn-outline-primary">
                                    Читать далее
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center py-5 bg-light rounded-3">
                            <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                            <p class="h5 text-muted">Новостей пока нет.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- end row of news -->
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h2">Ссылки на внешние ресурсы</h2>
            </div>

            <!-- start row of links -->
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="https://edu.gov.ru" target="_blank" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300 text-center p-3">
                            <div class="p-3">
                                <img src="{{ asset('media/edu-gov-ru.png') }}" alt="Министерство просвещения РФ" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body p-0">
                                <small class="text-dark">Министерство просвещения РФ</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="https://minobrnauki.gov.ru/" target="_blank" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300 text-center p-3">
                            <div class="p-3">
                                <img src="{{ asset('media/minobr.png') }}" alt="Министерство науки и высшего образования РФ" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body p-0">
                                <small class="text-dark">Министерство науки и высшего образования РФ</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="https://obrnadzor.gov.ru/" target="_blank" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300 text-center p-3">
                            <div class="p-3">
                                <img src="{{ asset('media/obrnadzor.png') }}" alt="Федеральная служба по надзору в сфере образования и науки" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body p-0">
                                <small class="text-dark">Федеральная служба по надзору в сфере образования и науки</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="https://sz.gov45.ru/deyatelnost" target="_blank" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300 text-center p-3">
                            <div class="p-3">
                                <img src="{{ asset('media/Bezopasnoe_leto.png') }}" alt="Безопасное лето детям" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body p-0">
                                <small class="text-dark">Безопасное лето детям</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="https://www.gosuslugi.ru/school" target="_blank" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300 text-center p-3">
                            <div class="p-3">
                                <img src="{{ asset('media/gosuslugi-my-school.png') }}" alt="Госуслуги Моя школа" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body p-0">
                                <small class="text-dark">Госуслуги Моя школа</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="https://vk.ru/club40001035?ref=group_qr" target="_blank" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300 text-center p-3">
                            <div class="p-3">
                                <img src="{{ asset('media/sport-v-kurgan-obl.jpg') }}" alt="Спорт в Курганской области" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body p-0">
                                <small class="text-dark">Спорт в Курганской области</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="https://xn--d1acchc3adyj9k.xn--p1ai/" target="_blank" class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-shadow transition-300 text-center p-3">
                            <div class="p-3">
                                <img src="{{ asset('media/success-rf.png') }}" alt="Россия — страна достижений" class="img-fluid" style="max-height: 80px; object-fit: contain;">
                            </div>
                            <div class="card-body p-0">
                                <small class="text-dark">Россия — страна достижений</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            
            <!-- end row of links -->
        </div>
    </section>
@endsection