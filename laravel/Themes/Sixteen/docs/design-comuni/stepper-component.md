# Stepper Component - Design Comuni Parity

**Page**: segnalazione-02-dati  
**Last Updated**: 2026-04-12  
**Status**: ✅ Mobile-first responsive CSS implemented

---

## Overview

The stepper component displays the multi-step progress indicator for the segnalazione (disruption report) flow. It shows completed, active, and pending steps with proper visual styling at all breakpoints.

**Reference**: [Design Comuni segnalazione-02-dati](https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html)

---

## Implementation

### Blade Component

**Location**: `laravel/Themes/Sixteen/resources/views/components/blocks/flow/stepper.blade.php`

**Features**:
- ✅ All text uses translation keys (NO hardcoded Italian)
- ✅ Mobile-first responsive design
- ✅ Semantic HTML with `visually-hidden` accessibility labels
- ✅ Bootstrap Italia class names for HTML parity

### CSS Styling

**Location**: `laravel/Themes/Sixteen/resources/css/style-apply.css` (lines 2161-2290)

**Breakpoints**:
| Breakpoint | Behavior |
|------------|----------|
| Mobile (<768px) | Compact stepper with scrollable indicators, small circles |
| Tablet (768-991px) | Medium stepper with full step titles |
| Desktop (≥992px) | Full horizontal stepper with divider lines between steps |

**Key Classes**:
```css
.steppers              /* Wrapper */
.steppers-header       /* Header container */
.steppers-header ul    /* Step list (flex, scrollable on mobile) */
.steppers-header li    /* Individual step */
.steppers-number       /* Step number circle */
.steppers-success      /* Check icon for completed steps */
.steppers-index        /* "2/4" indicator */
```

---

## Translation Keys

All stepper text uses the `fixcity::segnalazione.steps.*` namespace:

| Key | Italian | English |
|-----|---------|---------|
| `steps.privacy.label` | Autorizzazioni e condizioni | Authorizations and conditions |
| `steps.data.label` | Dati di segnalazione | Report Data |
| `steps.summary.label` | Riepilogo | Summary |
| `steps.confirmed.label` | Confermato | Confirmed |
| `steps.active.label` | Attivo | Active |
| `steps.step_number.label` | Passo :number | Step :number |
| `steps.current_of_total.label` | Passo :current di :total | Step :current of :total |

**Files**:
- Italian: `laravel/Modules/Fixcity/lang/it/segnalazione.php`
- English: `laravel/Modules/Fixcity/lang/en/segnalazione.php`

---

## Related Documentation

- [Design Comuni Replication Rules](../DESIGN_COMUNI_RULES.md) — Body tag rules, translation format
- [segnalazione-02-dati Page](./segnalazione-02-dati.md) — Full page documentation
- [Style Apply CSS](../../resources/css/style-apply.css) — All @apply rules
- [Block Implementation Guide](./BLOCK_IMPLEMENTATION_GUIDE.md) — Universal block patterns

---

## Change History

| Date | Change | Commit |
|------|--------|--------|
| 2026-04-12 | Added mobile-first responsive stepper CSS | `8f547e01d` |
| 2026-04-12 | Replaced hardcoded Italian with translation keys | `8f547e01d` |
| 2026-04-10 | Initial stepper component creation | `f717e62a` |
