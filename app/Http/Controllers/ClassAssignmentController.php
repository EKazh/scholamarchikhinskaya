<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassAssignmentController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        // Разрешить только родителям и учителям
        if (!in_array($user->role, ['parent', 'teacher'])) {
            abort(403, 'У вас нет прав на привязку классов.');
        }

        $request->validate([
            'class_ids' => 'required|array|min:1',
            'class_ids.*' => 'exists:school_classes,id',
        ]);

        // Синхронизируем классы (перезаписываем все старые)
        $user->classes()->sync($request->class_ids);

        // Дополнительно: если role не указана, ставим по умолчанию
        // (например, родитель по умолчанию, учитель — teacher)
        $defaultRole = $user->role === 'parent' ? 'parent' : 'teacher';
        $user->classes()->syncWithPivotValues($request->class_ids, ['role' => $defaultRole]);

        return back()->with('success', 'Классы успешно привязаны.');
    }
}