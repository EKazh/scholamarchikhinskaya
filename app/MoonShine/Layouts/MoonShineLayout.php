<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};

use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\DocumentResource;
use App\MoonShine\Resources\NewinfoResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\FeedbackResource;
use App\MoonShine\Resources\SchoolClassResource;
use App\MoonShine\Resources\UserResource;

final class MoonShineLayout extends AppLayout
{
    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make('Категории', CategoryResource::class),
            MenuItem::make('Документы', DocumentResource::class),
            MenuItem::make('Новости', NewinfoResource::class),
            MenuItem::make('Сообщения из обратной связи', FeedbackResource::class),
            MenuItem::make('Классы', SchoolClassResource::class),
            MenuItem::make('Пользователи', UserResource::class),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

}
