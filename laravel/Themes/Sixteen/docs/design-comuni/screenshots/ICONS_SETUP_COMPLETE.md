# 🎨 Icons Setup - Complete Guide

**Data**: 2026-03-30  
**Stato**: ✅ **CONFIGURATO**

## 📚 Icon Packages Installed

### 1. Blade Heroicons ✅

**Package**: `blade-ui-kit/blade-heroicons`

**Installation**:
```bash
cd laravel
composer require blade-ui-kit/blade-heroicons
```

**Usage**:
```blade
{{-- Outline icons --}}
<x-heroicon-o-facebook class="w-6 h-6" />
<x-heroicon-o-twitter class="w-6 h-6" />
<x-heroicon-o-instagram class="w-6 h-6" />

{{-- Solid icons --}}
<x-heroicon-s-facebook class="w-6 h-6" />
<x-heroicon-s-heart class="w-6 h-6" />

{{-- With classes --}}
<x-heroicon-o-facebook class="icon icon-sm icon-white" />
```

### 2. Custom SVG Brands ✅

**Location**: `laravel/Modules/UI/resources/svg/brands/`

**Files**:
- `facebook.svg`
- `twitter.svg`
- `youtube.svg`
- `telegram.svg`
- `whatsapp.svg`
- `rss.svg`

**Usage**:
```blade
{{-- Using Filament icon component --}}
<x-filament::icon icon="brands.facebook" class="icon icon-sm" />

{{-- Using SVG component --}}
<x-svg name="brands.facebook" class="icon icon-sm" />
```

## 🎯 Icon Strategy

### For Social Media Brands
**Use**: Custom SVG files
```blade
<x-filament::icon icon="brands.facebook" />
```

**Why**:
- ✅ Brand-specific icons
- ✅ Consistent styling
- ✅ No external dependencies

### For General Icons
**Use**: Blade Heroicons
```blade
<x-heroicon-o-home class="w-6 h-6" />
```

**Why**:
- ✅ Large icon library
- ✅ Blade component syntax
- ✅ Auto-discovery

## 📊 Icon Comparison

| Type | Package | Syntax | Use Case |
|------|---------|--------|----------|
| **Social Brands** | Custom SVG | `<x-filament::icon icon="brands.facebook" />` | Social media icons |
| **Heroicons Outline** | blade-heroicons | `<x-heroicon-o-facebook />` | General UI icons |
| **Heroicons Solid** | blade-heroicons | `<x-heroicon-s-heart />` | Filled icons |

## 🔧 Setup Verification

### Check Installation
```bash
cd laravel
composer show blade-ui-kit/blade-heroicons
```

### Clear Cache
```bash
php artisan view:clear
php artisan cache:clear
```

### Test Icons
```blade
{{-- Test Heroicons --}}
<x-heroicon-o-facebook class="w-6 h-6 text-blue-600" />

{{-- Test Custom SVG --}}
<x-filament::icon icon="brands.facebook" class="icon icon-sm" />
```

## 📝 Usage Examples

### Footer Social Icons
```blade
<ul class="list-inline text-start social">
    @foreach($socialLinks as $social)
    <li class="list-inline-item">
        <a class="p-1 text-white" href="{{ $social['url'] }}" target="_blank">
            @if($social['platform'] === 'facebook')
                <x-heroicon-o-facebook class="icon icon-sm icon-white" />
            @elseif($social['platform'] === 'twitter')
                <x-heroicon-o-x-twitter class="icon icon-sm icon-white" />
            @elseif($social['platform'] === 'youtube')
                <x-heroicon-o-youtube class="icon icon-sm icon-white" />
            @endif
            <span class="visually-hidden">{{ ucfirst($social['platform']) }}</span>
        </a>
    </li>
    @endforeach
</ul>
```

### Navigation Icons
```blade
{{-- Menu icons --}}
<x-heroicon-o-home class="w-5 h-5" />
<x-heroicon-o-user class="w-5 h-5" />
<x-heroicon-o-cog-6-tooth class="w-5 h-5" />
```

### Form Icons
```blade
{{-- Input icons --}}
<div class="relative">
    <x-heroicon-o-envelope class="absolute left-3 top-3 w-5 h-5 text-gray-400" />
    <input type="email" class="pl-10 form-input" />
</div>
```

## 📚 References

### Documentation
- [Blade Heroicons](https://github.com/blade-ui-kit/blade-heroicons)
- [Heroicons](https://heroicons.com/)
- [Filament Icons](https://filamentphp.com/docs/5.x/support/icons)

### Project Documentation
- [HEROICONS_SETUP_FIX.md](HEROICONS_SETUP_FIX.md) - Bug fix report
- [SOCIAL_ICONS_FIX_COMPLETE.md](SOCIAL_ICONS_FIX_COMPLETE.md) - Social icons setup
- [FILAMENT_5_OFFICIAL_POLICY.md](FILAMENT_5_OFFICIAL_POLICY.md) - Filament policy

## ✅ Checklist

- [x] Install blade-heroicons
- [x] Create custom SVG brands
- [x] Clear cache
- [x] Test icons
- [x] Document usage
- [ ] Update all icon references
- [ ] Test footer social icons
- [ ] Test navigation icons

---

**Stato**: ✅ **ICONE CONFIGURATE**  
**Heroicons**: **blade-heroicons installato**  
**Custom SVG**: **6 brand icons**  
**Pronto per**: **🧪 Testing**
