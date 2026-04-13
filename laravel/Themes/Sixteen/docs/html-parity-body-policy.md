# Policy HTML parity: `<body>` SENZA CLASSI — Regola Permanente

## Regola FONDAMENTALE (SEMpre applicata)

> **IL TAG `<body>` DEVE ESSERE SEMPRE PLAIN: `<body>` — SENZA CLASSI, SENZA ATTRIBUTI.**
>
> Questo vale per TUTTE le pagine, non solo `/tests/*`.

### Perché

Il reference [Design Comuni](https://italia.github.io/design-comuni-pagine-statiche/sito/) usa `<body>` senza classi. Per HTML structural parity:
- **Reference**: `<body>` (nessuna classe)
- **Nostro codice**: `<body>` (nessuna classe) ✅

### Come gestire lo styling pagina-specific

TUTTA la styling pagina-specific si gestisce via **CSS/JS**, NON con classi sul `<body>`:

#### Opzione 1: Selettori basati sul wrapper (PREFERITO)

```html
<!-- Nel blade -->
<div class="tests-view-wrapper" data-slug="segnalazione-02-dati">
  ...
</div>
```

```css
/* CSS: scoped al wrapper */
.tests-view-wrapper[data-slug="segnalazione-02-dati"] .stepper { ... }
```

#### Opzione 2: Selettori `body:has()` (moderno)

```css
body:has(.tests-view-wrapper[data-slug="segnalazione-02-dati"]) .stepper { ... }
```

#### Opzione 3: Regole CSS globali nel tema

Il tema Sixteen già gestisce lo styling del body via CSS globale in `style-apply.css`:

```css
body {
  @apply m-0 p-0 w-full text-base leading-normal block;
  font-family: "Titillium Web";
  color: var(--bs-dark);
  background: white;
}
```

## Implementazione Corretta

### Layout: `components/layouts/main.blade.php`

```blade
<body>
    {{ $slot }}
    ...
</body>
```

✅ **CORRETTO** — `<body>` senza classi, senza attributi.

### Pagina: `pages/tests/[slug].blade.php`

```blade
<x-layouts.app>
    @volt('tests.view')
    <div class="tests-view-wrapper" data-slug="{{ $slug }}">
        @foreach($blocks as $block)
            @include($block->view, array_merge($data, ['data' => $block->data]))
        @endforeach
    </div>
    @endvolt
</x-layouts.app>
```

✅ **CORRETTO** — Il wrapper ha la classe e il data attribute per CSS scoping.

## Implementazione SBAGLIATA (MAI USARE)

```blade
<!-- ❌ SBAGLIATO — NON mettere classi sul body -->
<body class="page-tests-segnalazione-02-dati">
```

```blade
<!-- ❌ SBAGLIATO — NIENTE @class sul body -->
<body @class(['dc-homepage-parity' => $isHomepageParity])>
```

```blade
<!-- ❌ SBAGLIATO — NIENTE attributi condizionali sul body -->
<body x-data="{ page: 'segnalazione' }">
```

## Collegamenti Bidirezionali

- CSS/JS parity generale: [css-js-parity.md](./css-js-parity.md)
- BLOCK_IMPLEMENTATION_GUIDE: [BLOCK_IMPLEMENTATION_GUIDE.md](./BLOCK_IMPLEMENTATION_GUIDE.md)
- Design Comuni Architettura: [design-comuni/ARCHITECTURAL_DECISIONS.md](./design-comuni/ARCHITECTURAL_DECISIONS.md)
- Indice tema: [00-index.md](./00-index.md)
- Modulo Fixcity — Body Parity Rule: [../../../Modules/Fixcity/docs/html-body-parity-rule.md](../../../Modules/Fixcity/docs/html-body-parity-rule.md)
- Story 1-3 — Stepper Responsive + No Italian + Body Plain: [../../../.planning/stories/1-3-segnalazione-02-dati-stepper-responsive-no-italian-body-plain.md](../../../.planning/stories/1-3-segnalazione-02-dati-stepper-responsive-no-italian-body-plain.md)
- Master Index: [../../../docs/MODULE_DOCS_INDEX.md](../../../docs/MODULE_DOCS_INDEX.md)
