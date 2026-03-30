# FixCity Homepage Improvement - Architecture

**Version**: 1.0.0  
**Created**: 2026-03-30  
**Status**: Draft

## Overview

This document describes the technical architecture for improving the FixCity homepage using cinematic UI, GSAP animations, and dynamic Filament widgets.

## Architecture Principles

1. **Component-Based**: Reusable Blade components
2. **CMS-Compatible**: Maintain container0/slug0 pattern
3. **Performance-First**: Lighthouse >90, FCP <1.5s
4. **Accessibility**: WCAG 2.1 AA minimum
5. **Progressive Enhancement**: Works without JS, enhanced with GSAP

## System Architecture

```
┌─────────────────────────────────────────────────────────┐
│                    Homepage (home.blade.php)             │
├─────────────────────────────────────────────────────────┤
│                                                          │
│  ┌──────────────────────────────────────────────────┐  │
│  │  Hero Section                                     │  │
│  │  - cinematic-particles component                 │  │
│  │  - gradient background                           │  │
│  │  - animated headline                             │  │
│  │  - stats counter                                 │  │
│  └──────────────────────────────────────────────────┘  │
│                                                          │
│  ┌──────────────────────────────────────────────────┐  │
│  │  Trust Bar                                        │  │
│  │  - metrics with icons                            │  │
│  │  - GSAP counter animation                        │  │
│  └──────────────────────────────────────────────────┘  │
│                                                          │
│  ┌──────────────────────────────────────────────────┐  │
│  │  Featured Markets                                 │  │
│  │  - Filament widget (XotBaseWidget)              │  │
│  │  - professional cards grid                       │  │
│  │  - multi-outcome display                         │  │
│  └──────────────────────────────────────────────────┘  │
│                                                          │
│  ┌──────────────────────────────────────────────────┐  │
│  │  Cinematic Footer                                │  │
│  │  - organized links                               │  │
│  │  - social media                                  │  │
│  │  - newsletter signup                            │  │
│  └──────────────────────────────────────────────────┘  │
│                                                          │
└─────────────────────────────────────────────────────────┘
```

## Component Architecture

### 1. Hero Section Components

```
resources/views/components/blocks/hero/
├── cinematic-homepage.blade.php    # Main hero component
├── particles-bg.blade.php          # Particle background
├── stats-counter.blade.php         # Animated stats
└── badge.blade.php                 # Promotional badge
```

**Key Features**:
- Gradient background: `bg-gradient-to-br from-slate-950 via-slate-900 to-emerald-950/20`
- Particles: `<x-ui.cinematic-particles count="80" />`
- Animated headline with gradient text
- Responsive typography (mobile-first)

### 2. Trust Bar Components

```
resources/views/components/blocks/trust/
├── bar.blade.php                   # Trust bar container
├── metric-card.blade.php           # Single metric card
└── counter.blade.php               # Animated counter
```

**Data Flow**:
```
Controller/Widget → Pass stats → View → GSAP animates counter
```

### 3. Featured Markets Components

```
resources/views/components/blocks/markets/
├── featured-grid.blade.php         # Markets grid
├── professional-card.blade.php     # Market card
├── outcome-progress.blade.php      # Probability bar
└── category-badge.blade.php        # Category indicator
```

**Widget Integration**:
```php
// Filament Widget
class FeaturedPredictsWidget extends XotBaseWidget
{
    protected static string $view = 'filament.widgets.featured-predicts';
    
    public function getViewData(): array
    {
        return [
            'markets' => Predict::featured()->limit(6)->get(),
        ];
    }
}
```

### 4. GSAP Animation System

```javascript
// resources/js/gsap-homepage.js
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// Hero animation
gsap.from('.hero-headline', {
  opacity: 0,
  y: 50,
  duration: 1.5,
  ease: 'power3.out'
});

// Stats counter animation
gsap.utils.toArray('.counter-value').forEach(counter => {
  const target = counter.getAttribute('data-target');
  gsap.to(counter, {
    innerText: target,
    duration: 2,
    snap: { innerText: 1 },
    scrollTrigger: {
      trigger: counter,
      start: 'top 80%'
    }
  });
});

// Section fade-ins
gsap.utils.toArray('.section').forEach(section => {
  gsap.from(section, {
    opacity: 0,
    y: 30,
    duration: 1,
    scrollTrigger: {
      trigger: section,
      start: 'top 85%'
    }
  });
});
```

## Data Architecture

### Widget Data Flow

```
┌─────────────┐
│  Predict    │
│   Model     │
└──────┬──────┘
       │
       │ Eloquent Query
       ▼
┌─────────────┐
│  Featured-  │
│  Predicts   │
│  Widget     │
└──────┬──────┘
       │
       │ Pass View Data
       ▼
┌─────────────┐
│  Blade      │
│  Component  │
└──────┬──────┘
       │
       │ Render HTML
       ▼
┌─────────────┐
│  GSAP       │
│  Animation  │
└─────────────┘
```

### Caching Strategy

```php
// Cache featured markets
$markets = Cache::remember(
    'homepage_featured_markets',
    300, // 5 minutes
    fn() => Predict::featured()
        ->with(['category', 'outcomes'])
        ->limit(6)
        ->get()
);

// Cache stats
$stats = Cache::remember(
    'homepage_stats',
    60, // 1 minute
    fn() => [
        'users' => User::where('active', true)->count(),
        'predictions' => Predict::count(),
        'markets' => Predict::where('status', 'active')->count(),
    ]
);
```

## File Structure

```
laravel/Themes/TwentyOne/
├── resources/
│   ├── views/
│   │   ├── home.blade.php              # Main homepage (UPDATED)
│   │   ├── components/
│   │   │   ├── blocks/
│   │   │   │   ├── hero/
│   │   │   │   │   └── cinematic-homepage.blade.php  # NEW
│   │   │   │   ├── trust/
│   │   │   │   │   └── bar.blade.php                 # NEW
│   │   │   │   └── markets/
│   │   │   │       └── featured-grid.blade.php       # NEW/EXISTING
│   │   │   └── ui/
│   │   │       └── cinematic-particles.blade.php     # EXISTING
│   │   └── filament/
│   │       └── widgets/
│   │           └── featured-predicts.blade.php       # UPDATED
│   └── js/
│       └── gsap-homepage.js                          # NEW
└── public/
    └── assets/
        └── app.js                                    # Build output
```

## Performance Optimization

### 1. Lazy Loading

```blade
{{-- Lazy load images --}}
<img src="placeholder.jpg" 
     data-src="{{ $market->image }}" 
     loading="lazy" 
     class="lazy" />

{{-- Defer non-critical JS --}}
<script defer src="{{ mix('js/gsap-homepage.js') }}"></script>
```

### 2. Code Splitting

```javascript
// Split GSAP config into separate chunk
// resources/js/gsap-homepage.js
import './gsap-config';
import './scroll-trigger';

// Build outputs separate chunk
// public/assets/gsap-homepage.js
```

### 3. Caching

```php
// View caching
Route::get('/', function() {
    return Cache::remember('homepage_v1', 300, function() {
        return view('pub_theme::home');
    });
});

// Widget caching
class FeaturedPredictsWidget extends XotBaseWidget
{
    protected int $cacheTtl = 300; // 5 minutes
}
```

## Accessibility Strategy

### 1. Semantic HTML

```blade
<main id="main-content" role="main">
  <section aria-labelledby="hero-heading">
    <h1 id="hero-heading">Prevedi il Futuro Oggi</h1>
  </section>
  
  <section aria-labelledby="trust-heading">
    <h2 id="trust-heading" class="sr-only">Statistiche Piattaforma</h2>
    <!-- Trust metrics -->
  </section>
</main>
```

### 2. Reduced Motion

```css
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

```javascript
// GSAP respects reduced motion
if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
  gsap.globalTimeline.timeScale(0); // Disable animations
}
```

### 3. Keyboard Navigation

```blade
{{-- Focusable interactive elements --}}
<a href="{{ route('predicts.index') }}" 
   class="market-card"
   tabindex="0">
  <!-- Card content -->
</a>
```

## Testing Strategy

### 1. Visual Regression

```bash
# Percy visual testing
npm run test:visual
```

### 2. Performance Testing

```bash
# Lighthouse CI
npm run lighthouse:http://fixcity.local/
```

### 3. Accessibility Testing

```bash
# axe-core
npm run test:a11y
```

## Migration Plan

### Phase 1: Hero Section (Current)
- [ ] Create hero component
- [ ] Add particles
- [ ] Implement stats counter
- [ ] Add GSAP animations

### Phase 2: Trust Bar + Markets
- [ ] Create trust bar component
- [ ] Update featured markets widget
- [ ] Add market cards
- [ ] Implement grid layout

### Phase 3: Footer + Polish
- [ ] Create cinematic footer
- [ ] Add scroll animations
- [ ] Performance optimization
- [ ] Accessibility audit

## Success Metrics

| Metric | Target | Measurement |
|--------|--------|-------------|
| Lighthouse Score | >90 | Lighthouse CI |
| First Contentful Paint | <1.5s | Chrome DevTools |
| Time to Interactive | <3.5s | Chrome DevTools |
| Cumulative Layout Shift | <0.1 | Chrome DevTools |
| Bounce Rate | <40% | Google Analytics |
| Avg Session Duration | >2min | Google Analytics |

## Risks & Mitigations

| Risk | Impact | Mitigation |
|------|--------|------------|
| Performance degradation | High | Lazy loading, code splitting, caching |
| CMS compatibility issues | Medium | Maintain container0/slug0 pattern |
| GSAP conflicts | Low | Isolate animations, test thoroughly |
| Widget data stale | Medium | Strategic caching with short TTL |

## References

- [GSAP Documentation](https://greensock.com/docs/)
- [Tailwind CSS v4](https://tailwindcss.com/docs)
- [Filament Widgets](https://filamentphp.com/docs/widgets)
- [Web Accessibility Initiative](https://www.w3.org/WAI/)

---

**Last Updated**: 2026-03-30  
**Next Review**: After Phase 1 implementation
