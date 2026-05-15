<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(!auth()->check()) {
            return redirect()->route('login')->with('error', 'Вы не авторизованы');
        }

        $user = auth()->user();

        if($user->role === $role) {
            return $next($request);
        }
        
        abort(403, 'Доступ запрещён незарегистрированным пользователям');
    }
}
