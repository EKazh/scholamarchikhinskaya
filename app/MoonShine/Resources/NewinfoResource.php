<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Newinfo;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\Image;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<Newinfo>
 */
class NewinfoResource extends ModelResource
{
    protected string $model = Newinfo::class;

    protected string $title = 'Новости';
    
    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Заголовок', 'news_title'),
            Text::make('Описание', 'news_description'),
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
                Text::make('Заголовок', 'news_title'),
                Textarea::make('Описание', 'news_description'),
                Image::make('Изображение', 'news_image'),
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
            Text::make('Заголовок', 'news_title'),
            Textarea::make('Описание', 'news_description'),
            Image::make('Изображение', 'news_image'),
        ];
    }

    /**
     * @param Newinfo $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'news_title' => 'required|string|max:255',
            'news_description' => 'required|string',
            'news_image' => 'nullable|image|max:10240',
        ];
    }
}
