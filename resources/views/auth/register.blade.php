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
                    <input class="form-check-input" type="radio" name="role" id="role" value="teacher" required>
                    <label class="form-check-label" for="role">
                        Учитель
                    </label>
                </div>
                <div class="form-check form-check-inline d-inline-block">
                    <input class="form-check-input" type="radio" name="role" id="role" value="parent" required>
                    <label class="form-check-label" for="role">
                        Родитель
                    </label>
                </div>
                @error('role')
                    <div class="d-block text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- class selection -->
            <div class="form-floating mb-3">
                <select class="form-control @error('class_id') is-invalid @enderror" name="class_id" id="class_id" required>
                    <option value="" disabled selected>Выберите класс</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                            {{ $class->class_number }}
                        </option>
                    @endforeach
                </select>
                <label for="class_id"><i class="fas fa-chalkboard"></i> Класс</label>
                @error('class_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
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