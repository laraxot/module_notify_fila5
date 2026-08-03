---
title: "🏛️ Architecture Zen Philosophy"
type: concept
tags: [architecture, zen]
created: 2026-07-14
updated: 2026-07-14
qmd: "03-architecture-zen 🏛️ architecture zen philosophy"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./00-index.md"
  - "./01-gsd-workflow.md"
  - "./02-bmad-workflow.md"
  - "./04-filament-philosophy.md"
  - "./05-front-office-audit.md"
  - "./06-cinematic-effects.md"
  - "./07-mcp-tailwind-ui.md"
  - "./08-verified-commit-governance.md"
---

# 🏛️ Architecture Zen Philosophy

**Part of**: [00-index-1.md](00-index-1.md) — AI Agents Coordination  
**Related**: [04-filament-philosophy.md](04-filament-philosophy.md) — Filament Widgets

---

## 🔴 Fundamental Rules

### 1. **NO Themes/*/Http/Livewire/**

**Philosophy**: Theme is the DRESS, not the LOGIC.

```
❌ WRONG
Themes/TwentyOne/Http/Livewire/
Themes/Sixteen/Http/Livewire/

✅ CORRECT
<<<<<<< HEAD
Modules/Forecast/app/Filament/Widgets/
=======
Modules/Predict/app/Filament/Widgets/
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
Modules/UI/app/Filament/Widgets/
```

**Why**:
- **Modules** = Business logic (agnostic, reusable)
- **Themes** = Dress (aesthetics, layout, CSS)
- **Filament Widgets** = UI components (back office + front office)
- **NO Livewire in theme** = Separation of concerns

---

### 2. **NO laravel/docs/**

**Philosophy**: Documentation distributed, close to code.

```
❌ WRONG
laravel/docs/
  ├── COMPOSER_RULE.md
  └── FILAMENT_RULE.md

✅ CORRECT
docs/                          # Only CROSS-MODULE documents
  ├── ARCHITECTURE_ZEN.md
  └── MULTI_AGENT_COORDINATION.md

<<<<<<< HEAD
Modules/Forecast/docs/          # Forecast-specific docs
=======
Modules/Predict/docs/          # Predict-specific docs
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
  ├── PHILOSOPHY.md
  ├── WIDGETS.md
  └── SEEDERS.md

Themes/TwentyOne/docs/         # Theme-specific docs
  ├── DESIGN_SYSTEM.md
  └── KINETIC_WEB_DESIGN.md
```

**Why**:
- **Documentation close to code** = Easier to maintain
- **docs/ root** = Only cross-module documents
- **Module docs** = Module-specific documentation
- **Theme docs** = Theme-specific design system

---

### 3. **NO foreach in blade for lists**

**Philosophy**: Filament Tables does everything.

```blade
❌ WRONG
<<<<<<< HEAD
@foreach($forecasts as $forecast)
    <div class="card">{{ $forecast->title }}</div>
@endforeach

✅ CORRECT
<x-page side="content" slug="forecasts.index" />

// JSON: forecasts.index.json
{
  "type": "widget",
  "data": {
    "view": "pub_theme::filament.widgets.forecast-table",
    "widget": "Modules\\Forecast\\Filament\\Widgets\\ForecastTableWidget"
=======
@foreach($predicts as $predict)
    <div class="card">{{ $predict->title }}</div>
@endforeach

✅ CORRECT
<x-page side="content" slug="predicts.index" />

// JSON: predicts.index.json
{
  "type": "widget",
  "data": {
    "view": "pub_theme::filament.widgets.predict-table",
    "widget": "Modules\\Predict\\Filament\\Widgets\\PredictTableWidget"
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
  }
}
```

**Why**:
- **Filament Table** = Search, filters, sorting, pagination (automatic)
- **NO foreach** = NO logic in blade
- **Widget** = Reusable, testable, maintainable

---

### 4. **NO Blade Logic**

**Philosophy**: Blade is presentation only.

```blade
❌ WRONG
@php
<<<<<<< HEAD
    $probability = $forecast->transactions()->sum('amount');
    $participants = $forecast->transactions()->distinct('user_id')->count();
=======
    $probability = $predict->transactions()->sum('amount');
    $participants = $predict->transactions()->distinct('user_id')->count();
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
@endphp

✅ CORRECT
// Action class
<<<<<<< HEAD
class CalculateForecastStatsAction {
    public function execute(Forecast $forecast): array {
        return [
            'probability' => $forecast->transactions()->sum('amount'),
            'participants' => $forecast->transactions()->distinct('user_id')->count(),
=======
class CalculatePredictStatsAction {
    public function execute(Predict $predict): array {
        return [
            'probability' => $predict->transactions()->sum('amount'),
            'participants' => $predict->transactions()->distinct('user_id')->count(),
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
        ];
    }
}

// Blade
{{ $stats['probability'] }}
```

**Why**:
- **Blade** = Presentation only (HTML, CSS classes)
- **Actions** = Business logic
- **Components** = Complex presentation logic

---

## 🧠 Zen Philosophy

### Theme is the Dress

> **"Module is the body, theme is the dress"**

**Module (Body)**:
- ✅ Business logic
- ✅ Data models
- ✅ Filament Widgets
- ✅ Actions, Services
- ✅ Seeders, Migrations

**Theme (Clothing)**:
- ✅ Layout (app.blade.php)
- ✅ CSS (Tailwind)
- ✅ Aesthetic components
- ✅ Folio pages (routing)
- ❌ NO business logic
- ❌ NO Livewire
- ❌ NO Models

---

### Filament Widgets are Universal

> **"One widget for all themes"**

```
<<<<<<< HEAD
Modules/Forecast/app/Filament/Widgets/ForecastTableWidget.php
    ↓
pub_theme::filament.widgets.forecast-table (view namespace)
    ↓
Themes/TwentyOne/resources/views/filament/widgets/forecast-table.blade.php
=======
Modules/Predict/app/Filament/Widgets/PredictTableWidget.php
    ↓
pub_theme::filament.widgets.predict-table (view namespace)
    ↓
Themes/TwentyOne/resources/views/filament/widgets/predict-table.blade.php
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

**Benefits**:
- ✅ Widget written ONCE
- ✅ Used in ALL themes
- ✅ Theme customizes only view
- ✅ Logic ALWAYS in module

---

### Documentation is Treasure Map

> **"Documentation close to code = Treasure found"**

```
<<<<<<< HEAD
Modules/Forecast/
=======
Modules/Predict/
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
├── app/
│   ├── Models/
│   ├── Filament/
│   └── Actions/
<<<<<<< HEAD
├── docs/              ← Treasure map of Forecast
=======
├── docs/              ← Treasure map of Predict
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
│   ├── PHILOSOPHY.md
│   ├── WIDGETS.md
│   └── SEEDERS.md
└── database/
    └── seeders/
```

**Rule**:
- **docs/ root** = Only cross-module documents
- **Module docs** = Module-specific
- **Theme docs** = Design system, CSS

---

## 🚨 Common Mistakes

### 1. ❌ Livewire in Theme

```
Themes/TwentyOne/Http/Livewire/
```

**✅ CORRECT**:
```
<<<<<<< HEAD
Modules/Forecast/app/Filament/Widgets/
=======
Modules/Predict/app/Filament/Widgets/
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

---

### 2. ❌ Documentation in root

```
laravel/docs/
  └── FILAMENT_RULE.md
```

**✅ CORRECT**:
```
docs/
  └── ARCHITECTURE_ZEN.md

<<<<<<< HEAD
Modules/Forecast/docs/
=======
Modules/Predict/docs/
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
  └── WIDGETS.md
```

---

### 3. ❌ Foreach in blade

```blade
<<<<<<< HEAD
@foreach($forecasts as $forecast)
    <x-forecast.card :forecast="$forecast"/>
=======
@foreach($predicts as $predict)
    <x-predict.card :predict="$predict"/>
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
@endforeach
```

**✅ CORRECT**:
```blade
<<<<<<< HEAD
<x-page side="content" slug="forecasts.index" />
=======
<x-page side="content" slug="predicts.index" />
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

// JSON
{
  "type": "widget",
<<<<<<< HEAD
  "widget": "Modules\\Forecast\\Filament\\Widgets\\ForecastTableWidget"
=======
  "widget": "Modules\\Predict\\Filament\\Widgets\\PredictTableWidget"
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
}
```

---

### 4. ❌ Logic in blade

```blade
@php
<<<<<<< HEAD
    $volume = $forecast->transactions()->sum('amount');
=======
    $volume = $predict->transactions()->sum('amount');
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
@endphp
```

**✅ CORRECT**:
```php
// Action
class CalculateVolumeAction {
<<<<<<< HEAD
    public function execute(Forecast $forecast) {
        return $forecast->transactions()->sum('amount');
=======
    public function execute(Predict $predict) {
        return $predict->transactions()->sum('amount');
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
    }
}

// Blade
{{ $volume }}
```

---

## ✅ Code Review Checklist

Before committing:

### Architecture
- [ ] ✅ NO `Themes/*/Http/Livewire/`
- [ ] ✅ Widgets in `Modules/*/Filament/Widgets/`
- [ ] ✅ NO `laravel/docs/` (use `docs/` or `Modules/*/docs/`)
- [ ] ✅ NO foreach in blade for lists (use Filament Table)
- [ ] ✅ NO logic in blade (use Actions)

### Documentation
- [ ] ✅ Documentation close to code
- [ ] ✅ docs/ root = only cross-module
- [ ] ✅ Module docs = module-specific
- [ ] ✅ Theme docs = design system, CSS

### Enforcement
- [ ] ✅ PHPStan: NO errors
- [ ] ✅ PHPMD: NO warnings
- [ ] ✅ Code Review: Architecture check
- [ ] ✅ Pre-commit hook: Architecture validation

---

## 🔗 Related Documentation

- **Filament Philosophy**: [04-filament-philosophy.md](04-filament-philosophy.md)
- **Front Office Audit**: [05-front-office-audit.md](05-front-office-audit.md)
- **External**: https://github.com/nWidart/laravel-modules

---

**Last Updated**: 2026-03-20  
**Status**: ✅ Mandatory  
**Enforcement**: PHPStan + Code Review + Pre-commit Hook
