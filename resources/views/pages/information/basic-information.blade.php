@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | Основные сведения')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Основные сведения</h1>
        </div>

        <div class="bg-light rounded-4 p-4 shadow-sm">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <div class="position-relative">
                        <img src="{{ asset('media/hero-section_main-page.jpg') }}" class="img-fluid rounded-3 shadow-sm" alt="Главное изображение образовательной организации">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="pe-lg-4">
                        <p class="lead mb-4">
                            <strong>Полное наименование образовательной организации:</strong><br>
                            Муниципальное казённое общеобразовательное учреждение «Маршихинская средняя общеобразовательная школа».
                        </p>
                        
                        <p><strong>Сокращенное название:</strong> МКОУ "Маршихинская СОШ".</p>
                        <p><strong>Дата создания организации:</strong> 30 сентября 1997 года.</p>
                        <p><strong>Учредитель:</strong> администрация Макушинского муниципального округа.</p>
                    </div>
                </div>
            </div>

            <h2 class="h3 mt-5 mb-4">Информация об учредителе</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 25%">Адрес учредителя:</td>
                            <td>641600, Курганская область, Макушинский район, г. Макушино, ул. Ленина, д. 85</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Контактные телефоны:</td>
                            <td>
                                <div class="d-flex flex-column gap-1">
                                    <a href="tel:+73523620010" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 362-00-10
                                    </a>
                                    <a href="tel:+73523698336" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-83-36
                                    </a>
                                    <a href="tel:+73523620732" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 362-07-32
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Сайт учредителя:</td>
                            <td>
                                <a href="https://makushinskij-r45.gosweb.gosuslugi.ru/" class="text-decoration-none" target="_blank">
                                    <i class="fas fa-globe me-2 text-primary"></i>
                                    makushinskij-r45.gosweb.gosuslugi.ru
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Электронная почта:</td>
                            <td>
                                <a href="mailto:mail@mak-mouo@yandex.ru" class="text-decoration-none">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    mak-mouo@yandex.ru
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="h3 mt-5 mb-4">Место нахождения образовательной организации</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Адрес</th>
                            <th scope="col" class="text-center">График работы</th>
                            <th scope="col" class="text-center">Контактная информация</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14</td>
                            <td class="text-center">Пн-Пт 8:15–17:00</td>
                            <td>
                                <div class="d-flex flex-column gap-2">
                                    <a href="tel:+73523692185" class="text-decoration-none">
                                        <i class="fas fa-phone me-2 text-primary"></i>
                                        +7 (352) 369-21-85
                                    </a>
                                    <a href="mailto:mail@marsh.shcola@yandex.ru" class="text-decoration-none">
                                        <i class="fas fa-envelope me-2 text-primary"></i>
                                        marsh.shckola@yandex.ru
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="h3 mt-5 mb-4">Места осуществления образовательной деятельности</h2>
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <tbody>
                        <tr>
                            <td>По основным программам:</td>
                            <td>641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14</td>
                        </tr>
                        <tr>
                            <td>По программам дошкольного образования:</td>
                            <td>641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14</td>
                        </tr>
                        <tr>
                            <td>По дополнительным программам:</td>
                            <td>641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14</td>
                        </tr>
                        <tr>
                            <td>Места обучения при использовании сетевой формы реализации образовательных программ:</td>
                            <td>641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14</td>
                        </tr>
                        <tr>
                            <td>Проведение практики:</td>
                            <td>641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14</td>
                        </tr>
                        <tr>
                            <td>Проведение практической подготовки учащихся:</td>
                            <td>641616, Курганская область, Макушинский район, с. Моршиха, ул. Советская, 14</td>
                        </tr>
                        <tr>
                            <td>Проведение государственной итоговой аттестации:</td>
                            <td>641600, Курганская область, Макушинский район, г. Макушино,  ул. Ленина, 85</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection