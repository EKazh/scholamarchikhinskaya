@extends('layout.index')
@section('main')
@section('title', 'Личный кабинет — МКОУ "Маршихинская СОШ"')
<section>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">Личный кабинет</h1>
        </div>

        <div class="bg-light rounded-4 p-4 shadow-sm">

            <div class="d-flex align-items-center mb-4">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h5 class="mb-0">{{ $user->full_name }}</h5>
                    <small class="text-muted">{{ $user->role == 'teacher' ? 'Учитель' : 'Родитель' }}</small>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <p><i class="fas fa-envelope"></i> {{ $user->email }}</p>
                    <p><i class="fas fa-phone"></i> {{ $user->phone ?? 'Не указано' }}</p>
                </div>
                <div class="col-md-6">
                    <p>
                        @if($user->role == 'teacher')
                            <i class="fas fa-chalkboard-teacher text-primary"></i>
                        @else
                            <i class="fas fa-user-graduate text-primary"></i>
                        @endif
                        <strong>Классы:</strong>
                        @php
                            $classes = collect();
                            if ($user->role == 'teacher') {
                                $classes = $user->teachingClasses;
                            } else {
                                $classes = $user->parentClasses;
                            }
                            $classNumbers = $classes->pluck('class_number')->unique()->sort()->join(', ');
                            echo $classNumbers ?: 'Не назначено';
                        @endphp
                    </p>

                    @if($classes->isNotEmpty())
                        <p>
                            <i class="fas fa-comments text-primary"></i>
                            <strong>Чаты:</strong>
                            @foreach ($classes as $class)
                                <div>
                                    <a href="{{ route('class.chat', $class->id) }}" class="text-decoration-none">
                                        <i class="fas fa-comment-dots"></i> Перейти в чат {{ $class->class_number }} класса
                                    </a>
                                </div>
                            @endforeach
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection