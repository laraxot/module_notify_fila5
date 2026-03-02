# FixCity Platform - AGENTS.md

This file contains comprehensive guidelines and commands for AI agents working on the FixCity Laravel application.

## 🏗️ PROJECT OVERVIEW

**Architecture**: Modular Laravel application using `nwidart/laravel-modules`  
**Framework**: Laravel 12.x with Filament 4.x (migrating to 5.x)  
**PHP Version**: 8.2+ (strict typing required)  
**Module Structure**: 20+ modules in `/laravel/Modules/` directory  

## 🚀 BUILD/LINT/TEST COMMANDS

### Frontend Quality Commands
```bash
# Run all quality checks
npm run quality

# Individual quality tools
npm run quality:biome      # Biome linter/formatter
npm run quality:eslint     # ESLint for JS/TS
npm run quality:htmlhint   # HTML validation
npm run quality:markdownlint  # Markdown validation

# Auto-fix issues
npm run fix
npm run fix:biome          # Biome auto-format
npm run fix:eslint         # ESLint auto-fix
```

### Backend Quality Commands
```bash
# PHPStan static analysis (LEVEL 10 - MAXIMUM)
./vendor/bin/phpstan analyse --level=10 --memory-limit=2G

# Run PHPStan on specific module
./vendor/bin/phpstan analyse laravel/Modules/User/ --level=10

# Code formatting (Laravel Pint)
composer pint

# Run tests (Pest)
php artisan test

# Run single test
php artisan test --filter=TestMethodName
php artisan test tests/Feature/UserTest.php

# Module-specific tests
php artisan test --filter=Modules\\User\\Tests\\
```

### Laravel Custom Commands
```bash
# Go script (update + migrate + optimize)
npm run go

# Individual steps
composer update -W
php artisan migrate
php artisan filament:upgrade
php artisan optimize
```

### Filament 5 Migration Commands
```bash
# Install upgrade script
composer require filament/upgrade:"^5.0" -W --dev

# Run automated upgrade
vendor/bin/filament-v5

# Follow script output for specific commands
composer require filament/filament:"^5.0" -W --no-update
composer update

# Remove upgrade script after completion
composer remove filament/upgrade --dev
```

## 📋 CODE STYLE GUIDELINES

### PHP Standards

#### File Headers
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExampleModel.
 *
 * @package Modules\Example\Models
 */
class ExampleModel extends BaseModel
{
    // Implementation
}
```

#### Strict Requirements
- **MUST** have `declare(strict_types=1);` in every PHP file
- **MUST** define return types for all methods
- **MUST** use type hints for parameters
- **MUST** follow PSR-12 coding standards
- **MUST** use short array syntax `[]` instead of `array()`

#### Class Structure
```php
class ExampleClass extends XotBaseClass
{
    /**
     * @return array<string, mixed>
     */
    public function getExampleData(): array
    {
        return [
            'key' => 'value',
        ];
    }

    public function processData(string $input): ?string
    {
        return null;
    }
}
```

### Import/Export Patterns

#### Import Order
1. Laravel framework imports
2. Third-party packages
3. Module imports (sorted alphabetically)
4. Aliases for conflict resolution

```php
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Modules\User\Models\User;
use Modules\Xot\Filament\Resources\XotBaseResource;
use function Safe\glob;
use Webmozart\Assert\Assert;
```

#### Namespace Conventions
- **Models**: `Modules\*\Models` (NOT `Modules\*\app\Models`)
- **Filament**: `Modules\*\Filament\Resources`
- **Controllers**: `Modules\*\Http\Controllers`
- **Services**: `Modules\*\Services`

### Naming Conventions

#### Classes
- **PascalCase**: `TicketResource`, `XotBaseMigration`
- **Suffixes**: Resource, Migration, Action, Trait, Contract
- **Base Classes**: Prefix with `XotBase`

#### Methods
- **camelCase**: `getFormSchema()`, `updateTimestamps()`
- **Verb-first**: `createTicket()`, `updateUser()`
- **Boolean**: `hasPermission()`, `isAdmin()`

#### Variables
- **camelCase**: `$ticketData`, `$userId`
- **Descriptive**: `$userPermissions`, `$ticketStatus`
- **Type-indicating**: `$userArray`, `$isActiveBool`

#### Database Fields
- **snake_case**: `created_at`, `updated_by`
- **Foreign Keys**: `user_id`, `team_id`
- **Timestamps**: Standard Laravel conventions

## 🏛️ ARCHITECTURAL PATTERNS

### CRITICAL: No Services, No Routes/Controllers

#### Business Logic: Use Spatie Queueable Actions
- **NEVER** create Service classes
- **ALWAYS** use Spatie\QueueableAction pattern
- Create Actions using `create-action` skill
- Actions are single-purpose, testable, and queueable
- Actions should extend appropriate base classes from Xot module
- Example structure:
  ```
  Modules/ModuleName/app/Actions/
  ├── CreateUserAction.php
  ├── UpdateTicketStatusAction.php
  └── SendNotificationAction.php
  ```

#### Routing: Use Volt + Folio + Filament
- **NEVER** create route files (routes/*.php) for module functionality
- **NEVER** create Controllers for module functionality
- **ALWAYS** use:
  - **Volt** for single-file Livewire components
  - **Folio** for file-based routing in `resources/views/pages/`
  - **Filament** for admin panel resources and widgets
  - **Laraxot** patterns and base classes
- Only use `routes/` for module registration (route service providers)
- Reference implementation: Study `base_laravelpizza` Cms module

### Module Structure
```
Modules/ModuleName/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── assets/
│   └── views/
├── routes/
├── tests/
├── composer.json
└── module.json
```

### Base Class Extensions

#### Filament Resources
- **ALWAYS** extend `XotBaseResource` from `Modules\Xot\Filament\Resources`
- **NEVER** extend Filament base classes directly
- **USE** `getFormSchema()` instead of `form()`
- **DO NOT** define `table()` method in Resource classes

#### List Pages
- **ALWAYS** extend `XotBaseListRecords`
- **USE** specific methods:
  - `getTableColumns(): array`
  - `getTableFilters(): array`
  - `getTableActions(): array` - MUST return `array<string, Action|ActionGroup>` with string keys
  - `getTableBulkActions(): array` - MUST return `array<string, Action|ActionGroup>` with string keys

#### CRITICAL: Action Methods MUST Return Associative Arrays with String Keys

All Filament action methods **MUST** return `array<string, Action|ActionGroup>`:
- `getHeaderActions(): array<string, Action|ActionGroup>`
- `getTableActions(): array<string, Action|ActionGroup>`
- `getTableBulkActions(): array<string, Action|ActionGroup>`
- `getTableHeaderActions(): array<string, Action|ActionGroup>`

**CORRECT Pattern**:
```php
protected function getHeaderActions(): array
{
    return [
        'delete' => DeleteAction::make(),
        'translate' => Action::make('translate')
            ->label('Translate')
            ->icon('heroicon-o-language'),
    ];
}
```

**WRONG Pattern** (NEVER DO THIS):
```php
// WRONG - indexed array
protected function getHeaderActions(): array
{
    return [
        DeleteAction::make(),
        Action::make('translate'),
    ];
}
```

**Why String Keys Are Required**:
1. **PHPStan Level 10** - Requires strict typing with string keys
2. **Type Safety** - Enables proper static analysis
3. **Testing** - Actions can be targeted by key in tests
4. **Customization** - Keys allow easier action manipulation
5. **Consistency** - Standard pattern across all Filament methods

#### Migrations
- **ALWAYS** extend `XotBaseMigration`
- **NEVER** override `down()` method (it's final)
- **USE** `tableCreate()` and `tableUpdate()` methods
- **USE** `updateTimestamps()` for standard fields

### Error Handling

#### Validation Patterns
```php
use Exception;
use Webmozart\Assert\Assert;

public function execute(array $data): array
{
    try {
        Assert::isArray($data);
        Assert::notEmpty($data, 'Data cannot be empty');
        
        return $this->processData($data);
    } catch (Exception $e) {
        logger()->error('Processing failed', [
            'error' => $e->getMessage(),
            'data' => $data
        ]);
        
        return [];
    }
}
```

#### Null-Safe Operations
```php
$user = auth()->user();
$profile = $user?->profile;
$name = $profile?->name ?? 'Guest';
```

## 🧪 TESTING GUIDELINES

### Testing Framework: Pest PHP

#### Test Structure
```php
<?php

use Tests\TestCase;
use Modules\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

/** @test */
public function it_can_create_user(): void
{
    $user = User::factory()->create();
    
    $this->assertInstanceOf(User::class, $user);
    $this->assertDatabaseHas('users', [
        'id' => $user->id
    ]);
}
```

#### Test Requirements
- **MUST** use Pest PHP testing framework
- **MUST** have `RefreshDatabase` trait for feature tests
- **MUST** target 90%+ code coverage
- **SHOULD** use factories for data creation
- **MUST** pass PHPStan level 10 analysis

### Running Tests
```bash
# All tests
php artisan test

# Specific test file
php artisan test tests/Feature/UserTest.php

# Filter by test method
php artisan test --filter=it_can_create_user

# Coverage report
php artisan test --coverage
```

## 🔧 FILAMENT 5 MIGRATION

### Migration Steps
1. **Study Documentation**: Review all docs/ folders
2. **Backup Current State**: Create branch `filament-4-backup`
3. **Run Upgrade Script**: Use `filament/upgrade` package
4. **Update Dependencies**: Follow script-generated commands
5. **Test Thoroughly**: Run all tests and quality checks
6. **Update Documentation**: Record breaking changes

### Key Changes in Filament 5
- **PHP 8.2+ Required**
- **Livewire v4.0+ Required**
- **Tailwind CSS v4.0+ Required**
- **New Panel Configuration System**
- **Enhanced Type Safety**
- **Improved Performance**

### Critical Areas to Check
- Resource classes and their methods
- Form schema definitions
- Table configurations
- Action definitions
- Panel provider configurations
- Asset compilation

## 📦 COMPOSER MODULE MANAGEMENT

### Merge Plugin Configuration
This project uses `wikimedia/composer-merge-plugin` for modular dependency management.

#### Module composer.json Pattern
```json
{
    "name": "fixcity/module-name",
    "type": "laravel-module",
    "require": {
        "php": "^8.2",
        "laravel/framework": "^12.0"
    },
    "autoload": {
        "psr-4": {
            "Modules\\ModuleName\\": "laravel/Modules/ModuleName/app/"
        }
    },
    "extra": {
        "laravel": {
            "providers": [
                "Modules\\ModuleName\\Providers\\ModuleNameServiceProvider"
            ]
        }
    }
}
```

### Module Creation Commands
```bash
# Create new module
php artisan module:make ModuleName

# Create module with specific components
php artisan module:make Blog --api --web --seed

# Publish module assets
php artisan module:publish ModuleName
```

## 🎯 QUALITY STANDARDS

### PHPStan Configuration
- **Level**: 10 (Maximum)
- **Memory Limit**: 2GB
- **Strict Rules**: Enabled
- **Safe Operations**: Required

### Code Coverage Targets
- **Overall**: 90%+
- **Critical Modules**: 95%+
- **Models**: 100%
- **Controllers**: 90%+

### Performance Metrics
- **Response Time**: <200ms (p95)
- **Memory Usage**: <128MB per request
- **Database Queries**: Minimal N+1 problems
- **Lighthouse Score**: >95

## 📚 IMPORTANT NOTES

### Before Making Changes
1. **Check docs/** folder for existing documentation
2. **Run PHPStan level 10** to understand current state
3. **Read .windsurfrules** for Laraxot framework rules
4. **Review existing patterns** in similar modules
5. **NEVER add Log::info() for routine operations**

### After Making Changes
1. **Run quality checks**: `npm run quality`
2. **Run PHPStan**: `./vendor/bin/phpstan analyse --level=10`
3. **Run tests**: `php artisan test`
4. **Update documentation** if needed
5. **Commit with descriptive messages**
6. **Verify no Log::info() added for routine operations**

### Critical Rules from .windsurfrules
- **NEVER** extend Laravel/Filament base classes directly
- **ALWAYS** use XotBase classes
- **USE** `getFormSchema()` instead of `form()`
- **DO NOT** use `->label()` method (handled by translations)
- **FOLLOW** namespace conventions strictly
- **NEVER** use `Log::info()` for routine operations (login, logout, profile update, notifications)

### 🚨 LOGGING PERFORMANCE RULES (CRITICAL)

**FORBIDDEN** - These cause 10-30% performance degradation:
```php
// ❌ NEVER log these routine operations
Log::info('User logged in');
Log::info('User logged out');
Log::info('Profile updated');
Log::info('Registration attempt');
Log::info('Notification sent');
Log::info('Activity logged');
```

**ALLOWED** - Only significant business events:
```php
// ✅ Log these important events
Log::info('User account created', ['user_id' => $user->id, 'email' => $user->email]);
Log::info('Payment processed', ['order_id' => $order->id, 'amount' => $order->amount]);
```

**Log Level Usage**:
- **DEBUG**: Development only (`if (config('app.debug'))`)
- **INFO**: Significant business events only
- **WARNING**: Potential issues (slow API, rate limit)
- **ERROR**: Runtime errors (always with context)
- **CRITICAL**: System down (database lost, security breach)

**Performance Impact**:
- Before (excessive logging): 20-30% overhead
- After (optimized logging): 5-10% overhead
- Log volume: 500MB/day → 50MB/day (90% reduction)

**See**: `laravel/Modules/Xot/docs/LOGGING_BEST_PRACTICES_2026-03-02.md`

## 🚨 BREAKING CHANGES FOR FILAMENT 5

### Deprecated Methods
- `form()` → `getFormSchema()`
- `table()` → Remove from Resource classes
- `label()` → Remove (handled by translations)

### New Requirements
- PHP 8.2+ strict typing mandatory
- Livewire v4.0+ migration required
- Tailwind CSS v4.0+ asset compilation
- Enhanced type safety throughout

### Migration Checklist
- [ ] Backup current codebase
- [ ] Review all Filament resources
- [ ] Update form schema methods
- [ ] Remove table() methods from resources
- [ ] Test all admin panels
- [ ] Verify asset compilation
- [ ] Update documentation

---

## 🔍 PHPSTAN LEVEL 10 COMPLIANCE GUIDE

### Critical Error Patterns and Prevention

Based on the comprehensive PHPStan analysis of 2026-03-02, these are the most common errors and how to prevent them.

#### 1. Interface Completeness (HIGHEST PRIORITY)

**Problem**: 39+ errors caused by accessing undefined properties/methods on `UserContract`

**Rule**: **ALWAYS** define ALL properties and methods in interfaces that will be accessed

**Correct Interface Definition**:
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Contracts;

/**
 * User Contract Interface
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $type
 * @property bool $exists
 * @mixin \Illuminate\Auth\Authenticatable
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Models\User query()
 * @method bool save(array $options = [])
 * @method bool update(array $attributes = [], array $options = [])
 * @method mixed getKey()
 */
interface UserContract extends
    \Illuminate\Contracts\Auth\Authenticatable,
    \Illuminate\Contracts\Auth\Access\Authorizable,
    \Illuminate\Contracts\Auth\CanResetPassword
{
    // All method signatures must be declared
    public function getAuthIdentifier(): mixed;
    public function getAuthPassword(): string;
    public function getRememberToken(): ?string;
    public function setRememberToken(string $value): void;
    public function getRememberTokenName(): string;
}
```

**Usage**:
```php
// ✅ CORRECT - All properties/methods defined in interface
public function handle(UserContract $user): void
{
    $user->email = 'new@example.com';
    $user->save();
}

// ❌ WRONG - Property/method not in interface causes PHPStan error
public function handle(UserContract $user): void
{
    $user->undefinedProperty = 'value';  // ERROR!
    $user->undefinedMethod();  // ERROR!
}
```

#### 2. Factory Classes (CRITICAL)

**Problem**: 12+ errors caused by missing factory classes

**Rule**: **EVERY** model MUST have a corresponding factory class

**Correct Factory Creation**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Example\Models\Example;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Example>
 */
class ExampleFactory extends Factory
{
    protected $model = Example::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }

    /**
     * Indicate that the example is active.
     *
     * @return static
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }
}
```

**Model with Factory**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Models;

use Modules\Example\Database\Factories\ExampleFactory;
use Modules\Xot\Models\XotBaseModel;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $status
 * @property-read \Modules\Example\Models\ExampleFactory $factory
 * @method static \Modules\Example\Database\Factories\ExampleFactory factory()
 */
class Example extends XotBaseModel
{
    protected $fillable = ['name', 'email', 'status'];

    /**
     * @return \Modules\Example\Database\Factories\ExampleFactory
     */
    protected static function newFactory(): \Modules\Example\Database\Factories\ExampleFactory
    {
        return \Modules\Example\Database\Factories\ExampleFactory::new();
    }
}
```

#### 3. Mixed Type Safety (IMPORTANT)

**Problem**: 21+ errors caused by working with `mixed` types

**Rule**: **NEVER** work with `mixed` types without type assertions

**Correct Array Access**:
```php
// ❌ WRONG - Array access on mixed
public function process(array $data): void
{
    $title = $data['title'];  // ERROR!
}

// ✅ CORRECT - Type assertion before access
public function process(array $data): void
{
    $title = isset($data['title']) && is_string($data['title'])
        ? $data['title']
        : throw new \InvalidArgumentException('Missing title');
}
```

**Correct Anonymous Functions**:
```php
// ❌ WRONG - No return type
$closure = fn () => $this->create();

// ✅ CORRECT - Explicit return type
$closure = static fn (): Example => Example::factory()->create();
```

**Correct Data Transfer Objects**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Datas;

use Spatie\LaravelData\Data;

/**
 * @property string $title
 * @property string $description
 */
class ExampleData extends Data
{
    public function __construct(
        public string $title,
        public string $description,
    ) {}
}

// Usage
$data = ExampleData::fromArray($array);
$title = $data->title;  // Type-safe!
```

#### 4. Relationship Type Annotations (CRITICAL)

**Problem**: Type errors in relationship definitions

**Rule**: **ALWAYS** specify generic type parameters for relationships

**Correct Relationships**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\User\Models\User;

class Example extends XotBaseModel
{
    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany<\Modules\Example\Models\Comment, $this>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(\Modules\Example\Models\Comment::class);
    }

    /**
     * @return BelongsToMany<\Modules\Example\Models\Tag, $this>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(\Modules\Example\Models\Tag::class);
    }
}
```

#### 5. Static Methods vs Instance Methods

**Problem**: Missing static methods causing errors

**Rule**: **PREFER** instance methods over static methods for model operations

**Correct Pattern**:
```php
// ❌ WRONG - Static method hard to test and type
public static function getBlocksBySlug(string $slug): array
{
    return self::where('slug', $slug)->first()->blocks ?? [];
}

// ✅ CORRECT - Instance method or query scope
public function scopeBySlug(Builder $query, string $slug): Builder
{
    return $query->where('slug', $slug);
}

// Usage
$page = Page::bySlug('example')->first();
$blocks = $page->blocks;
```

#### 6. Property Type Annotations (REQUIRED)

**Problem**: Missing property types causing errors

**Rule**: **ALWAYS** declare property types with PHPDoc

**Correct Property Declaration**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\View\Components;

use Illuminate\View\Component;
use Modules\Example\Models\Example;

class ExampleComponent extends Component
{
    /** @var array<int, Example> */
    public array $examples = [];

    /** @var string|null */
    public ?string $title = null;

    /** @var bool */
    public bool $isActive = false;

    public function mount(): void
    {
        $this->examples = Example::all()->all();
    }

    public function render(): \Illuminate\View\View
    {
        return view('example::component');
    }
}
```

### PHPStan Error Resolution Checklist

Before committing code, ensure:

- [ ] All interfaces have complete property and method declarations
- [ ] All models have corresponding factory classes
- [ ] All array access has type assertions
- [ ] All anonymous functions have explicit return types
- [ ] All relationships have proper generic type parameters
- [ ] All properties have type annotations
- [ ] No mixed types without type guards
- [ ] All static methods are defined or converted to instance methods
- [ ] PHPStan level 10 passes with zero errors

### Common PHPStan Error Messages and Solutions

#### `Access to an undefined property`
**Solution**: Add property to interface with `@property` tag

#### `Call to an undefined method`
**Solution**: Add method to interface with `@method` tag or implement in class

#### `Parameter #1 expects X, mixed given`
**Solution**: Add type assertion before using the value

#### `Anonymous function should return X but returns mixed`
**Solution**: Add explicit return type to anonymous function

#### `Unable to resolve the template type`
**Solution**: Add generic type parameters to relationships

#### `Class not found`
**Solution**: Create the missing class or fix the namespace

#### `offsetAccess.nonOffsetAccessible`
**Solution**: Add type assertion before array access

### PHPStan Best Practices

1. **Run PHPStan frequently**: After every significant code change
2. **Fix errors immediately**: Don't let errors accumulate
3. **Use type assertions**: Before accessing array elements or mixed values
4. **Create DTOs**: For complex data structures instead of arrays
5. **Document interfaces**: Include all properties and methods in PHPDoc
6. **Test types**: Add type-specific tests for critical code paths

---

## 📖 DOCUMENTATION STANDARDS

### PHPDoc Requirements

**ALL** classes, methods, and properties MUST have PHPDoc annotations:

```php
<?php

declare(strict_types=1);

namespace Modules\Example\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Models\User;

/**
 * Example Model
 *
 * Represents an example entity in the system.
 *
 * @property int $id The unique identifier
 * @property string $name The example name
 * @property string $email The example email
 * @property string $status The current status
 * @property \Illuminate\Support\Carbon|null $created_at Creation timestamp
 * @property \Illuminate\Support\Carbon|null $updated_at Last update timestamp
 * @property-read User|null $user Associated user
 * @method static \Modules\Example\Database\Factories\ExampleFactory factory()
 */
class Example extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
    ];

    /**
     * Get the user associated with this example.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mark the example as active.
     *
     * @return bool
     */
    public function markAsActive(): bool
    {
        $this->status = 'active';
        return $this->save();
    }
}
```

### Documentation Updates

When creating or modifying features:

1. **Update module README**: Describe the feature and usage
2. **Create/update roadmap**: Track progress and future work
3. **Document error fixes**: Record how PHPStan errors were resolved
4. **Update AGENTS.md**: Add new patterns and best practices
5. **Create examples**: Show correct usage patterns

---

**Last Updated**: 2026-03-02  
**Filament Version**: 4.x → 5.x Migration Target  
**PHPStan Level**: 10 (Maximum)  
**Test Coverage**: 90%+ Target  
**PHPStan Errors**: 138 (down from 155+, 11% reduction)  
**Logging Performance**: CRITICAL - NEVER use Log::info() for routine operations