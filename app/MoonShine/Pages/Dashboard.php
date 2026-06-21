<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use App\Models\TodoItem;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Layout\Box;
use App\Models\Category;
use App\Models\Document;
use App\Models\Newinfo;
use App\Models\Feedback;
use App\Models\SchoolClass;
use App\Models\User;
#[\MoonShine\MenuManager\Attributes\SkipMenu]

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Дашбоард';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
	{
		return [
            Grid::make([
                Column::make([
                        ValueMetric::make('Категории')
                            ->value(fn() => Category::count())
                    ],
                colSpan: 4,
                adaptiveColSpan: 12
                ),
                Column::make([
                        ValueMetric::make('Документы')
                            ->value(fn() => Document::count())
                    ],
                colSpan: 4,
                adaptiveColSpan: 12
                ),
                Column::make([
                        ValueMetric::make('Новости')
                            ->value(fn() => NewInfo::count())
                    ],
                colSpan: 4,
                adaptiveColSpan: 12
                ),
                Column::make([
                        ValueMetric::make('Сообщения из обратной связи')
                            ->value(fn() => Feedback::count())
                    ],
                colSpan: 4,
                adaptiveColSpan: 12
                ),
                Column::make([
                        ValueMetric::make('Классы')
                            ->value(fn() => SchoolClass::count())
                    ],
                colSpan: 4,
                adaptiveColSpan: 12
                ),
                Column::make([
                        ValueMetric::make('Пользователи')
                            ->value(fn() => User::count())
                    ],
                colSpan: 4,
                adaptiveColSpan: 12
                ),
            ]),
        ];
	}
}
