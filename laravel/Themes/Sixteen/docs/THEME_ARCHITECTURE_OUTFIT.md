# 🎨 Theme Architecture - "Il Tema è un Vestito"

**Version**: 1.0  
**Created**: 2026-03-30  
**Status**: ✅ Active Architecture  
**Owner**: Multi-Agent Team

---

## 🚨 Golden Rule

> **IL TEMA È UN VESTITO CONFIGURABILE - NON HARDCODARE**

Il tema **NON** va registrato manualmente in `AppServiceProvider.php`.

Il sistema carica il tema **DINAMICAMENTE** dalla configurazione.

---

## 📐 Architecture

### ❌ WRONG (Don't Do This)

```php
// AppServiceProvider.php - WRONG ❌
public function register(): void
{
    $this->app->register(\Themes\Sixteen\Providers\ThemeServiceProvider::class);
}
```

**Perché è sbagliato**:
- ❌ Hardcoded theme name
- ❌ No configuration flexibility
- ❌ Can't switch themes
- ❌ Violates "theme is a outfit" principle

### ✅ CORRECT (Automatic Loading)

```php
// AppServiceProvider.php - CORRECT ✅
<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // NOTHING! Theme is loaded automatically
    }

    public function boot(): void
    {
        // NOTHING! Theme is loaded automatically
    }
}
```

**Perché è corretto**:
- ✅ No hardcoded theme
- ✅ Configuration-driven
- ✅ Switch themes easily
- ✅ Follows "theme is a outfit" principle

---

## 🔧 How It Works

### 1. Configuration File

**Path**: `laravel/config/local/fixcity/xra.php`

```php
return [
    'pub_theme' => 'Sixteen',  // ← Theme name here
    // ... other config
];
```

### 2. XotBaseThemeServiceProvider

**Path**: `laravel/Modules/Xot/app/Providers/XotBaseThemeServiceProvider.php`

```php
abstract class XotBaseThemeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Reads theme from config
        $theme = config('xra.pub_theme');  // ← 'Sixteen'
        
        // Dynamically registers theme
        $this->registerTheme($theme);
    }
}
```

### 3. Theme ServiceProvider

**Path**: `laravel/Themes/Sixteen/app/Providers/ThemeServiceProvider.php`

```php
class ThemeServiceProvider extends XotBaseThemeServiceProvider
{
    protected string $themeName = 'Sixteen';
    
    public function register(): void
    {
        parent::register();  // ← Automatic registration
    }
}
```

### 4. Auto-Discovery

**Laravel Package Discovery** trova automaticamente:
- `Modules/*/Providers/*ServiceProvider.php`
- `Themes/*/Providers/*ServiceProvider.php`

**Nessuna registrazione manuale necessaria!**

---

## 🎯 Theme Switching

### Change Theme in 3 Steps

**Step 1**: Update config
```php
// laravel/config/local/fixcity/xra.php
return [
    'pub_theme' => 'TwentyOne',  // ← Change from 'Sixteen' to 'TwentyOne'
];
```

**Step 2**: Clear cache
```bash
php artisan config:clear
php artisan view:clear
```

**Step 3**: Done!
```
http://fixcity.local/  ← Now uses TwentyOne theme
```

**No code changes required!**

---

## 📁 Theme Structure

```
laravel/Themes/
├── Sixteen/                    # Current theme
│   ├── app/
│   │   └── Providers/
│   │       └── ThemeServiceProvider.php  ← Auto-registered
│   ├── resources/
│   │   ├── views/
│   │   └── css/
│   ├── public/
│   └── composer.json
├── TwentyOne/                  # Alternative theme
│   ├── app/
│   │   └── Providers/
│   │       └── ThemeServiceProvider.php  ← Auto-registered
│   └── ...
└── One/                        # Another theme
    └── ...
```

---

## 🔍 Service Provider Registration Order

### Automatic Order (by Laravel)

1. **XotBaseServiceProvider** (base services)
2. **ThemeServiceProvider** (theme services, reads config)
3. **ModuleServiceProviders** (module services)
4. **AppServiceProvider** (app-specific)

### Why This Order?

- **Xot** provides base functionality
- **Theme** provides view layer ("outfit")
- **Modules** provide business logic
- **App** provides customizations

---

## 📊 Configuration Layers

### Layer 1: Core Config

**File**: `laravel/config/app.php`

```php
'providers' => [
    // Laravel providers
    // Package providers (auto-discovered)
],
```

### Layer 2: Xot Config

**File**: `laravel/config/xot.php`

```php
return [
    'modules_enabled' => true,
    'theme_auto_register' => true,
];
```

### Layer 3: Local Config

**File**: `laravel/config/local/fixcity/xra.php`

```php
return [
    'pub_theme' => 'Sixteen',  // ← Theme selection
];
```

---

## 🎨 "Theme is a Outfit" Metaphor

### What It Means

| Concept | Metaphor | Implementation |
|---------|----------|----------------|
| **Theme** | Outfit/Vestito | View layer, CSS, assets |
| **Config** | Wardrobe choice | `config('xra.pub_theme')` |
| **Body** | Core app | Laravel + Modules |
| **Changing** | Try on new outfit | Change config value |

### Why This Metaphor Works

1. **Interchangeable**: Change outfit without changing body
2. **Configurable**: Choose from wardrobe (config)
3. **Non-invasive**: Outfit doesn't modify body
4. **Flexible**: Different outfits for different occasions

---

## ✅ Best Practices

### DO ✅

```php
// Read theme from config
$theme = config('xra.pub_theme');

// Use theme views
return view('pub_theme::pages.homepage');

// Use theme assets
<link rel="stylesheet" href="{{ theme_asset('css/app.css') }}">
```

### DON'T ❌

```php
// Hardcode theme name
$this->app->register(\Themes\Sixteen\Providers\ThemeServiceProvider::class);

// Hardcode theme path
view('Themes.Sixteen.pages.homepage');

// Assume theme name
if ($theme === 'Sixteen') { ... }
```

---

## 🔍 Troubleshooting

### Issue 1: Theme Not Loading

**Symptom**: Default Laravel views instead of theme

**Solution**:
```bash
# Clear cache
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Check config
php artisan tinker
>>> config('xra.pub_theme')
# Should return: "Sixteen"
```

### Issue 2: Wrong Theme Loading

**Symptom**: Different theme than configured

**Solution**:
```bash
# Verify config file
cat laravel/config/local/fixcity/xra.php | grep pub_theme

# Should be: 'pub_theme' => 'Sixteen',

# Check for override
php artisan tinker
>>> config()->get('xra.pub_theme')
```

### Issue 3: Theme Assets 404

**Symptom**: CSS/JS not loading

**Solution**:
```bash
# Publish theme assets
php artisan vendor:publish --tag=public --force

# Check asset path
php artisan tinker
>>> theme_asset('css/app.css')
# Should return: /themes/Sixteen/css/app.css
```

---

## 📚 Related Documentation

- [SVG Icon Convention](./SVG_ICON_CONVENTION.md)
- [Filament 5 Icons](https://filamentphp.com/docs/5.x/support/icons)
- [Bootstrap Italia](https://italia.github.io/bootstrap-italia/)
- [Test Pages Implementation](./TEST_PAGES_IMPLEMENTATION_STATUS.md)

---

## 🤖 Multi-Agent Coordination

**OpenViking Context**:
```bash
openviking add-memory "Theme is a outfit - configurable, not hardcoded. AppServiceProvider is empty. Theme loaded from config('xra.pub_theme')."
```

**GSD Phase**: `.planning/phases/theme-architecture/` ✅ COMPLETE

---

**Last Updated**: 2026-03-30  
**Architecture Status**: ✅ **CORRECT**  
**Theme Loading**: Automatic (config-driven)  
**AppServiceProvider**: Empty (as it should be)  
**Owner**: Multi-Agent Team
