# Footer Implementation Guide

> *"Il footer non è solo la fine della pagina. È l'inizio della fiducia."*

## 🎯 Panoramica

Il footer Design Comuni è una **section** con supporto per template multipli:

```blade
{{-- Footer completo (3 sezioni) --}}
<x-section slug="footer" tpl="default" />

{{-- Footer minimale (solo bottom bar) --}}
<x-section slug="footer" tpl="slim" />
```

---

## 📁 Struttura Footer

### Template 'default' (Completo)

**File**: `sections/footer/default.blade.php`

**Structure**:
```
┌─────────────────────────────────────────────────────┐
│ SECTION 1: PRE-FOOTER (bg-light)                    │
│ ┌─────────┬─────────┬─────────┬─────────┐          │
│ │Contatta │Problemi │ Cerca   │ Forse   │          │
│ │         │         │         │ stavi   │          │
│ │         │         │         │ cercando│          │
│ └─────────┴─────────┴─────────┴─────────┘          │
├─────────────────────────────────────────────────────┤
│ SECTION 2: MAIN FOOTER (bg-dark)                    │
│ ┌─────────┬─────────┬─────────┬─────────┐          │
│ │Brand+   │Servizi  │Novità+  │Contatti │          │
│ │Admin    │(15 voci)│Vivere   │+Legal   │          │
│ │(7 voci) │         │(5 voci) │+Social  │          │
│ └─────────┴─────────┴─────────┴─────────┘          │
├─────────────────────────────────────────────────────┤
│ SECTION 3: BOTTOM BAR (bg-darker)                   │
│ © 2026 Comune di FixCity | P.IVA | Media policy    │
└─────────────────────────────────────────────────────┘
```

### Template 'slim' (Minimo)

**File**: `sections/footer/slim.blade.php`

**Structure**:
```
┌─────────────────────────────────────────────────────┐
│ BOTTOM BAR ONLY                                     │
│ © 2026 | Privacy | Note legali | Mappa             │
└─────────────────────────────────────────────────────┘
```

---

## 🎨 Componenti Section

### Section Component

**File**: `components/section-footer.blade.php`

**Usage**:
```blade
{{-- Default footer --}}
<x-section slug="footer" />

{{-- Explicit default --}}
<x-section slug="footer" tpl="default" />

{{-- Slim footer --}}
<x-section slug="footer" tpl="slim" />
```

**Logic**:
```php
@props(['slug' => '', 'tpl' => 'default'])

$viewPath = 'pub_theme::sections.footer.' . $tpl;

@if(view()->exists($viewPath))
    @include($viewPath)
@endif
```

---

## 📊 Sezione 1: Pre-Footer

### 4 Colonne (col-lg-3)

**Column 1: Contatta**
```blade
<h4>
    <svg class="icon icon-primary">
        <use href="#it-mail"></use>
    </svg>
    Contatta
</h4>
<ul class="link-list">
    <li><a href="/faq">Leggi le domande frequenti</a></li>
    <li><a href="/assistenza">Richiedi assistenza</a></li>
    <li><a href="/telefono">Chiama il numero verde</a></li>
    <li><a href="/appuntamenti">Prenota appuntamento</a></li>
</ul>
```

**Column 2: Problemi**
```blade
<h4>
    <svg class="icon icon-primary">
        <use href="#it-warning"></use>
    </svg>
    Problemi?
</h4>
<ul class="link-list">
    <li><a href="/it/tests/argomenti">Segnala disservizio</a></li>
</ul>
```

**Column 3: Cerca**
```blade
<h4>
    <svg class="icon icon-primary">
        <use href="#it-search"></use>
    </svg>
    Cerca
</h4>
<form role="search">
    <input type="search" class="form-control" placeholder="Cerca..." />
    <button type="submit" class="btn btn-primary btn-sm">
        <svg class="icon icon-sm"><use href="#it-search"></use></svg>
        Cerca
    </button>
</form>
```

**Column 4: Forse stavi cercando**
```blade
<h4>
    <svg class="icon icon-primary">
        <use href="#it-info-circle"></use>
    </svg>
    Forse stavi cercando?
</h4>
<ul class="link-list">
    <li><a href="/cie">Rilascio CIE</a></li>
    <li><a href="/residenza">Cambio di residenza</a></li>
    <li><a href="/tributi">Tributi online</a></li>
    <li><a href="/appuntamenti">Prenotazione appuntamenti</a></li>
    <li><a href="/elettorale">Rilascio tessera elettorale</a></li>
</ul>
```

---

## 📊 Sezione 2: Main Footer

### 4 Colonne (col-lg-3)

**Column 1: Brand + Amministrazione**
```blade
{{-- Brand --}}
<div class="it-brand-wrapper">
    <a href="/">
        <svg width="82" height="82" class="icon">
            <image xlink:href="/themes/sixteen/images/stemma-comune.svg"/>
        </svg>
        <div class="it-brand-text">
            <div class="it-brand-title h4">Comune di FixCity</div>
            <div class="it-brand-tagline small">Città Metropolitana</div>
        </div>
    </a>
</div>

{{-- Amministrazione (7 voci) --}}
<h4 class="h5">Amministrazione</h4>
<ul class="link-list">
    <li><a href="/amministrazione">Organi di governo</a></li>
    <li><a href="/aree">Aree amministrative</a></li>
    <li><a href="/uffici">Uffici</a></li>
    <li><a href="/enti">Enti e fondazioni</a></li>
    <li><a href="/politici">Politici</a></li>
    <li><a href="/personale">Personale amministrativo</a></li>
    <li><a href="/documenti">Documenti e dati</a></li>
</ul>
```

**Column 2: Servizi (15 voci)**
```blade
<h4 class="h5">Servizi</h4>
<ul class="link-list">
    <li><a href="/anagrafe">Anagrafe e stato civile</a></li>
    <li><a href="/cultura">Cultura e tempo libero</a></li>
    <li><a href="/lavoro">Vita lavorativa</a></li>
    <!-- ... 12 more ... -->
</ul>
```

**Column 3: Novità + Vivere**
```blade
<h4 class="h5">Novità</h4>
<ul class="link-list">
    <li><a href="/notizie">Notizie</a></li>
    <li><a href="/comunicati">Comunicati</a></li>
    <li><a href="/avvisi">Avvisi</a></li>
</ul>

<h4 class="h5 mt-4">Vivere il Comune</h4>
<ul class="link-list">
    <li><a href="/luoghi">Luoghi</a></li>
    <li><a href="/eventi">Eventi</a></li>
</ul>
```

**Column 4: Contatti + Legal + Social**
```blade
{{-- Contatti --}}
<h4 class="h5">Contatti</h4>
<address>
    <p><strong>Comune di FixCity</strong></p>
    <p>Via Roma, 1</p>
    <p>00100 FixCity (FC)</p>
    <p>Tel: 06 1234567</p>
    <p>Email: info@fixcity.gov.it</p>
    <p>PEC: comune@pec.fixcity.gov.it</p>
</address>

{{-- Link Istituzionali --}}
<h4 class="h5 mt-4">Link Istituzionali</h4>
<ul class="link-list">
    <li><a href="/trasparenza">Amministrazione trasparente</a></li>
    <li><a href="/privacy">Informativa privacy</a></li>
    <li><a href="/note-legali">Note legali</a></li>
    <li><a href="/accessibilita">Dichiarazione di accessibilità</a></li>
</ul>

{{-- Social --}}
<h4 class="h5 mt-4">Seguici su</h4>
<div class="it-socials">
    <ul class="list-inline">
        <li class="list-inline-item">
            <a href="#" aria-label="Twitter">
                <svg class="icon icon-sm icon-white">
                    <use href="#it-twitter"></use>
                </svg>
            </a>
        </li>
        <!-- Facebook, YouTube, Telegram, Whatsapp, RSS -->
    </ul>
</div>
```

---

## 📊 Sezione 3: Bottom Bar

**Full Width (col-12)**
```blade
<div class="it-footer-bottom bg-darker py-3">
    <div class="container">
        <div class="row align-items-center">
            {{-- Left: Copyright + P.IVA --}}
            <div class="col-12 col-md-6 text-center text-md-start">
                <p class="mb-0 small">
                    &copy; {{ date('Y') }} Comune di FixCity - Tutti i diritti riservati
                </p>
                <p class="mb-0 small">
                    P.IVA: 00000000000 - Codice Fiscale: 00000000000
                </p>
            </div>
            
            {{-- Right: Media policy + Sitemap --}}
            <div class="col-12 col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0 small">
                    <li class="list-inline-item">
                        <a href="/media-policy">Media policy</a>
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                        <a href="/mappa">Mappa del sito</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
```

---

## 🎨 CSS Classes Reference

### Footer Wrapper Classes

```css
.it-footer                    /* Main footer wrapper */
.it-footer-contact-wrapper    /* Pre-footer (bg-light) */
.it-footer-main               /* Main footer (bg-dark) */
.it-footer-bottom             /* Bottom bar (bg-darker) */
.it-footer-slim               /* Slim footer variant */
```

### Content Classes

```css
.it-footer-contact-box        /* Pre-footer box */
.it-brand-wrapper             /* Brand/logo area */
.it-brand-title               /* Brand title */
.it-brand-tagline             /* Brand tagline */
.it-footer-address            /* Address block */
.it-socials                   /* Social media links */
.link-list                    /* Link list */
.link-list .list-item         /* Individual link */
```

### Color Classes (Bootstrap Italia)

```css
.bg-light                     /* Pre-footer background */
.bg-dark                      /* Main footer background (#17334f) */
.bg-darker                    /* Bottom bar background (#0f2338) */
.text-white                   /* White text */
.icon-primary                 /* Primary color icons (#007a52) */
```

---

## 🔧 Build & Deploy

### Development

```bash
cd laravel/Themes/Sixteen

# Edit footer templates
vim resources/views/sections/footer/default.blade.php

# Start dev server (hot reload)
npm run dev

# Access page
http://fixcity.local/it/tests/argomenti
```

### Production

```bash
cd laravel/Themes/Sixteen

# Build CSS (includes footer styles)
npm run build

# Copy to public
npm run copy

# Clear cache
php artisan view:clear
```

---

## 📋 Usage Examples

### Argomenti Page (Complete Footer)

```blade
<x-layouts.bootstrap-italia>
    <x-accessibility.skiplinks />
    <x-bootstrap-italia.header />
    <x-agid.breadcrumb />
    
    <main id="main-content" class="container py-5">
        {{-- Content --}}
    </main>
    
    {{-- Complete footer --}}
    <x-section slug="footer" tpl="default" />
</x-layouts.bootstrap-italia>
```

### Minimal Page (Slim Footer)

```blade
<x-layouts.bootstrap-italia>
    <x-accessibility.skiplinks />
    <x-bootstrap-italia.header />
    
    <main id="main-content" class="container py-5">
        {{-- Content --}}
    </main>
    
    {{-- Slim footer --}}
    <x-section slug="footer" tpl="slim" />
</x-layouts.bootstrap-italia>
```

---

## ✅ Validation Checklist

### HTML Structure

- [ ] 3 sections (Pre-footer, Main, Bottom)
- [ ] 4 columns in Pre-footer (col-lg-3)
- [ ] 4 columns in Main footer (col-lg-3)
- [ ] Full width Bottom bar
- [ ] Proper ARIA labels on icons
- [ ] Semantic HTML (address, nav, etc.)

### Accessibility

- [ ] Skip links present
- [ ] `role="contentinfo"` on footer
- [ ] `aria-label` on social links
- [ ] `aria-hidden="true"` on decorative icons
- [ ] Keyboard navigation works
- [ ] Focus visible on links

### Responsive

- [ ] Mobile: Stack columns (col-12)
- [ ] Tablet: 2 columns (col-md-6)
- [ ] Desktop: 4 columns (col-lg-3)
- [ ] Bottom bar: Center on mobile, split on desktop

### Design Comuni Compliance

- [ ] Bootstrap Italia classes used
- [ ] SVG sprite icons
- [ ] Color scheme compliant
- [ ] Typography compliant
- [ ] Spacing compliant

---

## 🧘 Developer Mantra

> *"Il footer è l'ultima impressione. Deve essere perfetta."*

> *"Tre sezioni, quattro colonne, infinite possibilità."*

> *"Design Comuni non è un'opzione. È lo standard."*

---

## 🔗 References

### Internal
- [Complete Implementation Guide](./COMPLETE_IMPLEMENTATION_GUIDE.md)
- [Bootstrap Italia Tailwind Conversion](./BOOTSTRAP_ITALIA_TAILWIND_CONVERSION.md)
- [Header Analysis](./header/analysis.md)

### External
- [Design Comuni Footer](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Bootstrap Italia Footer](https://italia.github.io/bootstrap-italia/documentation/componenti/footer/)

---

**Version**: 1.0  
**Date**: 2026-03-30  
**Status**: ✅ Complete & Ready to Use  
**OpenViking URI**: `viking://themes/sixteen/docs/footer-implementation`
