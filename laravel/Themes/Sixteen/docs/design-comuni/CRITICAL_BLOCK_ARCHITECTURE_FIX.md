# 🚨 Critical Block Architecture Fix

**Severity**: 🔴 **CRITICAL**  
**Date**: 2026-03-30  
**Status**: 🟡 In Progress  
**Owner**: Multi-Agent Team (Winston + Amelia)

---

## 🐛 Problem Identified

### Error Message
```
Unable to locate a class or view for component 
[pub_theme::components.blocks.tests.argomenti.topics-grid].
```

### Root Cause Analysis

**The error hides a deeper architectural problem:**

1. **`tests.argomenti` is NOT a valid block type**
   - `tests` is a page namespace, NOT a block category
   - `argomenti` is a page name, NOT a block type
   - This violates the block naming convention

2. **Incorrect Pattern Used**:
   ```json
   // WRONG ❌
   {
     "type": "argomenti",
     "data": {
       "view": "pub_theme::components.blocks.tests.argomenti"
     }
   }
   ```

3. **Correct Pattern Should Be**:
   ```json
   // CORRECT ✅
   {
     "type": "hero/center",
     "data": {
       "view": "pub_theme::components.blocks.hero.center"
     }
   }
   ```

---

## 🎯 Golden Rule (CORRETTA)

> **Il blocco se è di tipo `<category>/<block_type>` la view dentro `data` deve essere:**
> ```
> pub_theme::components.blocks.<category>.<block_type>.<variant>
> ```

**Block categories MUST come from**:
- ✅ **Flowbite** (https://flowbite.com/blocks/)
- ✅ **Tailwind UI** (https://tailwindcss.com/plus/ui-blocks)
- ✅ **DaisyUI** (https://daisyui.com/components/)

**NOT from**:
- ❌ Page namespaces (`tests`, `pages`, `cms`)
- ❌ Custom names (`argomenti`, `servizi`, `appuntamento`)

---

## 📋 Universal Block Categories

Based on Flowbite, Tailwind UI, and DaisyUI:

| Category | Purpose | Examples |
|----------|---------|----------|
| `navigation` | Page navigation | navbar, breadcrumb, pagination, tabs, steps |
| `hero` | Page headers | center, left, right, with-image |
| `marketing` | Promotional content | features, cta, testimonials, faq, team, pricing |
| `content` | Main content | text, image, video, cards, blog-posts, topics-grid |
| `layout` | Structure | container, grid, columns, divider, stack |
| `data` | Data display | stats, table, list, description-list, calendar |
| `forms` | User input | contact-form, search-form, newsletter, signin, signup |
| `feedback` | User feedback | alert, banner, toast, progress, skeleton |
| `ecommerce` | Shopping | product-card, product-list, shopping-cart, checkout |
| `dashboard` | Admin panels | stats-cards, activity-feed, recent-items |

---

## 🔍 Affected Files

**Total JSON Files**: 38  
**Files with Incorrect Block Types**: 38 (100%)  
**Block Views to Create**: 20+

### Breakdown by Page Type

| Page Type | JSON Files | Primary Block Types Needed |
|-----------|------------|---------------------------|
| Argomenti | 2 | hero, content/text, marketing/features, content/topics-grid |
| Homepage | 1 | hero, marketing/features, content/cards |
| Servizi | 3 | hero, content/list, data/table |
| Eventi | 2 | hero, content/cards, marketing/cta |
| Appuntamento (8 steps) | 8 | navigation/steps, feedback/alert, data/description-list, forms/* |
| Assistenza | 2 | forms/contact-form, feedback/alert |
| Segnalazione | 7 | forms/*, feedback/*, navigation/* |

---

## 🛠️ Fix Plan

### Phase 1: Create Core Block Views

**GSD Phase**: `.planning/phases/06-create-universal-blocks/`

**Priority 1 - Navigation** (ETA: 1 hour):
- [ ] `navigation/breadcrumb.blade.php`
- [ ] `navigation/steps.blade.php`
- [ ] `navigation/tabs.blade.php`

**Priority 2 - Hero** (ETA: 30 min):
- [ ] `hero/center.blade.php`
- [ ] `hero/left.blade.php`

**Priority 3 - Content** (ETA: 1 hour):
- [ ] `content/text.blade.php`
- [ ] `content/topics-grid.blade.php`
- [ ] `content/cards.blade.php`

**Priority 4 - Marketing** (ETA: 1 hour):
- [ ] `marketing/features.blade.php`
- [ ] `marketing/cta.blade.php`

**Priority 5 - Data** (ETA: 30 min):
- [ ] `data/description-list.blade.php`
- [ ] `data/stats.blade.php`

**Priority 6 - Feedback** (ETA: 30 min):
- [ ] `feedback/alert.blade.php`
- [ ] `feedback/banner.blade.php`

**Total ETA**: 4.5 hours

### Phase 2: Refactor JSON Files

**Task**: Update all 38 JSON files to use correct block types

**Example Conversion**:

**BEFORE**:
```json
{
  "content_blocks": {
    "it": [
      {
        "type": "argomenti",
        "data": {
          "view": "pub_theme::components.blocks.tests.argomenti"
        }
      }
    ]
  }
}
```

**AFTER**:
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
          "content": "<p>Gli argomenti rispondono a un'esigenza...</p>"
        }
      },
      {
        "type": "marketing/features",
        "data": {
          "view": "pub_theme::components.blocks.marketing.features",
          "title": "IN EVIDENZA",
          "items": [...]
        }
      },
      {
        "type": "content/topics-grid",
        "data": {
          "view": "pub_theme::components.blocks.content.topics-grid",
          "topics": [...]
        }
      }
    ]
  }
}
```

**Owner**: Amelia (BMAD Dev)  
**ETA**: 4 hours

### Phase 3: Delete Old Block Views

**Files to Delete**:
- `blocks/tests/intro.blade.php` (if exists)
- `blocks/tests/body.blade.php` (if exists)
- `blocks/tests/governance-note.blade.php` (if exists)
- `blocks/tests/source-link.blade.php` (if exists)
- `blocks/tests/argomenti.blade.php` (if exists)
- `blocks/tests/appuntamento-conferma.blade.php` (if exists)
- `blocks/tests/reference-page.blade.php` (if exists)

**Reason**: These violate the universal block taxonomy.

### Phase 4: Visual Verification

**Task**: Capture and compare screenshots

**Command**:
```bash
./bashscripts/docs/capture-screenshots.sh all
./bashscripts/docs/visual-comparison.sh
```

**Target**: 95%+ visual match with upstream

---

## 📊 Impact Analysis

### Before Fix

| Metric | Value |
|--------|-------|
| Block Views Errors | 100% (38/38 files) |
| Valid Block Types | 0% |
| Universal Compliance | 0% |
| Visual Match | 0% |

### After Fix

| Metric | Target | Value |
|--------|--------|-------|
| Block Views Errors | 0% | 0% |
| Valid Block Types | 100% | 100% |
| Universal Compliance | 100% | 100% |
| Visual Match | 95%+ | TBD |

---

## 🤖 Multi-Agent Coordination

### Agents Involved

| Agent | Role | Tasks |
|-------|------|-------|
| **Winston (Architect)** | Architecture | Define universal taxonomy |
| **Amelia (Dev)** | Implementation | Create block views, refactor JSON |
| **Sally (UX)** | Design | AGID compliance |
| **Paige (Tech Writer)** | Documentation | Update docs |
| **Frontend Visual Verification** | Testing | Screenshot comparison |

### Coordination Protocol

1. **Check BMAD Thread**: `_bmad/threads/zen-documentation.md`
2. **Update GSD Phase**: `.planning/phases/06-create-universal-blocks/`
3. **OpenViking Context**:
   ```bash
   openviking add-memory "Universal block taxonomy: navigation, hero, marketing, content, layout, data, forms, feedback, ecommerce, dashboard"
   ```
4. **GitHub Issue**: Declare intention, update progress

---

## 📚 Documentation Updates

### Files to Update

- [ ] `BLOCK_VIEW_NAMING_CONVENTION.md` - Add correct pattern
- [ ] `UNIVERSAL_BLOCK_TYPES_TAXONOMY.md` - Create new
- [ ] `json-multi-block-governance.md` - Update examples
- [ ] `.windsurfrules` - Add golden rule

### Files to Deprecate

- [ ] Any docs referencing `blocks/tests/*` pattern

---

## ✅ Acceptance Criteria

- [ ] All 38 JSON files use universal block types
- [ ] All block views exist in correct directories
- [ ] No references to `blocks/tests/*`
- [ ] Visual match >95% with upstream
- [ ] Test coverage 100%
- [ ] Documentation updated

---

## 📞 Next Steps

1. **Immediate**: Create GSD Phase 06
2. **Today**: Create Priority 1-3 block views
3. **Tomorrow**: Refactor all JSON files
4. **Day 3**: Visual verification

---

**Last Updated**: 2026-03-30  
**Next Review**: After Phase 1 completion  
**Owner**: Multi-Agent Team
