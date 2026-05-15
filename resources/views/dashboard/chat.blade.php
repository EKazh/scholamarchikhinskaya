@extends('layout.index')
@section('title', 'Чат класса — ' . $schoolClass->class_number)

@section('main')
<section>
    <div class="container py-5">
        <h1><i class="fas fa-message"></i> Чат {{ $schoolClass->class_number }} класса</h1>

        <div class="card mt-4 shadow-sm">
            <div class="card-body" style="max-height: 70vh; overflow-y: auto;">
                @forelse ($chat->messages->reverse() as $message)
                    @php
                        $isMine = $message->user->id === Auth::id();
                        $roleBadge = $message->user->role === 'teacher'
                        ? '<span class="badge bg-primary ms-1">Учитель</span>'
                        : '<span class="badge bg-secondary ms-1">Родитель</span>';
                    @endphp

                    <div class="d-flex {{ $isMine ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                        <!-- avatar only no mines -->
                        @unless($isMine)
                            <div class="d-flex flex-column align-items-center me-2" style="min-width: 40px;">
                                <div class="rounded-circle bg-primary text-body d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; font-size: 0.9rem;">
                                    @if($message->user->role === 'teacher')
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    @else
                                        <i class="fas fa-user-tie"></i>
                                    @endif
                                </div>
                            </div>
                        @endunless

                        <!-- message -->
                        <div class="{{ $isMine ? 'bg-primary text-body' : 'bg-light' }} p-3 rounded-3" style="max-width: 70%;">
                            <div class="fw-bold">
                                {{ $message->user->full_name }}
                                {!! $roleBadge !!}
                            </div>
                            <div class="small mt-1">{{ $message->message }}</div>
                                <small class="text-muted d-block text-end mt-1">
                                    {{ $message->created_at->format('H:i') }}
                                    <span class="text-uppercase">{{ $message->created_at->format('d.m') }}</span>
                                </small>
                            </div>
                        </div>
                        @empty
                            <div class="text-center text-muted py-4">
                                <i class="fas fa-comments fa-2x mb-2"></i>
                                <p>Пока нет сообщений. Начните диалог!</p>
                            </div>
                        @endforelse
                        <div id="chat-end"></div>
                    </div>
                </div>

        <!-- message form -->
        <form action="{{ route('class.chat', $schoolClass->id) }}" method="POST" class="mt-3">
            @csrf
            <div class="input-group">
                <textarea name="message"
                          class="form-control"
                          placeholder="Напишите сообщение..."
                          rows="2"
                          maxlength="1000"
                          required></textarea>
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
            <div class="form-text text-end text-muted">
                <small>Максимум 1000 символов</small>
            </div>
        </form>
    </div>
</section>
@endsection