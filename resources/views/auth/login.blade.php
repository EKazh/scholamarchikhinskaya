@extends('layout.auth')
@section('main-auth')
@section('title', 'МКОУ "Маршихинская СОШ" | Вход')
        <!-- logo -->
        <div class="text-center mb-4">
            <a href="{{ route('home.show') }}" aria-label="Перейти на главную страницу">
                <img class="mb-4" src="{{ asset('media/logo.svg') }}" alt="Логотип МКОУ &quot;Маршихинская СОШ&quot;" width="120" height="120">
            </a>
            <h1 class="h3 mb-3 fw-normal">Войдите в аккаунт</h1>
        </div>

        <!-- login form -->
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            <!-- Email -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
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

            <!-- button -->
            <button class="w-100 btn btn-primary btn-lg mb-3" type="submit">
                <i class="fas fa-sign-in-alt"></i> Войти
            </button>

            <!-- register link -->
            <p class="text-center">
                Ещё нет аккаунта? <a href="{{ route('register.show') }}">Зарегистрируйтесь</a>
            </p>
        </form>
@endsection