# Laraxot Architecture — Quick Reference Index

## How to Use This Index

When you need to find the right component/pattern:
1. **Know the concern type** → Look it up below
2. **Find the owning module** → That's where the code lives
3. **Find the XotBase wrapper** → Extend it, don't reinvent
4. **Find the docs** → Read before writing code

---

## Module Ownership

| Concern | Owning Module | Consumer Modules |
|---------|--------------|-----------------|
| Geolocation, addresses, maps | **Geo** | Fixcity, User, any module needing location |
| Ticket/segnalazione management | **Fixcity** | None (domain-specific) |
| CMS content blocks, pages | **Cms** | Sixteen theme, all frontoffice |
| User authentication, profiles | **User** | Fixcity (for ticket ownership) |
| Base classes, wrappers | **Xot** | ALL modules |
| Design system, themes | **Sixteen** (theme) | Cms, Fixcity (via CSS) |
| AI, predictions | **Predict**, **AI** | Fixcity (for AI-generated predictions) |
| Language/translations | **Lang** | ALL modules |
| Tenant/multi-tenancy | **Tenant** | ALL modules |

## Component Directory

### Filament Form Components

| Component | Module | Path | Extends | Use For |
|-----------|--------|------|---------|---------|
| **AddressInput** | Geo | `app/Filament/Forms/Components/AddressInput.php` | `TextInput` | Single address with geolocation |
| **AddressField** (Forms) | Geo | `app/Filament/Forms/Components/AddressField.php` | `Section` | Full address (region→province→locality cascade) |
| **AddressesField** | Geo | `app/Filament/Forms/Components/AddressesField.php` | `Repeater` | Multiple addresses |
| MapBlock | Geo | `app/Filament/Blocks/MapBlock.php` | `Block` | Map in CMS blocks |

### Filament Widgets

| Widget | Module | Path | Extends | Use For |
|--------|--------|------|---------|---------|
| **CreateTicketWizardWidget** | Fixcity | `app/Filament/Widgets/CreateTicketWizardWidget.php` | `XotBaseWizardWidget` | 3-step ticket creation |
| LocationWidget | Geo | `app/Filament/Widgets/LocationWidget.php` | `XotBaseWidget` | Map display |
| LocationMapTableWidget | Geo | `app/Filament/Widgets/LocationMapTableWidget.php` | `XotBaseWidget` | Table + map combo |

### Filament Resources

| Resource | Module | Path | Extends | Use For |
|----------|--------|------|---------|---------|
| AddressResource | Geo | `app/Filament/Resources/AddressResource.php` | `XotBaseResource` | Address CRUD |
| LocationResource | Geo | `app/Filament/Resources/LocationResource.php` | `XotBaseResource` | Location CRUD |

### Base Classes (Xot)

| Base Class | Module | Path | Purpose |
|------------|--------|------|---------|
| XotBaseResource | Xot | `app/Filament/Resources/XotBaseResource.php` | Centralized nav, auth, localization |
| XotBaseWidget | Xot | `app/Filament/Widgets/XotBaseWidget.php` | Base widget with form integration |
| **XotBaseWizardWidget** | Xot | `app/Filament/Widgets/XotBaseWizardWidget.php` | **MUST extend for wizards** — ?step= handling, state normalization |
| XotBaseModel | Xot | `app/Models/XotBaseModel.php` | Base model with casts, relations |
| XotBaseMigration | Xot | `database/Migrations/XotBaseMigration.php` | Safe migration patterns |
| XotBaseServiceProvider | Xot | `app/Providers/XotBaseServiceProvider.php` | Module registration |
| XotBasePage | Xot | `app/Filament/Pages/XotBasePage.php` | Filament page base |
| XotBaseDashboard | Xot | `app/Filament/Pages/XotBaseDashboard.php` | Dashboard page base |

### Actions (Invokable, Queueable)

| Action | Module | Path | Purpose |
|--------|--------|------|---------|
| GetCoordinatesByAddressAction | Geo | `app/Actions/GetCoordinatesByAddressAction.php` | Address → lat/lng |
| GetAddressFromNominatimAction | Geo | `app/Actions/Nominatim/GetAddressFromNominatimAction.php` | Reverse geocoding |
| CalculateDistanceAction | Geo | `app/Actions/CalculateDistanceAction.php` | Distance between coordinates |
| GetAddressFromGoogleMapsAction | Geo | `app/Actions/GoogleMaps/GetAddressFromGoogleMapsAction.php` | Google geocoding |

---

## Documentation Index by Module

| Module | Index File | Key Docs |
|--------|-----------|----------|
| **Geo** | [docs/INDEX.md](../Geo/docs/INDEX.md) | [AddressInput](../Geo/docs/address-input-component.md) |
| **Fixcity** | [docs/INDEX.md](../Fixcity/docs/INDEX.md) | [Module Boundary Philosophy](../Fixcity/docs/MODULE-BOUNDARY-PHILOSOPHY.md), [Wizard Rule](../Fixcity/docs/filament-wizard-rule.md) |
| **Xot** | `docs/00-index.md` | [XotBaseWizardWidget Philosophy](../Xot/docs/filament/widgets/xot-base-wizard-widget-philosophy.md) |
| **Sixteen** | `docs/00-index.md` | HTML Parity, CSS Scoping, Stepper Responsive |

---

## Rules Quick Reference

| Rule | What to Do | What NOT to Do |
|------|-----------|----------------|
| **Address input** | `use Modules\Geo\Filament\Forms\Components\AddressInput;` | `Blade::render('geo::...')` |
| **Wizard widget** | `extends XotBaseWizardWidget` | `extends XotBaseWidget` |
| **Business logic** | Action class (invokable) | Service class |
| **Filament resource** | `extends XotBaseResource` | `extends Resource` |
| **Model** | `extends XotBaseModel` + `casts()` method | `extends Model` + `$casts` array |
| **Migration** | `extends XotBaseMigration` | `extends Migration` |
| **Translations** | `__('namespace::context.collection.element.type')` (5 levels) | `__('namespace.key')` (2 levels) |
| **Cross-module** | Import from owning module | Copy-paste or Blade::render |
| **Body tag** | `<body>` (plain, no classes) | `<body class="...">` |
| **Stepper CSS** | Mobile-first (375px → 768px → 1024px) | Desktop-first with overrides |

---

## Duplicate Prevention

Before creating ANY new file:

1. **Grep first**: `grep -r "ClassName" Modules/` — does it already exist?
2. **Check docs index**: Is there already a doc for this?
3. **Check module ownership**: Does another module already own this concern?
4. **Check XotBase**: Is there a base class to extend?

**Rule**: If a file exists, IMPROVE it. Don't create a parallel.
