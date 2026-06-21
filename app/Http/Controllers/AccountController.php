<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //show profile
    public function showAccount(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Вы должны войти в систему.');
        }

        // Загружаем связи
        $user->load(['classes', 'teachingClasses', 'parentClasses']);

        // Убеждаемся, что связи существуют
        $teachingClasses = $user->getRelation('teachingClasses') ?? collect();
        $parentClasses = $user->getRelation('parentClasses') ?? collect();

        $classes = $user->role === 'teacher'
            ? $teachingClasses
            : $parentClasses;

        return view('dashboard.account', compact('user', 'classes'));
    }
}
