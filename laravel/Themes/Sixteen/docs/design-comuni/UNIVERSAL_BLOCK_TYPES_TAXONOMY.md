# 🧱 Universal Block Types Taxonomy

**Version**: 1.0  
**Created**: 2026-03-30  
**Status**: ✅ Active  
**Owner**: Multi-Agent Team (Winston + Amelia)

---

## 🎯 Golden Rule - CORRETTA

> **Il blocco se è di tipo `<category>/<block_type>` la view dentro `data` deve essere:**
> ```
> pub_theme::components.blocks.<category>.<block_type>.<variant>
> ```

**Esempio Corretto**:
```json
{
  "type": "hero/center",
  "data": {
    "view": "pub_theme::components.blocks.hero.center",
    "title": "Benvenuto"
  }
}
```

**File Path**:
```
laravel/Themes/Sixteen/resources/views/components/blocks/hero/center.blade.php
```

---

## ❌ Errore Identificato

**Pattern SBAGLIATO** (usato precedentemente):
```json
{
  "type": "argomenti",
  "data": {
    "view": "pub_theme::components.blocks.tests.argomenti"  // ❌ WRONG
  }
}
```

**Problemi**:
1. `tests` NON è una categoria di blocco valida
2. `argomenti` è il nome della pagina, non del blocco
3. La view `blocks/tests/argomenti.blade.php` non dovrebbe esistere

**Pattern CORRETTO**:
```json
{
  "type": "hero/main",
  "data": {
    "view": "pub_theme::components.blocks.hero.main"  // ✅ CORRECT
  }
}
```

---

## 📚 Block Categories (Universal Taxonomy)

Basato su **Flowbite**, **Tailwind UI**, e **DaisyUI**.

### 1. **Navigation** 🧭

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `navbar` | default, mega-menu, transparent, fixed, with-search, with-dropdowns | `blocks/navigation/navbar.blade.php` | Top navigation |
| `breadcrumb` | default, with-icons, solid, separator | `blocks/navigation/breadcrumb.blade.php` | Page hierarchy |
| `pagination` | default, with-icons, rounded, sizes | `blocks/navigation/pagination.blade.php` | Page navigation |
| `tabs` | default, underline, pills, vertical, with-icons | `blocks/navigation/tabs.blade.php` | Content tabs |
| `menu` | vertical, horizontal, dropdown | `blocks/navigation/menu.blade.php` | Link lists |
| `steps` | default, vertical, responsive | `blocks/navigation/steps.blade.php` | Process steps |

### 2. **Hero & Marketing** 🎯

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `hero` | center, left, right, with-image, with-video, with-form | `blocks/hero/main.blade.php` | Page header |
| `cta` | default, full-width, with-image, dark, with-form | `blocks/marketing/cta.blade.php` | Call to action |
| `features` | grid, list, with-icons, with-images, zigzag | `blocks/marketing/features.blade.php` | Feature showcase |
| `testimonials` | cards, slider, grid, with-avatars | `blocks/marketing/testimonials.blade.php` | Customer reviews |
| `faq` | accordion, grid, with-search | `blocks/marketing/faq.blade.php` | FAQ section |
| `team` | cards, grid, with-social, circular | `blocks/marketing/team.blade.php` | Team members |
| `pricing` | default, with-toggle, featured, comparison | `blocks/marketing/pricing.blade.php` | Pricing tables |

### 3. **Content** 📄

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `text` | default, lead, columns, justified | `blocks/content/text.blade.php` | Text content |
| `image` | default, gallery, masonry, lightbox | `blocks/content/image.blade.php` | Image display |
| `video` | embedded, background, with-overlay | `blocks/content/video.blade.php` | Video embed |
| `cards` | grid, list, featured, with-sidebar | `blocks/content/cards.blade.php` | Card layouts |
| `blog-posts` | list, grid, featured, with-sidebar | `blocks/content/blog-posts.blade.php` | Article previews |
| `topics-grid` | default, featured, with-descriptions | `blocks/content/topics-grid.blade.php` | Topic cards |

### 4. **Layout** 📐

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `container` | default, fluid, boxed, responsive | `blocks/layout/container.blade.php` | Content wrapper |
| `grid` | 2-col, 3-col, 4-col, responsive | `blocks/layout/grid.blade.php` | Grid layout |
| `columns` | 2-col, 3-col, 4-col, asymmetric | `blocks/layout/columns.blade.php` | Column layout |
| `divider` | horizontal, vertical, with-text | `blocks/layout/divider.blade.php` | Content separator |
| `stack` | default, centered, spaced | `blocks/layout/stack.blade.php` | Overlapped items |

### 5. **Data Display** 📊

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `stats` | default, with-icon, with-chart, trend | `blocks/data/stats.blade.php` | Metrics display |
| `table` | default, striped, hover, with-actions | `blocks/data/table.blade.php` | Data tables |
| `list` | stacked, grid, feed, timeline | `blocks/data/list.blade.php` | List layouts |
| `description-list` | default, horizontal, bordered | `blocks/data/description-list.blade.php` | Key-value pairs |
| `calendar` | default, month, week, day | `blocks/data/calendar.blade.php` | Calendar view |

### 6. **Forms** 📝

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `contact-form` | default, with-map, multi-column | `blocks/forms/contact-form.blade.php` | Contact forms |
| `search-form` | default, with-filters, navbar, fullscreen | `blocks/forms/search-form.blade.php` | Search inputs |
| `newsletter` | default, with-image, footer-integrated | `blocks/forms/newsletter.blade.php` | Newsletter signup |
| `signin` | default, with-social, split-screen, minimal | `blocks/forms/signin.blade.php` | Login forms |
| `signup` | default, with-social, split-screen, with-terms | `blocks/forms/signup.blade.php` | Registration forms |

### 7. **Feedback** 💬

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `alert` | default, dismissible, with-icon, colors | `blocks/feedback/alert.blade.php` | Alert messages |
| `banner` | top, bottom, cookie, sticky | `blocks/feedback/banner.blade.php` | Announcement bars |
| `toast` | default, with-action, positions | `blocks/feedback/toast.blade.php` | Popup notifications |
| `progress` | linear, radial, with-label | `blocks/feedback/progress.blade.php` | Progress indicators |
| `skeleton` | text, image, card, table | `blocks/feedback/skeleton.blade.php` | Loading states |

### 8. **E-commerce** 🛒

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `product-card` | default, with-hover, discount, quick-view | `blocks/ecommerce/product-card.blade.php` | Product display |
| `product-list` | grid, list, with-sidebar, with-filters | `blocks/ecommerce/product-list.blade.php` | Product listings |
| `shopping-cart` | default, side-panel, modal, empty-state | `blocks/ecommerce/shopping-cart.blade.php` | Cart display |
| `checkout` | multi-step, single-page, with-summary | `blocks/ecommerce/checkout.blade.php` | Checkout forms |

### 9. **Dashboard** 📈

| Block Type | Variants | View Path | Usage |
|------------|----------|-----------|-------|
| `stats-cards` | default, with-icon, with-chart, trend | `blocks/dashboard/stats-cards.blade.php` | Metric cards |
| `activity-feed` | default, with-avatars, with-timestamps | `blocks/dashboard/activity-feed.blade.php` | Activity stream |
| `recent-items` | default, with-actions, with-avatars | `blocks/dashboard/recent-items.blade.php` | Recent items list |

---

## 🔧 Implementation Examples

### Example 1: Argomenti Page

**BEFORE (WRONG)**:
```json
{
  "type": "argomenti",
  "data": {
    "view": "pub_theme::components.blocks.tests.argomenti"
  }
}
```

**AFTER (CORRECT)**:
```json
{
  "content_blocks": {
    "it": [
      {
        "type": "hero/center",
        "data": {
          "view": "pub_theme::components.blocks.hero.center",
          "title": "ARGOMENTI",
          "subtitle": "Esplora per argomento"
        }
      },
      {
        "type": "content/text",
        "data": {
          "view": "pub_theme::components.blocks.content.text",
          "content": "<p>Gli argomenti rispondono a un'esigenza di organizzazione...</p>"
        }
      },
      {
        "type": "marketing/features",
        "data": {
          "view": "pub_theme::components.blocks.marketing.features",
          "title": "IN EVIDENZA",
          "items": [
            {"title": "CULTURA"},
            {"title": "SPORT"},
            {"title": "FAMIGLIA"}
          ]
        }
      },
      {
        "type": "content/topics-grid",
        "data": {
          "view": "pub_theme::components.blocks.content.topics-grid",
          "title": "ESPLORA PER ARGOMENTO",
          "topics": [
            {"title": "AGRICOLTURA", "description": "..."},
            {"title": "ANIMALE DOMESTICO", "description": "..."}
          ]
        }
      }
    ]
  }
}
```

### Example 2: Appointment Confirmation

**BEFORE (WRONG)**:
```json
{
  "type": "appuntamento-conferma",
  "data": {
    "view": "pub_theme::components.blocks.tests.appuntamento-conferma"
  }
}
```

**AFTER (CORRECT)**:
```json
{
  "content_blocks": {
    "it": [
      {
        "type": "feedback/alert",
        "data": {
          "view": "pub_theme::components.blocks.feedback.alert",
          "type": "success",
          "title": "Appuntamento Confermato",
          "message": "La tua richiesta è stata registrata con successo"
        }
      },
      {
        "type": "navigation/steps",
        "data": {
          "view": "pub_theme::components.blocks.navigation.steps",
          "steps": [
            {"title": "Dati richiedente", "status": "completed"},
            {"title": "Scelta appuntamento", "status": "completed"},
            {"title": "Verifica finale", "status": "completed"}
          ]
        }
      },
      {
        "type": "data/description-list",
        "data": {
          "view": "pub_theme::components.blocks.data.description-list",
          "title": "Dettagli Appuntamento",
          "items": {
            "Servizio": "Carta d'identità",
            "Sede": "Municipio",
            "Data": "Mercoledi 17 aprile 2026",
            "Ora": "10:30"
          }
        }
      }
    ]
  }
}
```

---

## 📁 Directory Structure

```
laravel/Themes/Sixteen/resources/views/components/blocks/
├── navigation/
│   ├── navbar.blade.php
│   ├── breadcrumb.blade.php
│   ├── pagination.blade.php
│   ├── tabs.blade.php
│   ├── menu.blade.php
│   └── steps.blade.php
├── hero/
│   ├── center.blade.php
│   ├── left.blade.php
│   ├── right.blade.php
│   └── main.blade.php
├── marketing/
│   ├── cta.blade.php
│   ├── features.blade.php
│   ├── testimonials.blade.php
│   ├── faq.blade.php
│   ├── team.blade.php
│   └── pricing.blade.php
├── content/
│   ├── text.blade.php
│   ├── image.blade.php
│   ├── video.blade.php
│   ├── cards.blade.php
│   ├── blog-posts.blade.php
│   └── topics-grid.blade.php
├── layout/
│   ├── container.blade.php
│   ├── grid.blade.php
│   ├── columns.blade.php
│   └── divider.blade.php
├── data/
│   ├── stats.blade.php
│   ├── table.blade.php
│   ├── list.blade.php
│   ├── description-list.blade.php
│   └── calendar.blade.php
├── forms/
│   ├── contact-form.blade.php
│   ├── search-form.blade.php
│   ├── newsletter.blade.php
│   ├── signin.blade.php
│   └── signup.blade.php
├── feedback/
│   ├── alert.blade.php
│   ├── banner.blade.php
│   ├── toast.blade.php
│   ├── progress.blade.php
│   └── skeleton.blade.php
├── ecommerce/
│   ├── product-card.blade.php
│   ├── product-list.blade.php
│   ├── shopping-cart.blade.php
│   └── checkout.blade.php
└── dashboard/
    ├── stats-cards.blade.php
    ├── activity-feed.blade.php
    └── recent-items.blade.php
```

---

## 🚀 Migration Strategy

### Phase 1: Audit Existing JSON

```bash
# Find all JSON files with incorrect block types
grep -r "blocks\.tests\." laravel/config/local/fixcity/database/content/pages/
```

### Phase 2: Create Block Views

Priority order:
1. `navigation/breadcrumb.blade.php`
2. `hero/center.blade.php`
3. `content/text.blade.php`
4. `content/topics-grid.blade.php`
5. `marketing/features.blade.php`
6. `feedback/alert.blade.php`
7. `navigation/steps.blade.php`
8. `data/description-list.blade.php`

### Phase 3: Refactor JSON Files

For each JSON file:
1. Identify page type (argomenti, homepage, servizi, etc.)
2. Map content to universal block types
3. Update `type` and `view` properties
4. Test rendering

### Phase 4: Visual Verification

```bash
# Capture screenshots
./bashscripts/docs/capture-screenshots.sh all

# Compare with upstream
./bashscripts/docs/visual-comparison.sh
```

---

## 📊 Compliance Checklist

- [ ] All block types use universal taxonomy
- [ ] No `tests.*` namespace in production blocks
- [ ] All views exist in correct directories
- [ ] JSON `type` matches view path
- [ ] Visual match with upstream >95%
- [ ] Test coverage 100%

---

## 📚 Related Documentation

- [Block View Naming Convention](./BLOCK_VIEW_NAMING_CONVENTION.md)
- [Multi-Block JSON Pattern](./json-multi-block-governance.md)
- [Flowbite Blocks](https://flowbite.com/blocks/)
- [Tailwind UI Blocks](https://tailwindcss.com/plus/ui-blocks)
- [DaisyUI Components](https://daisyui.com/components/)

---

**Last Updated**: 2026-03-30  
**Next Review**: After Phase 4 completion  
**Owner**: Multi-Agent Team
