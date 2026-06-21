@extends('layout.index')
@section('main')
@section('title', 'Личный кабинет | МКОУ "Маршихинская СОШ"')
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
                    <small class="text-muted">
                        @switch($user->role)
                            @case('teacher') Учитель @break
                            @case('parent') Родитель @break
                            @case('director') Директор @break
                            @default 'Неизвестная роль'
                        @endswitch
                    </small>
                </div>
            </div>

            <div class="mb-4">
                <a href="{{ route('direct.messages.index') }}" class="btn btn-primary">
                    <i class="fas fa-inbox"></i> Мои сообщения
                </a>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <p><i class="fas fa-envelope"></i> {{ $user->email }}</p>
                    <p><i class="fas fa-phone"></i> {{ $user->phone ?? 'Не указано' }}</p>
                </div>
                <div class="col-md-6">
                    @php
                        switch ($user->role) {
                            case 'teacher':
                                $relevantClasses = $user->teachingClasses ?? collect();
                                break;
                            case 'parent':
                                $relevantClasses = $user->parentClasses ?? collect();
                                break;
                            case 'director':
                                $relevantClasses = \App\Models\SchoolClass::orderBy('class_number')->get(); // Все классы
                                break;
                            default:
                                $relevantClasses = collect();
                        }
                    @endphp

                    <div class="mb-3">
                        <p class="mb-2">
                            <i class="fas fa-chalkboard"></i> 
                            @switch($user->role)
                                @case('teacher') Преподаваемые классы:
                                @break
                                @case('parent') Классы ребёнка:
                                @break
                                @case('director') Все классы школы:
                                @break
                                @default
                            @endswitch
                        </p>

                        @if ($relevantClasses->isNotEmpty())
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($relevantClasses as $class)
                                    <span class="badge bg-primary">{{ $class->class_number }}</span>
                                @endforeach
                            </div>
                        @else
                            <span class="text-muted">— Классы не выбраны —</span>
                        @endif

                        @if ($relevantClasses->isNotEmpty())
                            <p class="mt-3">
                                <i class="fas fa-comments text-primary"></i>
                                <strong>Чаты классов:</strong>
                                <ul class="list-unstyled mt-2">
                                    @foreach ($relevantClasses as $class)
                                        <li>
                                            <a href="{{ route('class.chat', $class->id) }}" class="text-decoration-none">
                                                <i class="fas fa-comment-dots"></i> Перейти в чат {{ $class->class_number }} класса
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </p>
                        @else
                            <div class="alert alert-warning mt-3 small">
                                <i class="fas fa-exclamation-triangle"></i>
                                @switch($user->role)
                                    @case('teacher')
                                        Привяжите классы, чтобы создать чаты.
                                    @break
                                    @case('parent')
                                        Родитель не привязан ни к одному классу.
                                    @break
                                    @case('director')
                                        Директор видит все классы — если чаты не отображаются, проверьте настройки.
                                    @break
                                    @default
                                @endswitch
                            </div>
                        @endif
                    </div>

                    @php
                        $canSelfRegisterClasses = in_array($user->role, ['parent', 'teacher']);
                        $isClassEmpty = $relevantClasses->isEmpty();
                    @endphp

                    @if ($canSelfRegisterClasses && $isClassEmpty)
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>Важно:</strong>
        @switch($user->role)
            @case('parent') Ваш ребёнок не привязан ни к одному классу.
                <br>Пожалуйста, укажите класс(ы), где обучается ваш ребёнок.
            @break
            @case('teacher') Вам не привязаны классы для преподавания.
                <br>Пожалуйста, выберите классы, в которых вы работаете.
            @break
        @endswitch
    </div>

    <form action="{{ route('class.self-assign.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Выберите класс(ы):</label>
            <select name="class_ids[]" class="form-select" multiple required>
                @php $currentClassIds = $user->classes()->pluck('id')->toArray(); @endphp
                @foreach (\App\Models\SchoolClass::orderBy('class_number')->get() as $class)
                    <option value="{{ $class->id }}" {{ in_array($class->id, $currentClassIds) ? 'selected' : '' }}>
                        {{ $class->class_number }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">
                @switch($user->role)
                    @case('parent') Выберите все классы, в которых учится ваш ребёнок.
                    @break
                    @case('teacher') Выберите классы, которые вы ведёте.
                    @break
                @endswitch
            </small>
            @error('class_ids') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Привязать классы</button>
    </form>

    @elseif ($canSelfRegisterClasses)
        <div class="mt-4">
            <p class="small text-muted">
                <i class="fas fa-info-circle"></i>
                Для изменения классов свяжитесь с администратором.
            </p>
        </div>
    @endif

    <div class="mb-4">
        <h5><i class="fas fa-envelope-open-text"></i> Написать личное сообщение</h5>
        <p class="small text-muted">
            @switch($user->role)
                @case('teacher') Вы пишете от имени своего класса. @break
                @case('parent') Выберите получателя и класс, от имени которого пишете. @break
                @case('director') Вы пишете от имени администрации школы. @break
                @default Выберите получателя. @break
            @endswitch
        </p>

        <form action="{{ route('direct.message.store') }}" method="POST">
            @csrf

            <!-- Выбор получателя -->
            <div class="mb-3">
                <label class="form-label">Кому:</label>
                <select name="recipient_id" class="form-select" required>
                    <option value="" disabled selected>Выберите получателя...</option>

                    <!-- Для всех: Director -->
                    @php $director = \App\Models\User::where('role', 'director')->first(); @endphp
                    @if ($director && $director->id !== $user->id)
                        <option value="{{ $director->id }}">Директор: {{ $director->full_name }}</option>
                    @endif

                    <!-- Для родителя: Учителя его классов -->
                    @if ($user->role === 'parent')
                        @foreach ($user->parentClasses as $class)
                            @foreach ($class->users as $teacher)
                                @if ($teacher->role === 'teacher' && $teacher->id !== $user->id)
                                    <option value="{{ $teacher->id }}">Учитель {{ $teacher->full_name }} ({{ $class->class_number }} класс)</option>
                                @endif
                            @endforeach
                        @endforeach
                    @endif

                    <!-- Для учителя: Директор и другие учителя (опционально) -->
                    @if ($user->role === 'teacher')
                        @php $otherTeachers = \App\Models\User::role('teacher')->where('id', '!=', $user->id)->get(); @endphp
                            @if ($otherTeachers->isNotEmpty())
                            <optgroup label="Учителя">
                                @foreach ($otherTeachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                @endforeach
                            </optgroup>
                        @endif
                    @endif
                </select>
                @error('recipient_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- Выбор классов (только для родителя) -->
            @if ($user->role === 'parent')
                <div class="mb-3">
                    <label class="form-label">Из какого класса вы пишете:</label>
                    <div class="form-check">
                        @foreach ($user->parentClasses as $class)
                            <input type="checkbox" name="class_ids[]" value="{{ $class->id }}" class="form-check-input" checked>
                            <label class="form-check-label">{{ $class->class_number }} класс</label>
                        @endforeach
                    </div>
                    @error('class_ids') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            @else
                <!-- Для учителя и директора — автоматически подставляем их классы -->
                <input type="hidden" name="class_ids[]" value="{{ $user->teachingClasses->first()?->id ?? $user->schoolClasses->first()?->id }}">
            @endif

            <!-- Сообщение -->
            <div class="mb-3">
                <textarea name="message" class="form-control" rows="3" placeholder="Ваше сообщение..." required></textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Отправить сообщение</button>
        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection