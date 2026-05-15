<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use App\Models\SchoolClass;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\ActionButtons\ActionButton;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Пользователи';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('ФИО', 'full_name'),
            Text::make('Телефон', 'phone'),
            Text::make('Email', 'email'),
            Text::make('Роль', 'role'),
            Text::make('Класс', 'class_list'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Select::make('Классы', 'school_classes')
                ->multiple()
                ->options(SchoolClass::orderBy('class_number')->pluck('class_number', 'id')->toArray())
                ->default(fn($user) => $user?->schoolClasses->pluck('id')->toArray()),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param User $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'school_classes' => ['nullable', 'array'],
            'school_classes.*' => ['exists:school_classes,id'],
        ];
    }

    public function passThroughData(): bool
    {
        return true;
    }
    
    public function query(): Builder
    {
        return parent::query()->with('schoolClasses');
    }

    public function onSave(mixed $item): void
    {
        $data = request()->all();

        // Обновляем связь с классами ТОЛЬКО если передано
        if (isset($data['school_classes'])) {
            $role = $data['role'] ?? 'parent';

            $item->schoolClasses()->sync(
                collect($data['school_classes'])->mapWithKeys(fn($id) => [$id => ['role' => $role]])
            );
        }
    }
}
