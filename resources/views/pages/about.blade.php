@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | О школе')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">О школе</h1>
            <a href="{{ route('home.show') }}" class="link link-primary text-decoration-none d-flex align-items-center">
                <i class="fas fa-arrow-left me-2"></i>
                <span>На главную</span>
            </a>
        </div>

        <div class="bg-light rounded-4 p-4 shadow-sm">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <!-- start carousel -->
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('media/about1.jpg') }}" class="d-block w-100" alt="Ученики Маршихинской школы 30-е гг. XX века">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('media/about2.jpg') }}" class="d-block w-100" alt="Ученики Маршихинской школы 40-е гг. XX века">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('media/about3.jpg') }}" class="d-block w-100" alt="Новое здание Маршихинской школы 2000-е гг.">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Предыдущий</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Следующий</span>
                        </button>
                    </div>
                    <!-- end carousel -->
                </div>
                <div class="col-lg-6">
                    <p>
                        Муниципальное казённое общеобразовательное учреждение "Маршихинская средняя образовательная школа"
                        Дошкольное обучение, начальное основное образование, общее основное образование, среднее общее образование.
                    </p>
                    <h2 class="h3 mt-5 mb-4">История школы</h2>
                    <p>
                        Школа министерства внутренних дел открыта в селе Моршиха в 1865 году. В начале XX века законоучитель в ней – священник Николай Буров, учителя – Василий Николаевич Васюнин и Мария Павловна Леонтьева.
                        Муниципальное казённое общеобразовательное учреждение «Маршихинская средняя общеобразовательная школа» открыта в 1895 году. Церковно-приходская школа, обучалось 38 мальчиков. 
                        В 1916 году школе выдается из земских сборов 465 рублей, из казны – 505 рублей, обучается 70 мальчиков и 25 девочек.
                        Сейчас существующее здание школы было построено в 1971 году.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection