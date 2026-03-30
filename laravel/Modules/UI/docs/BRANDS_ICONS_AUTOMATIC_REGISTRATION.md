# 🎨 UI Brands Icons - Automatic Registration

**Version**: 1.0  
**Created**: 2026-03-30  
**Status**: ✅ Active  
**Owner**: Multi-Agent Team

---

## 🚨 Golden Rule

> **SVG in `Modules/UI/resources/svg/brands/` → `ui-brands.{filename}`**

Il sistema registra **AUTOMATICAMENTE** gli SVG con:
- **Namespace**: `ui-brands` (modulo lowercase + dash)
- **Name**: `{filename}` (senza .svg)
- **Usage**: `<x-filament::icon icon="ui-brands.{name}" />`

---

## 📁 File Structure

```
laravel/Modules/UI/resources/svg/brands/
├── facebook.svg      → ui-brands.facebook
├── twitter.svg       → ui-brands.twitter
├── youtube.svg       → ui-brands.youtube
├── telegram.svg      → ui-brands.telegram
├── whatsapp.svg      → ui-brands.whatsapp
└── rss.svg           → ui-brands.rss
```

---

## ✅ Usage

### In Blade Templates

```blade
{{-- Social Icons --}}
<div class="flex gap-4">
    <a href="#" aria-label="Facebook">
        <x-filament::icon 
            icon="ui-brands.facebook" 
            class="w-6 h-6"
            aria-hidden="true" 
        />
    </a>
    
    <a href="#" aria-label="Twitter">
        <x-filament::icon 
            icon="ui-brands.twitter" 
            class="w-6 h-6"
            aria-hidden="true" 
        />
    </a>
    
    <a href="#" aria-label="YouTube">
        <x-filament::icon 
            icon="ui-brands.youtube" 
            class="w-6 h-6"
            aria-hidden="true" 
        />
    </a>
    
    <a href="#" aria-label="Telegram">
        <x-filament::icon 
            icon="ui-brands.telegram" 
            class="w-6 h-6"
            aria-hidden="true" 
        />
    </a>
    
    <a href="#" aria-label="WhatsApp">
        <x-filament::icon 
            icon="ui-brands.whatsapp" 
            class="w-6 h-6"
            aria-hidden="true" 
        />
    </a>
    
    <a href="#" aria-label="RSS">
        <x-filament::icon 
            icon="ui-brands.rss" 
            class="w-6 h-6"
            aria-hidden="true" 
        />
    </a>
</div>
```

### In PHP Code

```php
// Icon name format
$iconName = 'ui-brands.facebook';

// Usage in components
<x-filament::icon :icon="$iconName" class="w-6 h-6" />
```

---

## 🔧 How It Works

### 1. File Placement

Place SVG files in:
```
laravel/Modules/UI/resources/svg/brands/
```

### 2. Automatic Registration

**Module**: UI  
**Namespace**: `ui` (lowercase)  
**Directory**: `brands`  
**Result**: `ui-brands.{filename}`

### 3. Build Process

```bash
# During npm run build
npm run build

# System automatically:
1. Scans Modules/UI/resources/svg/
2. Registers with namespace ui-brands
3. Generates sprite sheet
4. Makes available to Filament
```

---

## 📊 Available Icons

| Icon | File | Usage |
|------|------|-------|
| **Facebook** | `facebook.svg` | `ui-brands.facebook` |
| **Twitter** | `twitter.svg` | `ui-brands.twitter` |
| **YouTube** | `youtube.svg` | `ui-brands.youtube` |
| **Telegram** | `telegram.svg` | `ui-brands.telegram` |
| **WhatsApp** | `whatsapp.svg` | `ui-brands.whatsapp` |
| **RSS** | `rss.svg` | `ui-brands.rss` |

---

## ➕ Adding New Brand Icons

### Step 1: Create SVG File

```bash
# Create file
touch laravel/Modules/UI/resources/svg/brands/instagram.svg
```

### Step 2: Add SVG Content

```xml
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
    <!-- Instagram SVG path -->
</svg>
```

### Step 3: Use in Blade

```blade
<x-filament::icon 
    icon="ui-brands.instagram" 
    class="w-6 h-6"
    aria-hidden="true" 
/>
```

**No registration needed!** Automatic.

---

## 🎯 Naming Convention

### Format

```
{module-lowercase}-brands.{filename}
```

**Examples**:
- `Modules/UI/resources/svg/brands/facebook.svg` → `ui-brands.facebook`
- `Modules/UI/resources/svg/brands/twitter.svg` → `ui-brands.twitter`
- `Modules/UI/resources/svg/brands/youtube.svg` → `ui-brands.youtube`

### Why This Convention?

1. **Module Namespace**: `ui` (lowercase from `UI`)
2. **Category**: `brands` (from directory name)
3. **Separator**: `-` (dash)
4. **Icon Name**: `{filename}` (without .svg)

---

## 🔍 Troubleshooting

### Issue 1: Icon Not Showing

**Symptom**: `<x-filament::icon icon="ui-brands.facebook" />` shows nothing

**Solutions**:
```bash
# 1. Check file exists
ls -la laravel/Modules/UI/resources/svg/brands/facebook.svg

# 2. Clear cache
php artisan view:clear
php artisan cache:clear

# 3. Rebuild assets
cd laravel/Themes/Sixteen
npm run build

# 4. Check icon registered
php artisan tinker
>>> \Filament\Support\Facades\FilamentIcon::get('ui-brands.facebook')
```

### Issue 2: Wrong Icon Name

**Symptom**: Using `ui-brands-facebook` (wrong separator)

**Solution**:
```blade
{{-- WRONG --}}
<x-filament::icon icon="ui-brands-facebook" />

{{-- CORRECT --}}
<x-filament::icon icon="ui-brands.facebook" />
```

**Format**: `ui-brands.{name}` (dot, not dash)

### Issue 3: Icon Color Wrong

**Symptom**: Icon appears but wrong color

**Solution**:
```blade
{{-- Use currentColor for fill --}}
<x-filament::icon 
    icon="ui-brands.facebook" 
    class="w-6 h-6 fill-current text-primary"
    aria-hidden="true" 
/>

{{-- Or use specific color --}}
<x-filament::icon 
    icon="ui-brands.facebook" 
    class="w-6 h-6"
    style="color: #1877F2;"
    aria-hidden="true" 
/>
```

---

## 📚 Related Documentation

- [SVG Icon Convention](./SVG_ICON_CONVENTION.md)
- [Filament 5 Icons](https://filamentphp.com/docs/5.x/support/icons)
- [Bootstrap Italia Icons](https://italia.github.io/bootstrap-italia/docs/iconografia/)
- [Theme Architecture](./THEME_ARCHITECTURE_OUTFIT.md)

---

## 🤖 Multi-Agent Coordination

**OpenViking Context**:
```bash
openviking add-memory "UI Brands icons: SVG in Modules/UI/resources/svg/brands/ → ui-brands.{name}. Usage: <x-filament::icon icon=\"ui-brands.facebook\" />."
```

**GSD Phase**: `.planning/phases/ui-brands-icons/` ✅ COMPLETE

---

**Last Updated**: 2026-03-30  
**Registration**: Automatic  
**Usage**: `<x-filament::icon icon="ui-brands.{name}" />`  
**Owner**: Multi-Agent Team
