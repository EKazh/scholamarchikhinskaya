<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //show profile
    public function showAccount(Request $request)
    {
        $user = Auth::user(); // Получаем текущего авторизованного пользователя

        if (!$user) {
            return redirect()->route('login')->with('error', 'Вы должны войти в систему.');
        }

        $user->load(['teachingClasses', 'parentClasses']);

        return view('dashboard.account', compact('user'));
    }
}
