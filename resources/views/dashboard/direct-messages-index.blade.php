@extends('layout.index')
@section('title', 'Личные сообщения')

@section('main')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Личные сообщения</h1>
    </div>

    @if ($chats->isEmpty())
        <div class="alert alert-info">У вас пока нет сообщений.</div>
    @else
        <div class="list-group">
            @foreach ($chats as $chat)
                <a href="{{ route('direct.message.show', $chat->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            <i class="fas fa-user-circle"></i>
                            {{ $chat->users->firstWhere('id', '!=', Auth::id())?->full_name }}
                        </h5>
                        <small class="text-muted">{{ $chat->contents->first()?->created_at->format('d.m.Y') }}</small>
                    </div>
                    <p class="mb-1">
                        {{ Str::limit($chat->contents->first()?->message ?? 'Нет сообщений', 50) }}
                    </p>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection