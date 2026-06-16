# Laravel Pizza Project Rules and Memories

## Critical Architectural Rules

1. **Laraxot Migration Philosophy**: In a module, for each table there must be only ONE migration responsible for its creation (`create_{table}_table.php`). Multiple migrations for the same table is a violation. To modify schema: edit the SAME migration file and UPDATE the timestamp in the filename. NEVER create separate `add_column_to_table.php` migrations. Use tableUpdate() with hasColumn() checks for safe additions. Models strictly dependent on main_module (e.g. Profile): migration goes in main module (TechPlanner), NOT in User. Use XotBaseMigration::convertIdFromUuidToBigintIfNeeded() for UUID→bigint conversion.

2. **NO property_exists() on Eloquent models**: Use hasAttribute(), isFillable() or Schema::hasColumn() instead, because model attributes are magical properties.

3. **Folio + Volt + Filament Architecture**: In the front office, NEVER use controllers or write routes in web.php/api.php. ALWAYS use Folio + Volt + Filament for all frontoffice development.

4. **Mixed (tipo di dato) - Solo come Ultima Spiaggia**: Il tipo `mixed` deve essere usato SOLO come ultima spiaggia. Preferire union types, generics, interfacce. Usare mixed solo quando non esiste alternativa (es. API esterne).

5. **XotBase Extension Rule**: All custom components must extend XotBase classes (XotBaseResource, XotBasePage, XotBaseSection, etc.) instead of extending Filament classes directly.

6. **View Pattern**: Per view() usare variabile `@phpstan-var view-string $viewName`, `$viewParams = []`, `return view($viewName, $viewParams)`. Vedi docs/view-pattern.md.

7. **PHPMD e PHPInsights — SOLO .phar**: Non installare con Composer. Usare .phar: `php phpmd.phar`, `php phpinsights.phar`. Build PHPInsights: docs/phpinsights-phar-build.md. Uso: docs/quality-tools-setup.md.

## Documentation Rules

1. **File Naming**: All .md files must be lowercase with dashes (except README.md and CHANGELOG.md which can have capitals)
2. **Documentation Location**: All .md files must go inside existing 'docs' directories, not created elsewhere
3. **Content Quality**: Documentation should follow DRY (Don't Repeat Yourself) and KISS (Keep It Simple, Stupid) principles

## PHP Quality Standards

1. **PHPStan Level 10**: All modules must maintain PHPStan level 10 compliance
2. **Strict Types**: All PHP files must declare(strict_types=1)
3. **Safe Casting**: Use Safe*CastAction classes for type safety
4. **Webmozarts Assert**: Use webmozarts/assert for input validation

## Git Conflict Resolution

1. **No Backup Policy**: Conflict resolution scripts should not create backup files
2. **Current Change Strategy**: When resolving conflicts automatically, take the "current change" (content after =======)
3. **File Types**: Handle various file types including PHP, JS, JSON, MD, etc.

## Theme Development

1. **Asset Management**: Each theme has its own package.json and vite.config.js
2. **Build Process**: Use `npm run build && npm run copy` to compile and deploy theme assets
3. **Layout Structure**: Use <x-metatags> component instead of manual head content

## Laravel 11+ Patterns

1. **Casts Method**: Use casts() method instead of $casts property
2. **Filament Labels**: Use translation files via LangServiceProvider instead of label(), placeholder(), tooltip() methods
3. **Enum-Driven Fillable**: Use enum-driven fillable fields instead of static arrays

## Quality Assurance

1. **Pest PHP**: All tests must be written in Pest PHP, not PHPUnit
2. **Code Quality Tools**: Run PHPStan, PHPMD, and PHPInsights after every change
3. **Documentation Updates**: Always update docs folders when making changes to the codebase
