<?php

namespace App\Http\Controllers;

use App\Models\DirectMessage;
use App\Models\DirectMessageContent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectMessageController extends Controller
{
    public function show($chatId)
    {   
        $user = Auth::user();
        $chat = DirectMessage::with(['users', 'contents.user'])
            ->findOrFail($chatId);

        // Проверка: пользователь должен быть участником чата
        if (!$chat->users->contains($user->id)) {
            abort(403, 'У вас нет доступа к этому чату.');
        }

        return view('dashboard.direct-messages', compact('chat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
            'class_ids' => 'required|array|min:1',
            'class_ids.*' => 'exists:school_classes,id',
        ]);

        $sender = Auth::user();
        $recipientId = $request->recipient_id;

        // Не позволяйте писать самому себе
        if ($recipientId === $sender->id) {
            return back()->withErrors('Нельзя писать самому себе.');
        }

         $classIds = $request->class_ids;

        // Если не передано — подставляем автоматически в зависимости от роли
        if (!$classIds || count($classIds) === 0) {
            switch ($sender->role) {
                case 'teacher':
                    $classIds = $sender->teachingClasses->pluck('id')->toArray();
                    break;
                case 'parent':
                    $classIds = $sender->parentClasses->pluck('id')->toArray();
                    break;
                case 'director':
                    $classIds = $sender->schoolClasses->pluck('id')->toArray();
                    break;
                default:
                    return back()->withErrors('У вас не привязаны классы для отправки сообщения.');
            }
        }

        // Если все равно пусто — ошибка
        if (empty($classIds)) {
            return back()->withErrors('У вас не привязаны классы.');
        }

        // Создаём чат
        $chat = DirectMessage::create();
        $chat->users()->sync([$sender->id, $recipientId]);

        // Создаём сообщение
        DirectMessageContent::create([
            'direct_message_id' => $chat->id,
            'user_id' => $sender->id,
            'message' => $request->message,
            'class_ids' => $classIds, // Для получателя — "Родитель из 5 класса пишет"
        ]);

        return back()->with('success', 'Сообщение отправлено.');
    }

    public function reply(Request $request, $chatId)
    {
        $request->validate(['message' => 'required|string|max:1000']);
        $user = Auth::user();

        $chat = DirectMessage::findOrFail($chatId);
        if (!$chat->users->contains($user->id)) {
            abort(403);
        }

        $classIds = $user->role === 'parent' 
            ? $user->parentClasses->pluck('id')->toArray()
            : ($user->role === 'teacher' ? $user->teachingClasses->pluck('id')->toArray() : []);

        DirectMessageContent::create([
            'direct_message_id' => $chat->id,
            'user_id' => $user->id,
            'message' => $request->message,
            'class_ids' => $classIds,
        ]);

        return redirect()->route('direct.message.show', $chat->id);
    }

    // Опционально: список чатов
    public function index()
    {
        $user = Auth::user();
        $chats = DirectMessage::whereHas('users', fn($q) => $q->where('user_id', $user->id))
            ->with([
                'users' => fn($q) => $q->where('users.id', '!=', $user->id), // ✅ Уточнили таблицу
                'contents' => fn($q) => $q->latest()->first(), // Последнее сообщение
            ])
            ->latest()
            ->get();

        return view('dashboard.direct-messages-index', compact('chats'));
    }
}