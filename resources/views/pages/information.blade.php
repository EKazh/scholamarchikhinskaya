@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | Сведения об образовательной организации')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Сведения об образовательной организации</h1>
        </div>

        <div class="row g-4">

            <!-- start card basic-info -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('basic-information.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-info-circle" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Основные сведения</h5>
                            <p class="text-muted small mb-0">Полное наименование, дата создания, учредитель</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card basic-info -->

            <!-- start card structures -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('structures.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-building" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Структура и органы управления образовательной организацией</h5>
                            <p class="text-muted small mb-0">Органы управления образовательной организацией</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card structures -->

            <!-- start card documents -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('documents.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-file-alt" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Документы</h5>
                            <p class="text-muted small mb-0">Устав, лицензии, правила внутреннего распорядка</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card documents -->

            <!-- start card education -->
            <div class="col-lg-4 col-md-6">
                <a href="#" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-graduation-cap" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Образование</h5>
                            <p class="text-muted small mb-0">Уровни образования, учебные планы, реализуемые программы</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card education -->

            <!-- start card management -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('management.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-user-tie" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Руководство</h5>
                            <p class="text-muted small mb-0">Руководители и их контакты</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card management -->

            <!-- start card teaching -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('teaching-staff.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-chalkboard-teacher" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Педагогический состав</h5>
                            <p class="text-muted small mb-0">Информация о преподавателях и их квалификации</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card teaching -->

            <!-- start card material -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('material.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-cog" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Материально-техническое обеспечение и оснащенность образовательного процесса. Доступная среда.</h5>
                            <p class="text-muted small mb-0">Описание помещений, оборудования, условий для инклюзивного образования</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card material -->

            <!-- start paid -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('paid-education.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-credit-card" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Платные образовательные услуги</h5>
                            <p class="text-muted small mb-0">Описание и стоимость платных услуг</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end paid -->

            <!-- start finances -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('finances.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-chart-line" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Финансово-хозяйственная деятельность</h5>
                            <p class="text-muted small mb-0">Отчеты, поступление и расходование средств</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end finances -->

            <!-- start vacations -->
            <div class="col-lg-4 col-md-6">
                <a href="#" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-users" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Вакантные места для приема (перевода) обучающихся</h5>
                            <p class="text-muted small mb-0">Количество и категории свободных мест для поступления</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end vacations -->

            <!-- start card student-support -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('student-support.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-hands-helping" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Стипендии и меры поддержки обучающихся</h5>
                            <p class="text-muted small mb-0">Психологическая и социальная поддержка</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card student-support -->

            <!-- start card international cooperation -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('international-cooperation.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-globe" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Международное сотрудничество</h5>
                            <p class="text-muted small mb-0">Партнеры и международные программы</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card international cooperation -->

            <!-- start card nutrition -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('organization-of-food.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-cutlery" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Организация питания в образовательной организации</h5>
                            <p class="text-muted small mb-0">Виды питания, меню, условия организации</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card nutrition -->

            <!-- start card standarts -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('edustandart.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-address-book" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Образовательные стандарты и требования</h5>
                            <p class="text-muted small mb-0">Базовые и профессиональные стандарты, соблюдаемые в школе</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card standarts -->

        </div>
    </div>
</section>
@endsection