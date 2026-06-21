<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //register
    public function showRegister()
    {
        $classes = SchoolClass::orderBy('class_number')->get();

        return view('auth.register', compact('classes'));
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:parent,teacher',
            'class_ids' => 'nullable|array',
            'class_ids.*' => 'exists:school_classes,id',
        ], [
            'full_name.required' => 'Поле обязательно для заполнения.',
            'phone.required' => 'Поле обязательно для заполнения.',
            'email.required' => 'Поле обязательно для заполнения.',
            'password.required' => 'Поле обязательно для заполнения.',
            'password.min' => 'Пароль должен содержать не менее 8 символов.',
            'phone.unique' => 'Пользователь с таким телефоном уже существует.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'email.email' => 'Неверный формат email.',
            'class_ids.array' => 'Выберите один или несколько классов.',
            'class_ids.*' => 'Один из выбранных классов недействителен.',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($validated['role'] === 'teacher' && empty($request->class_ids)) {
            return back()->withErrors(['class_ids' => 'Учитель должен быть привязан хотя бы к одному классу.']);
        }

        $user = User::create([
            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
        ]);

        if (!empty($request->class_ids)) {
            $classData = [];
            foreach ($request->class_ids as $id) {
                $classData[$id] = ['role' => $validated['role']];
            }

            $user->classes()->attach($classData);
        }

        auth()->login($user);

        return redirect()->route('account.show')->with('success', 'Вы успешно зарегистрировались.');
    }

    //login
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Поле email обязательно.',
            'password.required' => 'Пароль обязателен.',
            'email.email' => 'Неверный формат email.',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            auth()->login($user);
            return redirect()->route('account.show')->with('success', 'Вы успешно вошли в систему.');
        }

        return back()->withErrors(['email' => 'Неверный email или пароль.']);
    }

    //logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
