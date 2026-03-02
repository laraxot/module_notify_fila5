# SushiToJson/SushiToJsons PHPStan Level 10 Fixes

## Problem Overview
PHPStan Level 10 cannot discover methods defined in traits when they are called from within the trait itself or from model callbacks.

## Root Cause
PHPStan analyzes static code patterns but cannot dynamically resolve trait method calls that happen:
1. Within the trait itself (SushiToJson calling its own methods)
2. In trait boot callbacks (creating, updating, deleting)
3. In model methods that use trait methods

## Solution: @method Annotations

### For Models Using SushiToJsons Trait
Add @method annotations to model PHPDoc:

```php
/**
 * @method string getJsonFile() Get JSON file path
 * @method array getSushiRows() Get rows from JSON
 */
class Page extends BaseModel
{
    use SushiToJsons;
}
```

### For Models Using SushiToJson Trait
Add @method annotations for all trait methods:

```php
/**
 * @method string getJsonFile() Get JSON file path
 * @method array loadExistingData() Load existing data
 * @method string authId() Get authenticated user ID
 * @method void ensureDirectoryExists() Ensure directory exists
 * @method void saveToJson() Save data to JSON
 * @method int findRowIndexById(int $id) Find row index by ID
 */
class InformationSchemaTable extends BaseModel
{
    use SushiToJson;
}
```

### For Static Methods from HasBlocks Trait
Add @method annotations for static methods:

```php
/**
 * @method static array getMiddlewareBySlug(string $slug) Get middleware by slug
 * @method static array getBlocksBySlug(string $slug, ?string $side = null) Get blocks by slug
 */
class Page extends BaseModel
{
    use HasBlocks;
    use SushiToJsons;
}
```

## Implementation

### Fixed Models
- ✅ Modules/Cms/app/Models/Page.php
- ✅ Modules/Cms/app/Models/Section.php
- ✅ Modules/Cms/app/Models/Attachment.php
- ✅ Modules/Cms/app/Models/Menu.php
- ✅ Modules/Cms/app/Models/PageContent.php
- ✅ Modules/Xot/app/Models/InformationSchemaTable.php
- ✅ Modules/Geo/app/Models/Comune.php

### Fixed Traits
- ✅ Modules/Tenant/app/Models/Traits/SushiToJson.php - Added comprehensive PHPDoc
- ✅ Modules/Tenant/app/Models/Traits/SushiToJsons.php - Added comprehensive PHPDoc

### Fixed Actions
- ✅ Modules/Xot/app/Filament/Actions/Header/ExportPdfAction.php - Fixed parameter count

## Results
- Before: 140 errors
- After: 136 errors (-4 errors fixed)
- Target: 0 errors

## Best Practices
1. Always add @method annotations when using traits with public methods
2. Include complete method signatures with parameter types and return types
3. Document what each method does in the annotation
4. Use proper type hints for all parameters and return types
5. Follow PHPStan Level 10 strict typing requirements