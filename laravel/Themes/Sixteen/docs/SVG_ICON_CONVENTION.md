# Convenzione icone SVG nel tema

Il tema non deve usare componenti inesistenti come `heroicon-o-facebook` per le icone brand.

## Regola

Per i brand social usare gli SVG registrati automaticamente dal modulo UI e renderizzarli con Filament.

```blade
<<<<<<< HEAD
{{-- CORRECT: Use Filament icon component --}}
<a href="#" aria-label="Facebook">
    <x-filament::icon 
        icon="heroicon-o-facebook" 
        class="w-6 h-6"
        aria-hidden="true" 
    />
</a>

{{-- CORRECT: With dynamic icon --}}
<x-filament::icon 
    :icon="$stat['icon']" 
    class="icon-lg icon-primary w-10 h-10" 
    aria-hidden="true" 
/>

{{-- CORRECT: Bootstrap Italia icon with SVG sprite --}}
<svg class="icon icon-sm">
    <use href="#it-facebook"></use>
</svg>
||||||| parent of f2e0249c (.)
{{-- CORRECT: Filament icon component --}}
<a href="#" aria-label="Facebook">
    <x-filament::icon 
        icon="ui-brands.facebook" 
        class="w-6 h-6"
        aria-hidden="true" 
    />
</a>

{{-- CORRECT: With dynamic icon --}}
<x-filament::icon 
    :icon="$stat['icon']" 
    class="icon-lg icon-primary w-10 h-10" 
    aria-hidden="true" 
/>

{{-- CORRECT: Bootstrap Italia icon with SVG sprite --}}
<svg class="icon icon-sm">
    <use href="#it-facebook"></use>
</svg>
=======
<x-filament::icon icon="ui-brands.facebook" class="w-5 h-5 text-current" />
>>>>>>> f2e0249c (.)
```

<<<<<<< HEAD
### Available Icons
||||||| parent of f2e0249c (.)
### Available Icon Sources

| Source | Format | Example |
|--------|--------|---------|
| **UI Brands** | `ui-brands.{name}` | `ui-brands.facebook` |
| **Heroicons** | `heroicon-o-{name}` | `heroicon-o-arrow-right` |
| **Bootstrap Italia** | `#it-{name}` | `#it-facebook` |

### Available Icons
=======
## Namespace corretto

- `facebook.svg` -> `ui-brands.facebook`
- `linkedin.svg` -> `ui-brands.linkedin`
- `instagram.svg` -> `ui-brands.instagram`
- `rss.svg` -> `ui-brands.rss`

## Dove applicarlo
>>>>>>> f2e0249c (.)

- footer di sezione
- blocchi social riusabili
- card o CTA con icone brand

## Da evitare

```blade
<x-heroicon-o-facebook class="w-5 h-5" />
```

```blade
<x-filament::icon icon="heroicon-o-facebook" class="w-5 h-5" />
```

## Riferimenti

- [SVG automatici del modulo UI](../../../Modules/UI/docs/SVG_ICONS_AUTOMATIC_REGISTRATION.md)
- [Dal tenant al pub_theme](../../../Modules/Tenant/docs/tenant-name-to-pub-theme.md)
