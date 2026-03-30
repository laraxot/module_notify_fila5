---
title: Theme Isolation Philosophy
description: Perché i temi vivono isolati rispetto ai moduli, come vengono registrati dinamicamente
---

# Theme Isolation Philosophy

## Principio Fondamentale

**Moduli = parte dell'applicazione. Temi = vestiti grafici intercambiabili.**

Il tema è configurabile: cambiare `pub_theme` in `config/local/fixcity/xra.php` cambia il tema **senza toccare nessun file PHP dell'app**.

---

## Moduli vs Temi

### Moduli (`Modules/*/`)

- Fanno parte del core Laravel dell'applicazione
- Condividono `vendor/`, `composer.lock`, ciclo di vita composer della root
- Il `merge-plugin` fonde i loro `require` nel lock principale → un solo `composer update -W` alla root installa tutto
- Namespace: `Modules\NomeModulo\`

### Temi (`Themes/*/`)

- Sono plugin grafici **autonomi** con vita propria
- Hanno **proprio** `package.json`, `node_modules`, `vite.config.js`
- Hanno **proprio** `composer.json` con `minimum-stability` potenzialmente diverso (es. `beta` vs `dev`)
- Il loro ciclo di build è separato: `cd Themes/NomeTema && composer update -W && npm install && npm run build && npm run copy`

---

## Perché i temi NON vanno nel merge-plugin

```json
// ✅ CORRETTO
"merge-plugin": {
    "include": [
        "Modules/*/composer.json"
    ]
}

// ❌ SBAGLIATO
"merge-plugin": {
    "include": [
        "Modules/*/composer.json",
        "Themes/*/composer.json"   // NO!
    ]
}
```

### Conseguenze del merge sbagliato

1. **Dipendenze duplicate** — `filament ^5.0` del tema verrebbe duplicato nel lock dell'app → conflitti
2. **Stabilità incompatibile** — il tema usa `minimum-stability: beta`, l'app usa `dev` → comportamento imprevedibile
3. **Rottura dell'isolamento** — `composer update -W` alla root toccherebbe dipendenze del tema in modo incontrollato
4. **Impossibilità di aggiornare il tema indipendentemente** — `cd Themes/Sixteen && composer update -W` non funzionerebbe più correttamente

### Come il tema viene registrato nell'app

**MAI** in `AppServiceProvider` o `bootstrap/providers.php`.
**MAI** hardcodare `\Themes\Sixteen\Providers\ThemeServiceProvider::class`.

Il tema è registrato **dinamicamente** da `CmsServiceProvider`:

```php
// Modules/Cms/app/Providers/CmsServiceProvider.php

public function register(): void
{
    // Legge pub_theme da xra.php → es. 'Sixteen'
    if ($this->xot->register_pub_theme) {
        $theme_path = base_path('Themes/'.$this->xot->pub_theme.'/resources/views');
        Config::set('view.paths', array_merge([$theme_path], config('view.paths')));
    }
}

public function boot(): void
{
    if ($this->xot->register_pub_theme) {
        $this->registerNamespaces('pub_theme');
        // → registra namespace Blade 'pub_theme::' → Themes/Sixteen/resources/views
    }
}
```

**Risultato**: il namespace Blade è sempre `pub_theme::`, mai `sixteen::`.
Cambia `pub_theme: 'TwentyOne'` → il sistema usa automaticamente `Themes/TwentyOne/`.

---

## Ciclo di vita del tema

```bash
# Sviluppo tema
cd laravel/Themes/Sixteen

# Installare dipendenze PHP del tema (isolate)
composer update -W

# Installare dipendenze JS
npm install

# Compilare assets
npm run build

# Pubblicare assets compilati nella public_html
npm run copy
```

### Perché `npm run copy`?

Il tema compila i suoi asset in una cartella locale (`dist/`), poi `copy` li pubblica in `public_html/themes/NomeTema/`. Questo permette al webserver di servirli senza esporre la struttura interna del tema.

L'errore `Vite manifest not found at: public_html/themes/NomeTema/manifest.json` significa che `npm run build && npm run copy` non è stato eseguito dopo una modifica.

---

## Regola DRY+KISS

> Un tema cambia il vestito, non la logica. Un modulo aggiunge comportamento.

I temi non devono mai contenere logica business — solo view, component, css, js. La logica sta nei moduli.

---

**Ultimo aggiornamento**: 2026-03-30
