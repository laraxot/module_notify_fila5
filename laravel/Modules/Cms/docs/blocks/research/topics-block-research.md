# Topics Block Type - Research & Implementation Guide

> *"Un tipo di blocco per governarli tutti, un tipo per trovarli, un tipo per portarli e nel CMS unirli."*

## 🎯 Block Type Recommendation

### Recommended Type: `topics`

**Why**: Best matches Design Comuni "Argomenti" pattern while being generic enough for reuse.

### Alternative Types

| Type | Use Case | Match Score | Status |
|------|----------|-------------|--------|
| `topics` | Topic/category listings | 9/10 | ✅ **Recommended** |
| `categories` | Category navigation | 8/10 | ✅ Alternative |
| `feature_sections` | Featured content grids | 7/10 | ✅ Already canonical |
| `card_grid` | Generic card layouts | 7/10 | 🟡 Consider |
| `topic_grid` | Specific grid layout | 6/10 | ❌ Too specific |

---

## 📚 Framework Analysis

### 1. Flowbite Blocks

**Best Match**: Blog Grid Card

```html
<!-- Flowbite Structure -->
<article class="bg-white rounded-lg shadow dark:bg-gray-800">
    <div class="p-5">
        <h3 class="text-xl font-bold">
            <a href="#" class="hover:underline">Topic Title</a>
        </h3>
        <p class="text-gray-500">Description...</p>
    </div>
</article>
```

**Tailwind Classes**:
- Layout: `grid grid-cols-1 md:grid-cols-3 gap-6`
- Card: `bg-white rounded-lg shadow overflow-hidden`
- Typography: `text-xl font-bold tracking-tight`
- Responsive: `md:grid-cols-3 lg:grid-cols-4`

**Adaptation for Design Comuni**:
- Replace images with institutional icons
- Use Bootstrap Italia color palette
- Ensure WCAG AA contrast compliance

---

### 2. Tailwind CSS Plus UI Blocks

**Best Match**: Feature Grid

```html
<!-- Tailwind Plus Structure -->
<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    <div class="rounded-lg bg-white p-6 shadow">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <icon />
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-medium">Topic</h3>
                <p class="text-gray-500">Description...</p>
            </div>
        </div>
    </div>
</div>
```

**Key Features**:
- Icon + text layout
- Responsive grid (1→2→3 columns)
- Clean, minimal design
- Easy to customize

---

### 3. DaisyUI Components

**Best Match**: Card Component

```blade
<!-- DaisyUI Structure -->
<div class="card w-96 bg-base-100 shadow-xl">
    <div class="card-body">
        <h2 class="card-title">Topic Title</h2>
        <p>Topic description...</p>
        <div class="card-actions">
            <a class="btn btn-primary">Explore</a>
        </div>
    </div>
</div>
```

**Advantages**:
- Built-in theming support
- Semantic class names
- Accessible by default
- Easy Blade integration

---

## 🏛️ Design Comuni Pattern

### Structure Analysis

```
┌─────────────────────────────────────┐
│ H1: ARGOMENTI                       │
│ Intro description                   │
├─────────────────────────────────────┤
│ SECTION: IN EVIDENZA                │
│ [Card] [Card] [Card]               │
├─────────────────────────────────────┤
│ SECTION: ESPLORA PER ARGOMENTO      │
│ [Card] [Card] [Card] [Card]        │
│ [Card] [Card] [Card] [Card]        │
├─────────────────────────────────────┤
│ FEEDBACK: Rate this page (1-5★)    │
└─────────────────────────────────────┘
```

### Bootstrap Italia Classes

```css
/* Layout */
.container
.row
.col-12 .col-md-4 .col-lg-3

/* Components */
.card
.card-body
.card-title
.card-text
.breadcrumb

/* Utilities */
.mb-4 .mt-3 .py-5
.shadow-sm .border-0
```

---

## 🎨 Implementation Strategy

### Option 1: Pure Bootstrap Italia (Conservative)

```blade
{{-- themes/sixteen/resources/views/components/blocks/topics/argomenti.blade.php --}}
<div class="container py-5">
    <h1 class="mb-4">Argomenti</h1>
    
    {{-- Featured --}}
    <section class="mb-5">
        <h2 class="h4 mb-3">In Evidenza</h2>
        <div class="row g-4">
            @foreach($featured as $topic)
            <div class="col-12 col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="{{ $topic.url }}" class="stretched-link">
                                {{ $topic.title }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    {{-- All Topics --}}
    <section>
        <h2 class="h4 mb-3">Esplora per Argomento</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($all as $topic)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title h5">
                            <a href="{{ $topic.url }}" class="stretched-link">
                                {{ $topic.title }}
                            </a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
```

### Option 2: Tailwind + DaisyUI (Modern)

```blade
{{-- themes/sixteen/resources/views/components/blocks/topics/argomenti.blade.php --}}
<div class="container py-5">
    <h1 class="text-4xl font-bold mb-4">Argomenti</h1>
    
    {{-- Featured --}}
    <section class="mb-5">
        <h2 class="text-2xl font-semibold mb-3">In Evidenza</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($featured as $topic)
            <div class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow">
                <div class="card-body">
                    <h3 class="card-title text-xl">
                        <a href="{{ $topic.url }}" class="hover:text-primary">
                            {{ $topic.title }}
                        </a>
                    </h3>
                    @if($topic.description)
                    <p class="text-gray-600">{{ Str::limit($topic.description, 100) }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
    {{-- All Topics --}}
    <section>
        <h2 class="text-2xl font-semibold mb-3">Esplora per Argomento</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($all as $topic)
            <div class="card bg-base-100 shadow hover:shadow-lg transition-shadow">
                <div class="card-body p-4">
                    <h3 class="card-title text-lg">
                        <a href="{{ $topic.url }}" class="hover:text-primary">
                            {{ $topic.title }}
                        </a>
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
```

### Option 3: Hybrid (Recommended)

**Bootstrap Italia structure + Tailwind utilities**:

```blade
{{-- Best of both worlds --}}
<div class="container py-5">
    <h1 class="text-4xl font-bold mb-4">Argomenti</h1> {{-- Tailwind typography --}}
    
    <section class="mb-5"> {{-- Bootstrap spacing --}}
        <h2 class="h4 mb-3">In Evidenza</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4"> {{-- Tailwind grid --}}
            @foreach($featured as $topic)
            <div class="card h-100 shadow-sm border-0"> {{-- Bootstrap card --}}
                <div class="card-body">
                    <h3 class="card-title h5">
                        <a href="{{ $topic.url }}" class="text-decoration-none stretched-link">
                            {{ $topic.title }}
                        </a>
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
```

---

## 📋 Block Type Specification

### Type Definition

```yaml
name: topics
description: Grid or list of topics/categories for navigation
level: 1 (Compound - combines atomic elements)
canonical: true
```

### Data Schema

```json
{
    "type": "topics",
    "data": {
        "view": "pub_theme::components.blocks.topics.argomenti",
        "title": "Esplora per argomento",
        "description": "Naviga i temi del sito",
        "featured": [
            {
                "title": "Cultura",
                "url": "/cultura",
                "description": "Eventi e notizie culturali",
                "icon": "culture-icon.svg"
            }
        ],
        "all_topics": [
            {
                "title": "Agricoltura",
                "url": "/agricoltura"
            }
        ],
        "layout": "grid",
        "columns": {
            "mobile": 1,
            "tablet": 2,
            "desktop": 4
        }
    }
}
```

### View Contract

```php
/**
 * Topics Block View Contract
 * 
 * @param string $title Block title
 * @param string|null $description Optional description
 * @param array $featured Featured topics (0-3 items)
 * @param array $all_topics All topics list
 * @param string $layout Layout type: 'grid' | 'list' | 'featured'
 * @param array $columns Responsive column configuration
 */
```

---

## 🔗 Cross-References

### Internal Documentation
- [Zen Philosophy](./ZEN_PHILOSOPHY.md) - Why type must be canonical
- [Architecture Vision](./ARCHITECTURE_VISION.md) - Block type roadmap
- [View Naming Philosophy](./view-naming-philosophy.md) - The `{type}.{view}` rule
- [Argomenti Error Analysis](./argomenti-error-analysis.md) - Current issue

### External Resources
- [Design Comuni Argomenti](https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html)
- [Flowbite Blocks](https://flowbite.com/blocks/)
- [Tailwind Plus UI](https://tailwindcss.com/plus/ui-blocks)
- [DaisyUI Components](https://daisyui.com/components/)
- [Bootstrap Italia](https://italia.github.io/bootstrap-italia/)

---

## 📊 Implementation Checklist

### Phase 1: Foundation (Week 1)
- [ ] Create `topics` block type documentation
- [ ] Create base view: `components.blocks.topics.default`
- [ ] Create variant: `components.blocks.topics.argomenti`
- [ ] Update JSON config: `tests.argomenti` → `topics`
- [ ] Test responsive behavior

### Phase 2: Enhancement (Week 2)
- [ ] Add feedback section (star rating)
- [ ] Add search/filter functionality
- [ ] Create additional variants:
  - `topics.list` (list layout)
  - `topics.featured` (featured only)
  - `topics.grid` (grid layout)
- [ ] Add accessibility features (keyboard navigation)

### Phase 3: Polish (Week 3)
- [ ] Performance optimization (lazy loading)
- [ ] SEO optimization (structured data)
- [ ] Analytics integration
- [ ] Documentation complete
- [ ] Cross-browser testing

---

## 🎯 Success Metrics

| Metric | Target | Measurement |
|--------|--------|-------------|
| Visual similarity to Design Comuni | >90% | Screenshot comparison |
| Page load time | <2s | Lighthouse |
| Accessibility score | >95 | axe DevTools |
| Mobile responsiveness | 100% | Manual testing |
| Code reusability | >80% | Component usage analysis |

---

## 🧘 Developer Meditation

> *"Il tipo è `topics`, la vista è `argomenti`. Non confondere il contenitore con il contenuto."*

When creating a topics block:
1. Is it generic enough for reuse?
2. Does it follow the `{type}.{view}` convention?
3. Would Design Comuni approve?
4. Can it work in other themes?

---

**Version**: 1.0  
**Date**: 2026-03-30  
**Status**: ✅ Ready for Implementation  
**OpenViking URI**: `viking://modules/cms/docs/blocks/topics-research`
