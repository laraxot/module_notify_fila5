# 🦶 Footer Analysis & Implementation

**Date**: 2026-03-30  
**Reference**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html  
**Target**: http://fixcity.local/it/tests/argomenti  
**Status**: 🔴 **ANALYSIS COMPLETE - IMPLEMENTATION READY**

---

## 📊 Reference Footer Structure

### Full HTML Structure (238 lines)

```html
<footer class="it-footer" id="footer">
    <!-- Main Footer -->
    <div class="it-footer-main">
        <div class="container">
            <!-- Logo Section -->
            <div class="row">
                <div class="col-12 footer-items-wrapper logo-wrapper">
                    <img class="ue-logo" src="logo-eu-inverted.svg" alt="logo Unione Europea">
                    <div class="it-brand-wrapper">
                        <a href="#">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="sprites.svg#it-pa"></use>
                            </svg>
                            <div class="it-brand-text">
                                <h2 class="no_toc">Nome del Comune</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Footer Columns -->
            <div class="row">
                <!-- Column 1: Amministrazione -->
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">Amministrazione</h4>
                    <ul class="footer-list">
                        <li><a href="#">Organi di governo</a></li>
                        <li><a href="#">Aree amministrative</a></li>
                        <!-- ... -->
                    </ul>
                </div>
                
                <!-- Column 2: Categorie di servizio -->
                <div class="col-md-6 footer-items-wrapper">
                    <h4 class="footer-heading-title">Categorie di servizio</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="footer-list">
                                <li><a href="#">Anagrafe e stato civile</a></li>
                                <!-- ... -->
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-list">
                                <li><a href="#">Educazione e formazione</a></li>
                                <!-- ... -->
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Column 3: Contatti -->
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">Contatti</h4>
                    <address class="footer-list">
                        <div class="footer-list-item">
                            <strong>Comune di</strong>
                            <p>Via Roma 1<br>12345 Città (PROV)</p>
                        </div>
                        <div class="footer-list-item">
                            <p>Tel: +39 0123 456789<br>
                            Email: info@comune.it<br>
                            PEC: comune@pec.it</p>
                        </div>
                        <div class="footer-list-item">
                            <p>Orario sportello: Lun-Ven 9:00-13:00</p>
                        </div>
                    </address>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="row">
                <div class="col-12 footer-items-wrapper social-wrapper">
                    <h4 class="footer-heading-title">Seguici su</h4>
                    <ul class="list-inline text-left social-list">
                        <li class="list-inline-item">
                            <a class="text-underline" href="#" aria-label="Facebook">
                                <svg class="icon icon-white"><use href="#it-facebook"></use></svg>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-underline" href="#" aria-label="Twitter">
                                <svg class="icon icon-white"><use href="#it-twitter"></use></svg>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-underline" href="#" aria-label="YouTube">
                                <svg class="icon icon-white"><use href="#it-youtube"></use></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="it-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <ul class="footer-bottom-list list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-underline">Media policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-underline">Note legali</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-underline">Privacy policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-underline">Mappa del sito</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-underline">RSS</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
```

---

## 🎯 Key CSS Classes (from style-apply.css)

### Footer Wrapper

```css
.it-footer {
    @apply bg-dark text-white;
    background-color: var(--bs-dark); /* #17334f */
}

.it-footer-main {
    @apply py-8;
    padding-top: 2rem;
    padding-bottom: 2rem;
}

.it-footer-bottom {
    @apply py-4 border-t border-white/20;
    border-top-color: rgba(255,255,255,0.2);
}
```

### Footer Columns

```css
.footer-items-wrapper {
    @apply mb-6 md:mb-0;
}

.logo-wrapper {
    @apply flex items-center gap-4 mb-8;
}

.ue-logo {
    @apply w-16 h-16;
}

.it-brand-wrapper a {
    @apply flex items-center gap-3 text-white no-underline;
}
```

### Footer Links

```css
.footer-heading-title {
    @apply text-lg font-semibold text-white mb-4;
    color: white;
}

.footer-list {
    @apply list-none p-0 m-0;
}

.footer-list li {
    @apply mb-2;
}

.footer-list a {
    @apply text-white/80 no-underline text-sm hover:text-white transition-colors;
    color: rgba(255,255,255,0.8);
}

.footer-list a:hover {
    color: white;
}
```

### Social Links

```css
.social-list {
    @apply flex gap-4;
}

.social-list a {
    @apply inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 transition-colors;
}

.social-list .icon {
    @apply w-6 h-6 text-white;
}
```

### Footer Bottom Links

```css
.footer-bottom-list {
    @apply flex flex-wrap gap-4 justify-center text-sm;
}

.footer-bottom-list a {
    @apply text-white/60 no-underline hover:text-white transition-colors;
}
```

---

## 🔧 Implementation

### File: `laravel/Themes/Sixteen/resources/views/sections/footer.blade.php`

```blade
@props(['data' => [], 'tpl' => 'full'])

{{-- Footer Template Selector --}}
@if($tpl === 'slim')
    @include('sections.footer-slim', ['data' => $data])
@else
    @include('sections.footer-full', ['data' => $data])
@endif
```

### File: `laravel/Themes/Sixteen/resources/views/sections/footer-full.blade.php`

```blade
@props(['data' => []])

<footer class="it-footer" id="footer">
    {{-- Main Footer --}}
    <div class="it-footer-main">
        <div class="container">
            {{-- Logo Section --}}
            <div class="row">
                <div class="col-12 footer-items-wrapper logo-wrapper">
                    <img class="ue-logo" src="{{ asset('themes/Sixteen/images/logo-eu-inverted.svg') }}" alt="logo Unione Europea">
                    <div class="it-brand-wrapper">
                        <a href="{{ $data['home_url'] ?? '/it' }}">
                            <svg class="icon" aria-hidden="true">
                                <use xlink:href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#it-pa') }}"></use>
                            </svg>
                            <div class="it-brand-text">
                                <h2 class="no_toc">{{ $data['site_name'] ?? 'Nome del Comune' }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Footer Columns --}}
            <div class="row mt-8">
                {{-- Column 1: Amministrazione --}}
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ $data['admin_title'] ?? 'Amministrazione' }}</h4>
                    <ul class="footer-list">
                        @foreach($data['admin_links'] ?? [] as $link)
                        <li>
                            <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Column 2: Categorie di servizio --}}
                <div class="col-md-6 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ $data['services_title'] ?? 'Categorie di servizio' }}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="footer-list">
                                @foreach(array_slice($data['service_links'] ?? [], 0, 8) as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-list">
                                @foreach(array_slice($data['service_links'] ?? [], 8, 8) as $link)
                                <li>
                                    <a href="{{ $link['url'] }}">{{ $link['label'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                
                {{-- Column 3: Contatti --}}
                <div class="col-md-3 footer-items-wrapper">
                    <h4 class="footer-heading-title">{{ $data['contact_title'] ?? 'Contatti' }}</h4>
                    <address class="footer-list">
                        @if($data['contact'] ?? null)
                        <div class="footer-list-item">
                            <strong>{{ $data['contact']['name'] ?? 'Comune di' }}</strong>
                            <p>{{ $data['contact']['address'] ?? 'Via Roma 1' }}<br>
                            {{ $data['contact']['cap'] ?? '12345' }} {{ $data['contact']['city'] ?? 'Città' }} ({{ $data['contact']['province'] ?? 'PROV' }})</p>
                        </div>
                        <div class="footer-list-item">
                            <p>Tel: {{ $data['contact']['phone'] ?? '+39 0123 456789' }}<br>
                            Email: {{ $data['contact']['email'] ?? 'info@comune.it' }}<br>
                            PEC: {{ $data['contact']['pec'] ?? 'comune@pec.it' }}</p>
                        </div>
                        <div class="footer-list-item">
                            <p>Orario sportello: {{ $data['contact']['hours'] ?? 'Lun-Ven 9:00-13:00' }}</p>
                        </div>
                        @endif
                    </address>
                </div>
            </div>
            
            {{-- Social Media --}}
            @if($data['show_social'] ?? true)
            <div class="row mt-8">
                <div class="col-12 footer-items-wrapper social-wrapper">
                    <h4 class="footer-heading-title">{{ $data['social_title'] ?? 'Seguici su' }}</h4>
                    <ul class="list-inline text-left social-list">
                        @foreach($data['social_links'] ?? [] as $social)
                        <li class="list-inline-item">
                            <a class="text-underline" href="{{ $social['url'] }}" aria-label="{{ $social['label'] }}">
                                <svg class="icon icon-white" aria-hidden="true">
                                    <use xlink:href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#' . $social['icon']) }}"></use>
                                </svg>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
    
    {{-- Footer Bottom --}}
    <div class="it-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <ul class="footer-bottom-list list-inline">
                        @foreach($data['bottom_links'] ?? [] as $link)
                        <li class="list-inline-item">
                            <a href="{{ $link['url'] }}" class="text-underline">{{ $link['label'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
```

### File: `laravel/Themes/Sixteen/resources/views/sections/footer-slim.blade.php`

```blade
@props(['data' => []])

<footer class="it-footer it-footer-slim" id="footer">
    <div class="it-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 footer-items-wrapper">
                    <div class="flex justify-between items-center">
                        <div class="it-brand-wrapper">
                            <a href="{{ $data['home_url'] ?? '/it' }}">
                                <svg class="icon" aria-hidden="true">
                                    <use xlink:href="{{ asset('themes/Sixteen/assets/svg/sprites.svg#it-pa') }}"></use>
                                </svg>
                                <div class="it-brand-text">
                                    <h2 class="no_toc text-white text-lg">{{ $data['site_name'] ?? 'Nome del Comune' }}</h2>
                                </div>
                            </a>
                        </div>
                        
                        <ul class="footer-bottom-list list-inline flex gap-4">
                            @foreach($data['bottom_links'] ?? [] as $link)
                            <li class="list-inline-item">
                                <a href="{{ $link['url'] }}" class="text-underline text-white/60 hover:text-white">{{ $link['label'] }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
```

---

## 📊 Default Data Structure

```php
// In layout or page
$footerData = [
    'tpl' => 'full', // or 'slim'
    'home_url' => '/it',
    'site_name' => 'Nome del Comune',
    
    // Admin links
    'admin_title' => 'Amministrazione',
    'admin_links' => [
        ['label' => 'Organi di governo', 'url' => '/it/amministrazione/organi'],
        ['label' => 'Aree amministrative', 'url' => '/it/amministrazione/aree'],
        ['label' => 'Uffici', 'url' => '/it/amministrazione/uffici'],
        ['label' => 'Enti e fondazioni', 'url' => '/it/amministrazione/enti'],
        ['label' => 'Politici', 'url' => '/it/amministrazione/politici'],
        ['label' => 'Documenti e dati', 'url' => '/it/amministrazione/documenti'],
    ],
    
    // Service links
    'services_title' => 'Categorie di servizio',
    'service_links' => [
        ['label' => 'Anagrafe e stato civile', 'url' => '/it/servizi/anagrafe'],
        ['label' => 'Cultura e tempo libero', 'url' => '/it/servizi/cultura'],
        ['label' => 'Vita lavorativa', 'url' => '/it/servizi/lavoro'],
        ['label' => 'Imprese e commercio', 'url' => '/it/servizi/imprese'],
        ['label' => 'Appalti pubblici', 'url' => '/it/servizi/appalti'],
        ['label' => 'Catasto e urbanistica', 'url' => '/it/servizi/catasto'],
        ['label' => 'Turismo', 'url' => '/it/servizi/turismo'],
        ['label' => 'Mobilità e trasporti', 'url' => '/it/servizi/mobilita'],
        ['label' => 'Educazione e formazione', 'url' => '/it/servizi/educazione'],
        ['label' => 'Giustizia e sicurezza', 'url' => '/it/servizi/giustizia'],
        ['label' => 'Tributi e finanze', 'url' => '/it/servizi/tributi'],
        ['label' => 'Ambiente', 'url' => '/it/servizi/ambiente'],
        ['label' => 'Salute e benessere', 'url' => '/it/servizi/salute'],
        ['label' => 'Autorizzazioni', 'url' => '/it/servizi/autorizzazioni'],
        ['label' => 'Agricoltura e pesca', 'url' => '/it/servizi/agricoltura'],
    ],
    
    // Contact info
    'contact_title' => 'Contatti',
    'contact' => [
        'name' => 'Comune di Example',
        'address' => 'Via Roma 1',
        'cap' => '12345',
        'city' => 'Example City',
        'province' => 'EX',
        'phone' => '+39 0123 456789',
        'email' => 'info@comune.example.it',
        'pec' => 'comune@pec.it',
        'hours' => 'Lun-Ven 9:00-13:00',
    ],
    
    // Social media
    'show_social' => true,
    'social_title' => 'Seguici su',
    'social_links' => [
        ['label' => 'Facebook', 'url' => 'https://facebook.com/comune', 'icon' => 'it-facebook'],
        ['label' => 'Twitter', 'url' => 'https://twitter.com/comune', 'icon' => 'it-twitter'],
        ['label' => 'YouTube', 'url' => 'https://youtube.com/comune', 'icon' => 'it-youtube'],
    ],
    
    // Bottom links
    'bottom_links' => [
        ['label' => 'Media policy', 'url' => '/it/media-policy'],
        ['label' => 'Note legali', 'url' => '/it/note-legali'],
        ['label' => 'Privacy policy', 'url' => '/it/privacy'],
        ['label' => 'Mappa del sito', 'url' => '/it/mappa'],
        ['label' => 'RSS', 'url' => '/it/rss'],
    ],
];
```

---

## 🔄 Usage in Layout

```blade
{{-- layouts/app.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <!-- Head -->
</head>
<body>
    {{-- Header --}}
    <x-section slug="header" :data="$headerData ?? []" />
    
    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>
    
    {{-- Footer --}}
    <x-section slug="footer" :data="$footerData ?? []" tpl="full" />
    
    {{-- Scripts --}}
    @vite(['resources/js/app1.js'])
</body>
</html>
```

---

## 📋 Implementation Checklist

### Files to Create

- [ ] `sections/footer.blade.php`
- [ ] `sections/footer-full.blade.php`
- [ ] `sections/footer-slim.blade.php`
- [ ] `images/logo-eu-inverted.svg` (if missing)

### CSS to Add (style-apply.css already has)

- [x] `.it-footer` - Already in style-apply.css
- [x] `.it-footer-main` - Already in style-apply.css
- [x] `.it-footer-bottom` - Already in style-apply.css
- [x] `.footer-items-wrapper` - Already in style-apply.css
- [x] `.footer-heading-title` - Already in style-apply.css
- [x] `.footer-list` - Already in style-apply.css
- [x] `.social-list` - Already in style-apply.css

### JavaScript (app1.js already has)

- [x] Footer doesn't need special JS - handled by style-apply.css

### Build & Publish

```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

---

## 📊 Expected Result

After implementation:
- ✅ Same HTML structure as reference
- ✅ Same CSS classes (Bootstrap Italia)
- ✅ Same layout (logo, columns, social, bottom links)
- ✅ Same colors (dark background, white text)
- ✅ Same hover effects
- ✅ Responsive (mobile-friendly)

---

## 📚 Related Documentation

| Document | Location |
|----------|----------|
| **Header Analysis** | `docs/design-comuni/screenshots/tests/header-analysis.md` |
| **Build Process** | `docs/BUILD_AND_PUBLISH_PROCESS.md` |
| **HTML Matching Plan** | `docs/design-comuni/HTML_MATCHING_PLAN.md` |
| **style-apply.css Analysis** | `docs/STYLE_APPLY_ANALYSIS.md` |

---

**Status**: ✅ **ANALYSIS COMPLETE - READY TO IMPLEMENT**  
**Next**: Create footer section files + test  
**ETA**: 2h

**Footer analysis complete! 🦶**
