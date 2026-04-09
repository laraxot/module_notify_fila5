# CreateTicketWizardWidget - Documentation

**Module**: Fixcity  
**Widget**: CreateTicketWizardWidget  
**Path**: `app/Filament/Widgets/CreateTicketWizardWidget.php`  
**View**: `resources/views/filament/widgets/ticket-create-wizard.blade.php`

---

## Overview

Filament widget for creating Tickets via a 3-step wizard in the frontoffice.

### Naming Convention

- ✅ **Correct**: `CreateTicketWizardWidget`
- ❌ **Wrong**: `CreateSegnalazioneWizardWidget`

"Ticket" is used in class names and CSS classes. "Segnalazione" is only used in translation keys.

---

## Architecture

### 3-Step Wizard

| Step | Content | Validation |
|------|---------|------------|
| 1 | Privacy consent | `privacyAccepted` must be accepted |
| 2 | Issue data (address, type, title, details, images, author) | Required fields validated |
| 3 | Summary review | All fields re-validated |

### Post-Submit Flow

After Step 3 submit:
1. Creates `Ticket` model
2. Dispatches `TicketCreatedEvent`
3. Redirects to `/it/tests/segnalazione-04-conferma`

**Note**: 04-conferma is NOT part of the wizard - it's a separate page.

---

## Widget Properties

```php
public int $currentStep = 1;
public bool $privacyAccepted = false;
public string $address = '';
public string $issueType = '';
public string $title = '';
public string $details = '';
public string $email = '';
public array $images = [];
public string $userName = '';
public string $userFiscalCode = '';
public string $userPhone = '';
```

---

## Methods

| Method | Purpose |
|--------|---------|
| `mount()` | Initialize with blockData |
| `nextStep()` | Validate + advance to next step |
| `prevStep()` | Go back to previous step |
| `submit()` | Create ticket + redirect |
| `removeImage()` | Remove uploaded image |
| `getIssueTypeOptions()` | Get issue type dropdown options |
| `render()` | Render view with steps and options |

---

## Translations

Pattern: `fixcity::segnalazione.steps.<item>.<tipo>`

### Step Labels
```
fixcity::segnalazione.steps.privacy.label
fixcity::segnalazione.steps.data.label
fixcity::segnalazione.steps.summary.label
```

### Status Labels
```
fixcity::segnalazione.steps.active.label
fixcity::segnalazione.steps.confirmed.label
```

---

## View Template

The widget uses a custom Blade view (NOT Filament Schema components) to maintain HTML parity with the Design Comuni reference.

Key sections in `ticket-create-wizard.blade.php`:
- Title + breadcrumbs
- Steppers header (3 steps)
- Step 1: Privacy text + checkbox
- Step 2: Address, issue type, title, details, images, author
- Step 3: Warning callout + summary table + submit button
- Navigation buttons (back/save/forward)
- "Contatta il comune" footer section

---

## CSS Classes

The widget uses Design Comuni classes styled via Tailwind `@apply`:

```
.ticket-wizard-root
.steppers-header ul
.steppers-header li
.steppers-header li.active
.steppers-header li.confirmed
.cmp-card
.card.has-bkg-grey
.form-check
.checkbox-body
.btn.btn-primary
```

---

## Cross-References

- [Theme Docs](../../../Themes/Sixteen/docs/design-comuni/TICKET-CREATION-WIZARD.md)
- [Page JSON](../../../config/local/fixcity/database/content/pages/tests.segnalazione-crea.json)
- [Widget View](resources/views/filament/widgets/ticket-create-wizard.blade.php)

---

*Last updated: 2026-04-09*
