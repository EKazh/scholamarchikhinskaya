@extends('layout.index')
@section('title', 'Чат с ' . ($chat->users->firstWhere('id', '!=', Auth::id())?->full_name ?? 'Получатель'))

@section('main')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Чат</h1>
        <a href="{{ route('direct.messages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Назад к списку
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header">
            <i class="fas fa-users"></i>
            <strong>Участники:</strong>
            @foreach ($chat->users->where('id', '!=', Auth::id()) as $participant)
                <span class="badge bg-primary ms-2">{{ $participant->full_name }}</span>
            @endforeach
        </div>

        <div class="card-body" style="max-height: 600px; overflow-y: auto;" id="chat-messages">
            @forelse ($chat->contents as $message)
                <div class="d-flex {{ $message->user_id === Auth::id() ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                    <div class="d-flex flex-column" style="max-width: 70%;">
                        <div class="d-flex align-items-center mb-1">
                            <small class="text-muted">
                                <strong>{{ $message->user->full_name }}</strong>
                                @if ($message->class_ids)
                                    <span class="text-info">
                                        из классов: {{ $message->class_numbers }}
                                    </span>
                                @endif
                            </small>
                        </div>

                        <div class="p-3 rounded {{ $message->user_id === Auth::id() 
                            ? 'bg-primary text-white' 
                            : 'bg-light text-dark' }}">
                            {{ $message->message }}
                        </div>

                        <small class="text-muted ms-2">
                            {{ $message->created_at->format('d.m.Y H:i') }}
                        </small>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-4">
                    <i class="fas fa-comment-slash fa-2x mb-2"></i>
                    <p>Сообщений пока нет. Напишите первым!</p>
                </div>
            @endforelse
        </div>

        <div class="card-footer">
            <form action="{{ route('direct.message.reply', $chat->id) }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="message" class="form-control" placeholder="Ваше сообщение..." required>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Автопрокрутка вниз при загрузке
    const chatContainer = document.getElementById('chat-messages');
    if (chatContainer) {
        chatContainer.scrollTop = chatContainer.scrollHeight;
    }
</script>
@endsection