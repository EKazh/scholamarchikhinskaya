@extends('layout.auth')
@section('main-auth')
@section('title', 'МКОУ "Маршихинская СОШ" | Регистрация')
        <!-- logo -->
        <div class="text-center mb-4">
            <a href="{{ route('home.show') }}" aria-label="Перейти на главную страницу">
                <img class="mb-4" src="{{ asset('media/logo.svg') }}" alt="Логотип МКОУ &quot;Маршихинская СОШ&quot;" width="120" height="120">
            </a>
            <h1 class="h3 mb-3 fw-normal">Создайте аккаунт</h1>
        </div>

        <!-- form register -->
        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            <!-- full_name -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" placeholder="Ваше ФИО" value="{{ old('full_name') }}" required autofocus>
                <label for="full_name"><i class="fas fa-user"></i> ФИО</label>
                @error('full_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- phone -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="+7 (___) ___-__-__" value="{{ old('phone') }}" required>
                <label for="phone"><i class="fas fa-phone"></i> Телефон</label>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- email -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                <label for="email"><i class="fas fa-envelope"></i> Email</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- password -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Пароль" required>
                <label for="password"><i class="fas fa-lock"></i> Пароль</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- role -->
            <div class="text-center mb-3">
                <div class="form-check form-check-inline d-inline-block">
                    <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="role_teacher" value="teacher" {{ old('role') == 'teacher' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="role_teacher">
                        Учитель
                    </label>
                </div>
                <div class="form-check form-check-inline d-inline-block">
                    <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="role_parent" value="parent" {{ old('role') == 'parent' ? 'checked' : '' }} required>
                    <label class="form-check-label" for="role_parent">
                        Родитель
                    </label>
                </div>
                @error('role')
                    <div class="d-block text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- class selection -->
            <div class="mb-3">
            <p class="mb-2"><i class="fas fa-chalkboard"></i> Выберите класс(ы)</p>
            <div class="row g-2">
                @foreach ($classes as $class)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="form-check">
                        <input class="form-check-input @error('class_ids.*') is-invalid @enderror" 
                           type="checkbox" 
                           name="class_ids[]" 
                           id="class_{{ $class->id }}" 
                           value="{{ $class->id }}" 
                           {{ in_array($class->id, old('class_ids', [])) ? 'checked' : '' }}>
                        <label class="form-check-label btn btn-primary w-100 text-start" for="class_{{ $class->id }}">
                            {{ $class->class_number }}
                        </label>
                    </div>
                </div>
                @endforeach
            </div>
                @error('class_ids')
                    <div class="d-block text-danger mt-2">{{ $message }}</div>
                @enderror
                @error('class_ids.*')
                    <div class="d-block text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- button -->
            <button class="w-100 btn btn-primary btn-lg mb-3" type="submit">
                <i class="fas fa-user-plus"></i> Зарегистрироваться
            </button>

            <!-- login link -->
            <p class="text-center">
                Уже есть аккаунт? <a href="{{ route('login.show') }}">Войдите</a>
            </p>
        </form>
@endsection