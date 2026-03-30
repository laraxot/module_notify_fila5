# Tests Routing Governance

## Regola

Nel tema le pagine `tests` devono seguire lo stesso contratto Folio + Volt + `x-page`.

Questo implica due entrypoint distinti:
- `resources/views/pages/tests/index.blade.php` per lo slug fisso `tests.index`
- `resources/views/pages/tests/[slug].blade.php` per gli slug dinamici `tests.{slug}`

## Perche

La pagina `tests/index` non deve leggere JSON dal filesystem, fare scan di cartelle o costruire la lista in Blade.

Come tutte le altre pagine CMS-driven deve:
- delegare il contenuto a `x-page`
- usare `PageSlugMiddleware`
- mantenere la logica di composizione nei JSON tenant
- restare un adapter sottile e uniforme

## Pattern corretto

### Index fisso

```php
name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = '';
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = 'tests.index';
        $this->data = [];
    }
};
```

### Slug dinamico

```php
name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;
        $this->data = ['slug' => $slug];
    }
};
```

## Anti-pattern

Sono da evitare dentro `pages/tests/index.blade.php`:
- `@extends` con layout tradizionale
- `glob()` per leggere i JSON
- `file_get_contents()` / `json_decode()` in view
- grouping o listing manuale in Blade

La pagina deve essere CMS-driven, non filesystem-driven.
