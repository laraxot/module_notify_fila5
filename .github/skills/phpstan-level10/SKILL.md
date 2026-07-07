# PHPStan Level 10 Compliance Skill

## Overview

This skill provides comprehensive guidance for achieving PHPStan Level 10 compliance in the FixCity Laravel application. Based on the analysis of 155+ errors identified on 2026-03-02, this skill documents proven patterns, common pitfalls, and best practices for maximum type safety.

## Error Patterns and Solutions

### 1. Interface Completeness (47% of Errors)

**Problem**: Accessing undefined properties/methods on interfaces

**Pattern**: Define ALL properties and methods in interfaces with complete PHPDoc

**Example**:
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
 * @property bool $wasRecentlyCreated
 * @mixin \Illuminate\Auth\Authenticatable
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Modules\User\Models\User newModelQuery()
 * @method bool save(array $options = [])
 * @method bool update(array $attributes = [], array $options = [])
 * @method mixed getKey()
 * @method string getKeyName()
 * @method string getTable()
 * @method bool delete()
 * @method bool usesTimestamps()
 */
interface UserContract extends
    \Illuminate\Contracts\Auth\Authenticatable,
    \Illuminate\Contracts\Auth\Access\Authorizable,
    \Illuminate\Contracts\Auth\CanResetPassword
{
    public function getAuthIdentifier(): mixed;
    public function getAuthPassword(): string;
    public function getRememberToken(): ?string;
    public function setRememberToken(string $value): void;
    public function getRememberTokenName(): string;
}
```

**When to Use**:
- Creating new interfaces
- Updating existing interfaces with new properties/methods
- Documenting dynamic properties and methods

**Anti-Patterns**:
❌ Omitting property declarations that will be accessed
❌ Missing method signatures in interfaces
❌ Forgetting @mixin for Eloquent dynamic methods

### 2. Factory Classes (12+ Errors)

**Problem**: Missing factory classes for models

**Pattern**: Every model must have a corresponding factory with proper types

**Example**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Example\Models\Example;
use Modules\User\Models\User;

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
            'user_id' => User::factory(),
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

    /**
     * Indicate that the example is inactive.
     *
     * @return static
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }
}
```

**Model Implementation**:
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
 * @property int $user_id
 * @property-read \Modules\User\Models\User $user
 * @method static \Modules\Example\Database\Factories\ExampleFactory factory()
 */
class Example extends XotBaseModel
{
    protected $fillable = ['name', 'email', 'status', 'user_id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\Modules\User\Models\User, $this>
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Modules\User\Models\User::class);
    }

    /**
     * @return \Modules\Example\Database\Factories\ExampleFactory
     */
    protected static function newFactory(): \Modules\Example\Database\Factories\ExampleFactory
    {
        return \Modules\Example\Database\Factories\ExampleFactory::new();
    }
}
```

**When to Use**:
- Creating new models
- Adding factories to existing models
- Using factories in tests

**Anti-Patterns**:
❌ Creating models without factories
❌ Using array() instead of []
❌ Missing return type annotations

### 3. Mixed Type Safety (21+ Errors)

**Regola critica**: Il tipo `mixed` va usato **SOLO come ultima spiaggia**. Preferire: union types, generics, interfacce. Usare mixed solo quando non esiste alternativa (es. API esterne senza tipo garantito). Vedi [docs/mixed-type-ultima-spiaggia.md](../../docs/mixed-type-ultima-spiaggia.md).

**Problem**: Working with mixed types without type assertions

**Pattern**: Always narrow types before operations

**Array Access**:
```php
// ❌ WRONG
public function process(array $data): void
{
    $title = $data['title'];  // ERROR: offsetAccess.nonOffsetAccessible
}

// ✅ CORRECT
public function process(array $data): void
{
    $title = isset($data['title']) && is_string($data['title'])
        ? $data['title']
        : throw new \InvalidArgumentException('Missing title');
}
```

**Anonymous Functions**:
```php
// ❌ WRONG
$creators = [
    'open' => fn () => Ticket::factory()->open()->create(),
];

// ✅ CORRECT
$creators = [
    'open' => static fn (): Ticket => Ticket::factory()->open()->create(),
];
```

**Data Transfer Objects**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Datas;

use Spatie\LaravelData\Data;

/**
 * @property string $title
 * @property string $description
 * @property string $status
 */
class ExampleData extends Data
{
    public function __construct(
        public string $title,
        public string $description,
        public string $status,
    ) {}

    /**
     * Create from array with validation.
     *
     * @param array<string, mixed> $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            title: $data['title'] ?? throw new \InvalidArgumentException('Missing title'),
            description: $data['description'] ?? '',
            status: $data['status'] ?? 'draft',
        );
    }
}

// Usage
$data = ExampleData::fromArray($array);
$title = $data->title;  // Type-safe!
```

**When to Use**:
- Accessing array elements
- Creating anonymous functions
- Working with external data
- Processing form input

**Anti-Patterns**:
❌ Array access without type checking
❌ Anonymous functions without return types
❌ Using arrays instead of DTOs for complex data

### 4. Relationship Type Annotations

**Problem**: Missing generic type parameters in relationships

**Pattern**: Always specify generic type parameters

**Example**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\User\Models\User;
use Modules\Tag\Models\Tag;

class Example extends XotBaseModel
{
    /**
     * Get the user that owns the example.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the example.
     *
     * @return HasMany<Comment, $this>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the tags for the example.
     *
     * @return BelongsToMany<Tag, $this>
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the parent example.
     *
     * @return BelongsTo<Example, $this>
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Example::class, 'parent_id');
    }

    /**
     * Get the children examples.
     *
     * @return HasMany<Example, $this>
     */
    public function children(): HasMany
    {
        return $this->hasMany(Example::class, 'parent_id');
    }
}
```

**When to Use**:
- Defining any relationship method
- Documenting model relationships
- Ensuring type-safe relationship access

**Anti-Patterns**:
❌ Omitting generic type parameters
❌ Using relative class names
❌ Missing return type annotations

### 5. Property Type Annotations

**Problem**: Missing property type declarations

**Pattern**: Always declare property types with PHPDoc

**Example**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\View\Components;

use Illuminate\View\Component;
use Modules\Example\Models\Example;

class ExampleList extends Component
{
    /** @var array<int, Example> */
    public array $examples = [];

    /** @var string|null */
    public ?string $title = null;

    /** @var bool */
    public bool $showPagination = false;

    /** @var int */
    public int $perPage = 10;

    /**
     * Create a new component instance.
     *
     * @param array<int, Example> $examples
     * @param string|null $title
     * @param bool $showPagination
     * @param int $perPage
     */
    public function __construct(
        array $examples = [],
        ?string $title = null,
        bool $showPagination = false,
        int $perPage = 10
    ) {
        $this->examples = $examples;
        $this->title = $title;
        $this->showPagination = $showPagination;
        $this->perPage = $perPage;
    }

    public function render(): \Illuminate\View\View
    {
        return view('example::components.example-list');
    }
}
```

**When to Use**:
- Creating view components
- Defining Livewire component properties
- Any class with public properties

**Anti-Patterns**:
❌ Public properties without type annotations
❌ Using @var instead of inline PHPDoc
❌ Missing type annotations in constructors

### 6. Static Methods vs Instance Methods

**Problem**: Missing static methods causing errors

**Pattern**: Prefer instance methods or query scopes

**Static Method (Use Sparingly)**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Models;

class Example extends XotBaseModel
{
    /**
     * Get active examples.
     *
     * @return array<int, self>
     */
    public static function getActive(): array
    {
        return self::where('status', 'active')
            ->get()
            ->all();
    }
}
```

**Query Scope (Preferred)**:
```php
<?php

declare(strict_types=1);

namespace Modules\Example\Models;

use Illuminate\Database\Eloquent\Builder;

class Example extends XotBaseModel
{
    /**
     * Scope a query to only include active examples.
     *
     * @param Builder<self> $query
     * @return Builder<self>
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }
}

// Usage
$examples = Example::active()->get();
```

**When to Use**:
- Use static methods for factory-like operations
- Use query scopes for database queries
- Use instance methods for object behavior

**Anti-Patterns**:
❌ Static methods for database queries (use scopes)
❌ Static methods that depend on instance state
❌ Missing type annotations on scope parameters

## PHPStan Error Resolution Checklist

Before committing code, verify:

- [ ] All interfaces have complete property and method declarations
- [ ] All models have corresponding factory classes
- [ ] All array access has type assertions
- [ ] All anonymous functions have explicit return types
- [ ] All relationships have proper generic type parameters
- [ ] All properties have type annotations
- [ ] No mixed types without type guards
- [ ] All static methods are defined or converted to instance methods
- [ ] PHPStan level 10 passes with zero errors

## Common Error Messages

### `Access to an undefined property`
**Cause**: Property not defined in interface or class
**Solution**: Add `@property` tag to PHPDoc

### `Call to an undefined method`
**Cause**: Method not defined in interface or class
**Solution**: Add `@method` tag to PHPDoc or implement in class

### `Parameter #1 expects X, mixed given`
**Cause**: Type mismatch in function call
**Solution**: Add type assertion before using the value

### `Anonymous function should return X but returns mixed`
**Cause**: Missing return type in anonymous function
**Solution**: Add explicit return type: `static fn (): Type => ...`

### `Unable to resolve the template type`
**Cause**: Missing generic type parameters
**Solution**: Add type parameters: `BelongsTo<RelatedModel, $this>`

### `Class not found`
**Cause**: Missing class or incorrect namespace
**Solution**: Create the class or fix the namespace

### `offsetAccess.nonOffsetAccessible`
**Cause**: Array access on mixed type
**Solution**: Add type assertion before array access

## Best Practices

### 1. Run PHPStan Frequently
```bash
# After every significant change
cd laravel && ./vendor/bin/phpstan analyse Modules/Example --level=10

# Full analysis
cd laravel && ./vendor/bin/phpstan analyse Modules --level=10 --memory-limit=2G
```

### 2. Fix Errors Immediately
Don't let errors accumulate. Each error becomes harder to fix later.

### 3. Use Type Assertions
Before accessing array elements or mixed values:
```php
$value = is_string($data['key']) ? $data['key'] : throw new \InvalidArgumentException('Invalid value');
```

### 4. Create DTOs
For complex data structures instead of arrays:
```php
use Modules\Example\Datas\ExampleData;
$data = ExampleData::fromArray($array);
```

### 5. Document Interfaces
Include all properties and methods in PHPDoc with complete type information.

### 6. Test Types
Add type-specific tests for critical code paths:
```php
test('factory creates properly typed instance', function () {
    $example = Example::factory()->create();
    expect($example)->toBeInstanceOf(Example::class);
});
```

## Resources

- [PHPStan Documentation](https://phpstan.org/user-guide/getting-started)
- [PHPStan Level 10 Rules](https://phpstan.org/rule-levels)
- [Laravel Type Safety](https://laravel.com/docs/12.x/eloquent#casting)
- [Spatie Laravel Data](https://spatie.be/docs/laravel-data)

## Related Skills

- `laravel-tdd` - Test-driven development with Pest
- `create-model` - Creating models with proper types
- `create-migration` - Database migrations with type safety
- `phpstan-fix` - Running PHPStan and fixing errors

## Version History

- **2026-03-02**: Initial version based on analysis of 155+ errors
- Patterns documented: Interface completeness, Factory classes, Mixed type safety, Relationship types, Property annotations
- Anti-patterns identified and documented
- Best practices established