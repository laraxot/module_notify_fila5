# Tests Folio Volt Pattern

## Scopo

Le pagine `/it/tests` e `/it/tests/{slug}` devono seguire lo stesso contratto frontoffice del progetto:

- route file-based con Folio
- componente page-local con Volt
- middleware `PageSlugMiddleware`
- rendering delegato a `<x-page side="content" :slug="$pageSlug" :data="$data" />`

## Regola

`tests/index.blade.php` non deve fare discovery file, glob, HTML raw o rendering diretto della lista.

Deve limitarsi a mappare:

- `/it/tests` -> `tests.index`
- `/it/tests/{slug}` -> `tests.{slug}`

In questo modo:

1. la route resta uniforme con tutto il CMS
2. la sorgente di verità resta nei JSON sotto `config/local/fixcity/database/content/pages`
3. i blocchi restano amministrabili tramite builder Filament
4. il tema non incorpora logica editoriale o scansione file

## Pattern Canonico

### Index

```php
name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = 'tests.index';
        $this->data = [];
    }
};
```

### Slug Dinamico

```php
name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;
        $this->data = [
            'slug' => $slug,
        ];
    }
};
```

## Visione

La pagina Folio non descrive il contenuto. Descrive solo il punto di ingresso nel runtime CMS.

La pagina JSON descrive il contenuto.

Il blocco Blade descrive la resa visuale.

Questa separazione evita accoppiamenti inutili e mantiene il sistema:

- DRY
- KISS
- coerente con `x-page`
- coerente con builder blocks
- coerente con namespace `pub_theme`

## File Coinvolti

- `resources/views/pages/tests/index.blade.php`
- `resources/views/pages/tests/[slug].blade.php`
- `config/local/fixcity/database/content/pages/tests.index.json`
- `config/local/fixcity/database/content/pages/tests.*.json`
