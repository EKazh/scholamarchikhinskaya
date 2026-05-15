@extends('layout.index')
@section('main')
<section>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <article class="card border-0 shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h1 class="h2 mb-4">Руководство школы</h1>
                        <div class="icon-container mb-4">
                            <i class="fas fa-users fa-3x text-primary"></i>
                        </div>
                    </div>
                </article>
                
                <div class="row g-4">
                    <!-- director card -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift">
                            <div class="card-body text-center p-4">
                                <div class="avatar-circle bg-primary text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <i class="fas fa-crown fa-2x"></i>
                                </div>
                                <h3 class="h5 mb-2">Горбунова Наталья Анатольевна</h3>
                                <p class="text-primary mb-3 fw-bold">Директор</p>
                                <div class="contact-info mt-3">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <i class="fas fa-phone me-2 text-muted"></i>
                                        <a href="tel:+73523692185" class="text-decoration-none text-dark">+7 (352) 369-21-85</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-envelope me-2 text-muted"></i>
                                        <a href="mailto:marsh.shckola@yandex.ru" class="text-decoration-none text-dark">marsh.shckola@yandex.ru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card 2 -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift">
                            <div class="card-body text-center p-4">
                                <div class="avatar-circle bg-primary text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                                </div>
                                <h3 class="h5 mb-2">Шимкова Анастасия Юрьевна</h3>
                                <p class="text-primary mb-3 fw-bold">Заместитель по УВР</p>
                                <div class="contact-info mt-3">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <i class="fas fa-phone me-2 text-muted"></i>
                                        <a href="tel:+73523692185" class="text-decoration-none text-dark">+7 (352) 369-21-85</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-envelope me-2 text-muted"></i>
                                        <a href="mailto:marsh.shckola@yandex.ru" class="text-decoration-none text-dark">marsh.shckola@yandex.ru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- card 3 -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm hover-lift">
                            <div class="card-body text-center p-4">
                                <div class="avatar-circle bg-primary text-white mb-3 mx-auto d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                                    <i class="fas fa-user-friends fa-2x"></i>
                                </div>
                                <h3 class="h5 mb-2">Смирнова Татьяна Олеговна</h3>
                                <p class="text-primary mb-3 fw-bold">Заместитель по ВР</p>
                                <div class="contact-info mt-3">
                                    <div class="d-flex align-items-center justify-content-center mb-2">
                                        <i class="fas fa-phone me-2 text-muted"></i>
                                        <a href="tel:+73523692185" class="text-decoration-none text-dark">+7 (352) 369-21-85</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fas fa-envelope me-2 text-muted"></i>
                                        <a href="mailto:marsh.shckola@yandex.ru" class="text-decoration-none text-dark">marsh.shckola@yandex.ru</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection