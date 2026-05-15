@extends('layout.index')
@section('main')
@section('title', 'МКОУ "Маршихинская СОШ" | Родителям')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Родителям</h1>
        </div>

        <div class="row g-4">

            <!-- start card rules -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('rules.show') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-300">
                        <div class="card-body text-center p-4">
                            <div class="mb-3 text-primary">
                                <i class="fas fa-users-between-lines" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold">Правила приёма, перевода, отчисления</h5>
                            <p class="text-muted small mb-0">Ознакомьтесь с документами и порядком зачисления, перевода и отчисления обучающихся.</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- end card rules -->

        </div>
    </div>
</section>
@endsection