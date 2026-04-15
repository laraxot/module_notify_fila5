# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**FixCity** is a professional-grade, modular Laravel application built with **Laravel 12**, **Filament 4**, and **Livewire 3**. It demonstrates excellence in code quality (94.5% quality score), test coverage (85%), and architecture (99.8% low-complexity methods). The application uses a multi-tenant architecture with a modular structure powered by nwidart/laravel-modules.

## Essential Commands

### Development
```bash
# Start development server with all services
composer run dev

# Alternative: Start individual services
php artisan serve
php artisan queue:listen --tries=1
npm run dev
```

### Testing
```bash
# Run all tests
./vendor/bin/pest

# Run with coverage (requires 80% minimum)
./vendor/bin/pest --coverage --min=80

# Run specific module tests
./vendor/bin/pest Modules/Xot/Tests

# Run specific test by filter
./vendor/bin/pest --filter=ArtisanService

# Run tests via npm
npm run test
npm run test:coverage
npm run test:xot
```

### Code Quality
```bash
# Run PHPStan analysis (Level max)
./vendor/bin/phpstan analyse --level=max

# Fix code style (Laravel Pint)
./vendor/bin/pint

# Check code style without fixing
./vendor/bin/pint --test

# Run complexity analysis
php analyze_complexity.php

# Run all quality checks
npm run quality    # PHPStan + Pint + Tests
npm run ci         # Quality + Complexity
```

### Module Management
```bash
# List all modules
php artisan module:list

# Create a new module
php artisan module:make ModuleName

# Enable/disable modules
php artisan module:enable ModuleName
php artisan module:disable ModuleName
```

### Database
```bash
# Run migrations
php artisan migrate

# Run migrations for specific module
php artisan module:migrate ModuleName

# Seed database
php artisan db:seed
```

### Filament
```bash
# Optimize Filament for production
php artisan filament:optimize

# Upgrade Filament components
php artisan filament:upgrade

# Create Filament resource
php artisan make:filament-resource ModelName --no-interaction
```

### Asset Building
```bash
# Build for production
npm run build

# Watch for changes (development)
npm run dev
```

## Architecture

### Modular Structure

The application is organized into **18 independent modules** located in `Modules/`. Each module is self-contained with its own models, services, views, tests, and migrations.

**Core Modules:**
- **Xot**: Foundation module providing core utilities, services, and base structures used by all other modules
- **Tenant**: Multi-tenancy management with tenant isolation
- **User**: Authentication, authorization, and user management
- **Fixcity**: Main application business logic

**Feature Modules:**
- **Blog**: Content management system
- **Cms**: CMS functionality
- **Geo**: Geographic/location services
- **Notify**: Notification system (email, SMS, push)
- **Media**: Media management and storage
- **Comment**: Commenting system
- **Rating**: Rating/review system

**Support Modules:**
- **UI**: Shared UI components and layouts
- **Lang**: Localization and translation services
- **Activity**: Activity logging and audit trails
- **Job**: Job queue management
- **Gdpr**: GDPR compliance tools
- **Seo**: SEO optimization
- **AI**: AI/ML integrations

### Directory Structure

Each module follows this structure:
```
Modules/ModuleName/
├── app/
│   ├── Actions/          # Single-purpose action classes
│   ├── Contracts/        # Interfaces
│   ├── DTOs/             # Data Transfer Objects
│   ├── Enums/            # Enum classes
│   ├── Filament/         # Filament resources, pages, widgets
│   ├── Http/             # Controllers, requests, middleware
│   ├── Models/           # Eloquent models
│   ├── Providers/        # Service providers
│   ├── Services/         # Business logic services
│   └── Traits/           # Reusable traits
├── database/
│   ├── factories/        # Model factories
│   ├── migrations/       # Database migrations
│   └── seeders/          # Database seeders
├── routes/               # Module routes
├── tests/                # Pest tests
│   ├── Feature/         # Feature tests
│   └── Unit/            # Unit tests
├── docs/                 # Module documentation
└── module.json           # Module metadata
```

### Key Design Patterns

The codebase implements professional design patterns:

- **Action Pattern**: Single-purpose classes in `Actions/` directories for discrete operations
- **Service Pattern**: Business logic encapsulated in service classes
- **Repository Pattern**: Data access abstraction (where applicable)
- **DTO Pattern**: Type-safe data transfer objects
- **Strategy Pattern**: Used in config resolvers and dynamic behaviors
- **Observer Pattern**: Laravel model observers for side effects
- **Factory Pattern**: Model factories for testing

### Laravel 11/12 Specifics

This project uses Laravel 11/12's streamlined structure:
- No `app/Http/Kernel.php` - middleware registered in `bootstrap/app.php`
- No `app/Console/Kernel.php` - commands auto-discovered
- Custom `App\Application` class extends `Illuminate\Foundation\Application`
- Service providers in `bootstrap/providers.php`

## Development Guidelines

### Creating New Code

1. **Always use Artisan commands** to create new files:
   ```bash
   php artisan make:model Name --factory --migration --seed
   php artisan make:test NameTest --pest
   php artisan make:filament-resource Name --no-interaction
   php artisan make:class Name
   php artisan make:action Name
   ```

2. **Follow existing conventions**: Check sibling files in the same directory for naming, structure, and patterns before creating new files.

3. **Module-first approach**: New functionality should be added to the appropriate module, not to the core `app/` directory.

### Code Quality Standards

**Mandatory requirements:**
- **Cyclomatic Complexity**: ≤10 per method (target 99.8% compliance)
- **PHPStan**: Level max with zero errors
- **Test Coverage**: ≥80% (target 85%+)
- **Code Style**: PSR-12 via Laravel Pint
- **Type Safety**: Full type hints on all methods and properties
- **Documentation**: PHPDoc blocks for all public methods

### Testing Requirements

**Every change MUST be tested:**
- Write Pest tests in `tests/Feature/` or `tests/Unit/`
- Use factories for model creation
- Run tests before committing: `./vendor/bin/pest --filter=RelatedTest`
- Achieve minimum 80% coverage

**Test structure:**
```php
<?php

use Modules\Xot\Models\Example;

test('example functionality works', function () {
    $model = Example::factory()->create();

    expect($model)->toBeInstanceOf(Example::class);
});
```

### PHPStan Configuration

- Runs at **level max** across all `Modules/`
- Baseline file: `phpstan-baseline.neon` (do not add new errors)
- Custom rules from `thecodingmachine/phpstan-safe-rule`
- Module-specific configs: `Modules/*/phpstan.neon`

#### ⚠️ CRITICAL: NEVER EXCLUDE TESTS FROM PHPSTAN

**This is a fundamental quality rule that must NEVER be violated:**

```yaml
# ❌ COMPLETELY WRONG - NEVER DO THIS!
excludePaths:
    - ./Modules/*/tests/*
    - ./tests/*
```

**Why excluding tests is wrong:**
1. **Tests are production code** - they document behavior and prevent regressions
2. **Type safety matters in tests** - errors in tests compromise the entire quality system
3. **False positives** - tests can pass for wrong reasons without static analysis
4. **Quality degradation** - progressively hides type errors that accumulate over time

**Correct approach:**
- Fix type errors in tests (preferred)
- Use specific ignores for legitimate patterns (e.g., Pest dynamic properties)
- Never blanket-exclude entire test directories

See `Modules/Activity/docs/PHPSTAN_QUALITY_RULES.md` for detailed explanation.

### Working with Filament

- Resources in `app/Filament/Resources/` or `Modules/*/app/Filament/Resources/`
- Use Filament 4 component namespaces (`Forms\Components`, `Tables\Columns`)
- Always use Artisan commands to create Filament components
- Test Filament components using Livewire testing helpers

### Module Development

When working in a module:
1. Check `module.json` for dependencies and metadata
2. Module services auto-register via providers defined in `module.json`
3. Each module can have its own routes, views, and assets
4. Module status tracked in `modules_statuses.json`
5. Modules can be independently enabled/disabled

## Common Workflows

### Adding a New Feature

1. Identify the appropriate module (or create a new one)
2. Create model with factory, migration, seeder:
   ```bash
   php artisan make:model Modules/ModuleName/Models/Thing -mfs
   ```
3. Create Filament resource:
   ```bash
   php artisan make:filament-resource Thing --generate --no-interaction
   ```
4. Write tests:
   ```bash
   php artisan make:test --pest Modules/ModuleName/Tests/Feature/ThingTest
   ```
5. Run quality checks:
   ```bash
   ./vendor/bin/pint
   ./vendor/bin/phpstan analyse
   ./vendor/bin/pest
   ```

### Fixing Quality Issues

1. Check current state:
   ```bash
   ./vendor/bin/phpstan analyse --error-format=table
   ```
2. Fix issues (do not add to baseline)
3. Run Pint to fix code style:
   ```bash
   ./vendor/bin/pint
   ```
4. Verify tests still pass:
   ```bash
   ./vendor/bin/pest
   ```

### Working with Multi-Tenancy

- Tenant context managed by `Tenant` module
- Tenant-aware models should use tenant scoping
- Check existing tenant models for patterns
- Test with multiple tenant contexts

## Important Notes

### Do Not:
- **❌ NEVER exclude tests from PHPStan** (see critical rule above)
- Add errors to `phpstan-baseline.neon` (fix them instead)
- Create new base directories without approval
- Use `DB::` facade (prefer Eloquent models)
- Use `env()` outside config files (use `config()`)
- Skip tests or reduce coverage
- Ignore code complexity metrics

### Always:
- Run `./vendor/bin/pint` before committing
- Write/update tests for every change
- Use type hints for all parameters and return types
- Follow PSR-12 coding standards
- Check module dependencies before making changes
- Use Laravel Boost MCP tools (`search-docs`, `tinker`, `database-query`) when available

### Laravel Boost Integration

This project uses Laravel Boost MCP server with specialized tools:
- `search-docs`: Version-specific Laravel/Filament/Livewire documentation
- `tinker`: Execute PHP in Laravel context
- `database-query`: Read-only database queries
- `list-artisan-commands`: Available Artisan commands
- `get-absolute-url`: Generate correct URLs for this environment
- `browser-logs`: Read browser console logs

## Reference Documentation

- Main README: `README.md`
- Architecture guidelines: See `.cursor/rules/laravel-boost.mdc` and `.github/copilot-instructions.md`
- Module docs: Each module has a `docs/` directory
- PHPStan config: `phpstan.neon`
- Complexity analysis: Run `php analyze_complexity.php`

## Quality Achievements (2025)

- ✅ 94.5% Overall Quality Score (A+)
- ✅ 99.8% Low Complexity Methods
- ✅ 85% Test Coverage
- ✅ Zero PHPStan Errors at Level Max
- ✅ 100% PSR-12 Compliance
- ✅ 18 Active Modules with Clean Architecture
