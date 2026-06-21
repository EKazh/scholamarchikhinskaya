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
            MenuItem::make('Категории', CategoryResource::class)
                ->icon('archive-box-x-mark'),
            MenuItem::make('Документы', DocumentResource::class)
                ->icon('document'),
            MenuItem::make('Новости', NewinfoResource::class)
                ->icon('newspaper'),
            MenuItem::make('Сообщения из обратной связи', FeedbackResource::class)
                ->icon('envelope'),
            MenuItem::make('Классы', SchoolClassResource::class)
                ->icon('academic-cap'),
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
            ->body('#85bff5')    // цвет боковой панели
            ->text('#1a202c')  // текст  
            ->dark('#3d475f', 'DEFAULT')
            ->dark('#8a9fcc', 50)
            ->dark('#495881', 100)
            ->dark('#455074', 200)
            ->dark('#495881', 300)
            ->dark('#495881', 400)
            ->dark('#1f2536', 500)
            ->dark('#333e5c', 600)
            ->dark('#405874', 700)
            ->dark('#1f2536', 800)
            ->dark('#242836', 900);      // темный цвет

        // $colorManager->primary('#00000');
    }

    protected function getFaviconComponent(): Favicon
    {
        return parent::getFaviconComponent()->customAssets([
            'apple-touch' => 'apple-touch-icon.png',
            '32' => 'favicon-32x32.png',
            '16' => 'favicon-16x16.png',
        ]);
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
