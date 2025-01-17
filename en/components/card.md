# Card

- [Basics](#basics)
- [Header](#header)
- [Buttons](#actions)
- [Subtitle](#subtitle)
- [URL](#url)
- [Thumbnails](#thumbnail)
- [Values List](#values)

---

<a name="basics"></a>
## Basics

The `Card` component allows you to create element cards.

You can create a `Card` using the static method `make()` of the `Card` class.

```php
make(
    Closure|string $title = '',
    Closure|array|string $thumbnail = '',
    Closure|string $url = '#',
    Closure|array $values = [],
    Closure|string|null $subtitle = null,
    bool $overlay = false,
)
```

- `$title` - the title of the card,
- `$thumbnail` - images,
- `$url` - link,
- `$values` - list of values,
- `$subtitle` - subtitle.
- `$overlay` - the overlay mode allows placing the header and titles over the card image.

~~~tabs
tab: Class
```php
use MoonShine\UI\Components\Card;

Card::make(
    title: fake()->sentence(3),
    thumbnail: 'https://moonshine-laravel.com/images/image_1.jpg',
    url: fn() => 'https://cutcode.dev',
    values: ['ID' => 1, 'Author' => fake()->name()],
    subtitle: date('d.m.Y'),
)
```
tab: Blade
```blade
<x-moonshine::card
        :title="fake()->sentence(3)"
        :thumbnail="'https://moonshine-laravel.com/images/image_1.jpg'"
        :url="'https://cutcode.dev'"
        :subtitle="'test'"
        :values="['ID' => 1, 'Author' => fake()->name()]"
>
    {{ fake()->text(100) }}
</x-moonshine::card>
```
~~~

<a name="header"></a>
## Header

The `header()` method allows you to set a header for the cards.

```php
header(Closure|string $value)
```

- `$value` - a column or closure that returns HTML code.

```php
Cards::make(
    title: fake()->sentence(3),
    thumbnail: '/images/image_2.jpg',
)
    ->header(static fn() => Badge::make('new', 'success'))
```

<a name="actions"></a>
## Buttons

To add buttons to the card, you can use the `actions()` method.

```php
actions(Closure|string $value)
```

```php
Cards::make(
    title: fake()->sentence(3),
    thumbnail: '/images/image_1.jpg',
)
    ->actions(
        static fn() => ActionButton::make('Edit', route('name.edit'))
    )
```

<a name="subtitle"></a>
## Subtitle

```php
subtitle(Closure|string $value)
```

- `$value` - a column or closure that returns a subtitle.

```php
Cards::make(
    title: fake()->sentence(3),
    thumbnail: '/images/image_2.jpg',
)
    ->subtitle(static fn() => 'Subtitle')
```

<a name="url"></a>
## URL

The `url()` method allows you to set a link for the card header.

```php
url(Closure|string $value)
```

- `$value` - *url* or closure.

```php
Cards::make(
    title: fake()->sentence(3),
    thumbnail: '/images/image_1.jpg',
)
    ->url(static fn() => 'https://cutcode.dev')
```

<a name="thumbnail"></a>
## Thumbnails

To add a carousel of images to the card, you can use the `thumbnails()` method.

```php
thumbnails(Closure|string|array $value)
```

```php
Cards::make(
    title: fake()->sentence(3),
)
    ->thumbnail(['/images/image_2.jpg','/images/image_1.jpg'])
```

<a name="values"></a>
## Values List

To add a list of values to the card, you can use the `values()` method.

```php
values(Closure|array $value)
```

- `$value` - an associative array of values or a closure.

```php
Cards::make(
    title: fake()->sentence(3),
    thumbnail: '/images/image_1.jpg',
)
    ->values([
        'ID' => 1,
        'Author' => fake()->name()
    ])
```