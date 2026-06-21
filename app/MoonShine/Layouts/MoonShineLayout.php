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
    Layout\Fragment,
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
    Layout\Title,
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
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),
            MenuItem::make('Категории', CategoryResource::class),
            MenuItem::make('Документы', DocumentResource::class)
                ->icon('document'),
            MenuItem::make('Новости', NewinfoResource::class),
            MenuItem::make('Сообщения из обратной связи', FeedbackResource::class),
            MenuItem::make('Классы', SchoolClassResource::class),
            MenuItem::make('Пользователи', UserResource::class)
                ->icon('users'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        $colorManager
            ->primary('#007bff')    // темно-синий — основной цвет (кнопки, линки)
            ->secondary('#123d81')  // светло-синий
            ->success('#10b981')    // зелёный
            ->danger('#ef4444')     // красный
            ->warning('#f59e0b')    // оранжевый
            ->info('#06b6d4')       // голубой
            ->body('#57a6f0')    // цвет боковой панели
            ->text('#212529')     // текст  
            ->sidebar('#1e1b4b')   
            ->sidebarText('#e2e8f0')
            ->sidebarActive('#3b82f6');

        // $colorManager->primary('#00000');
    }


    // for footer
    protected function getFooterCopyright(): string
    {
        return '© 2026 МКОУ "Маршихинская средняя образовательная школа". Все права защищены.';
    }

    protected function getFooterComponent(): Footer
    {
        return parent::getFooterComponent()->menu([
            '/' => 'Главная',
        ]);
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
