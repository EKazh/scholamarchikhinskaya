<?php

namespace App\Http\Controllers;

use App\Models\ClassChat;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassChatController extends Controller
{
    public function showChat($classId)
    {
        $schoolClass = SchoolClass::with('chat.messages.user')->findOrFail($classId);

        $chat = $schoolClass->chat ?? $schoolClass->chat()->create();

        if (! $chat->userCanAccess(Auth::user())) {
            abort(403, 'Доступ к чату запрещён');
        }

        return view('dashboard.chat', compact('chat', 'schoolClass'));
    }

    public function sendMessage(Request $request, $classId)
    {
        $request->validate(['message' => 'required|string|max:1000']);

        $schoolClass = SchoolClass::findOrFail($classId);
        $chat = $schoolClass->chat ?? $schoolClass->chat()->create();

        if (! $chat->userCanAccess(Auth::user())) {
            return back()->withErrors(['message' => 'Нет доступа к чату.']);
        }

        $chat->messages()->create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->withFragment('chat-end');
    }
}
