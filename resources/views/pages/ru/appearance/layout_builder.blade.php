<x-page title="Icons" :sectionMenu="[
    'Разделы' => [
        ['url' => '#publish', 'label' => 'Публикация шаблона'],
        ['url' => '#topbar', 'label' => 'Верхнее меню'],
    ]
]">

<x-sub-title id="publish">Публикация шаблона</x-sub-title>

<x-p>
    Для изменения структуры шаблона необходимо воспользоваться LayoutBuilder
</x-p>

<x-p>
    Для начала класс по изменению шаблона нужно опубликовать
</x-p>

<x-code language="shell">
php artisan moonshine:layout
</x-code>

<x-p>
    После чего в директории <code>app/MoonShine</code> появится класс <code>MoonShineLayout.php</code>
</x-p>

<x-code language="php">
namespace App\MoonShine;

use MoonShine\Components\Layout\{Content, Flash, Footer, Header, LayoutBlock, LayoutBuilder, Menu, Sidebar};
use MoonShine\Contracts\MoonShineLayoutContract;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
            ]),
            LayoutBlock::make([
                Flash::make(),
                Header::make(),
                Content::make(),
                Footer::make()->copyright(fn (): string => <<<'HTML'
                        &copy; 2021-2023 Made with ❤️ by
                        <a href="https://cutcode.dev"
                            class="font-semibold text-primary hover:text-secondary"
                            target="_blank"
                        >
                            CutCode
                        </a>
                    HTML)
                    ->menu([
                        'https://github.com/moonshine-software/moonshine' => 'GitHub',
                    ]),
            ])->customAttributes(['class' => 'layout-page']),
        ]);
    }
}
</x-code>
<x-sub-title id="topbar">Верхнее меню</x-sub-title>

<x-p>
    По умолчанию в MoonShine есть компонент для верхнего меню,
    давайте взглянем как в LayoutBuilder заменить Sidebar на TopBar
</x-p>

<x-code language="php">
namespace App\MoonShine;

use MoonShine\Components\Layout\{TopBar, Content, Flash, Footer, Header, LayoutBlock, LayoutBuilder, Menu, Sidebar};
use MoonShine\Contracts\MoonShineLayoutContract;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            // [tl! focus:start]
            TopBar::make([
                Menu::make()->top(),
            ]),
            // [tl! focus:end]
            LayoutBlock::make([
                Flash::make(),
                Header::make(),
                Content::make(),
                Footer::make()->copyright(fn (): string => <<<'HTML'
                        &copy; 2021-2023 Made with ❤️ by
                        <a href="https://cutcode.dev"
                            class="font-semibold text-primary hover:text-secondary"
                            target="_blank"
                        >
                            CutCode
                        </a>
                    HTML)
                    ->menu([
                        'https://github.com/moonshine-software/moonshine' => 'GitHub',
                    ]),
            ])->customAttributes(['class' => 'layout-page']),
        ])
        // [tl! focus:start]
            ->customAttributes(['class' => 'layout-wrapper--top-menu']);
        // [tl! focus:end]
    }
}
</x-code>



</x-page>
