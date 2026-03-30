# 📄 Folio + Volt Philosophy - Test Pages

**Version**: 1.0  
**Created**: 2026-03-30  
**Status**: ✅ Active  
**Owner**: Multi-Agent Team (Winston + Amelia)

---

## 🎯 Golden Rule

> **Le pagine `tests/*` usano Laravel Folio + Livewire Volt con pattern `[slug].blade.php` per routing dinamico.**

**File Chiave**:
```
laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php
```

**Routing**:
- `http://fixcity.local/it/tests/argomenti` → `[slug].blade.php` con `slug = "argomenti"`
- `http://fixcity.local/it/tests/homepage` → `[slug].blade.php` con `slug = "homepage"`
- `http://fixcity.local/it/tests/` → `index.blade.php` (pagina statica)

---

## 📐 Architecture Pattern

### Dynamic Route File: `[slug].blade.php`

```php
<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $slug = '';
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(string $slug): void
    {
        $this->slug = $slug;
        $this->pageSlug = 'tests.'.$slug;
        $this->data = [
            'slug' => $slug
        ];
    }
};
?>

<x-layouts.app>
    @volt('tests.view')
    <div>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
```

### Static Route File: `index.blade.php`

```php
<?php

declare(strict_types=1);

use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
use Modules\Cms\Http\Middleware\PageSlugMiddleware;

name('tests.view');
middleware(PageSlugMiddleware::class);

new class extends Component {
    public string $pageSlug = '';

    /** @var array<string, mixed> */
    public array $data = [];

    public function mount(): void
    {
        $this->pageSlug = 'tests.index';
        $this->data = [];
    }
};
?>

<x-layouts.app>
    @volt('tests.index')
    <div>
        <x-page side="content" :slug="$pageSlug" :data="$data" />
    </div>
    @endvolt
</x-layouts.app>
```

---

## 🧱 Data Flow

```
1. HTTP Request
   ↓
   http://fixcity.local/it/tests/argomenti
   
2. Laravel Folio Routing
   ↓
   routes/pages/tests/[slug].blade.php
   slug = "argomenti"
   
3. Volt Component Mount
   ↓
   mount(string $slug)
   - $this->slug = "argomenti"
   - $this->pageSlug = "tests.argomenti"
   - $this->data = ['slug' => 'argomenti']
   
4. PageSlugMiddleware
   ↓
   - Load JSON content from CMS
   - Validate page exists
   - Inject content into $data
   
5. Blade Rendering
   ↓
   <x-page side="content" :slug="$pageSlug" :data="$data" />
   - Loads block views
   - Renders content blocks
   - Returns HTML
   
6. Response
   ↓
   Full HTML page to browser
```

---

## 🎨 Why This Pattern?

### 1. **DRY (Don't Repeat Yourself)**

**BEFORE (WRONG)**:
```
pages/tests/argomenti.blade.php
pages/tests/homepage.blade.php
pages/tests/servizi.blade.php
pages/tests/eventi.blade.php
... (38 files identical except slug name)
```

**AFTER (CORRECT)**:
```
pages/tests/[slug].blade.php  // 1 file only!
```

**Code Reduction**: 38 files → 1 file (97% reduction)

### 2. **KISS (Keep It Simple, Stupid)**

- Single entry point per test page
- No complex routing configuration
- Folio handles file-based routing automatically
- Volt provides reactive Livewire components

### 3. **SOLID Principles**

**Single Responsibility**:
- `[slug].blade.php` → Routing only
- `PageSlugMiddleware` → Content loading only
- `<x-page>` → Rendering only
- Block views → Individual components only

**Open/Closed**:
- Open for extension (add new test pages)
- Closed for modification (no changes to `[slug].blade.php`)

**Liskov Substitution**:
- All test pages behave identically
- Same interface, different content

**Interface Segregation**:
- Small, focused components
- No bloated controllers

**Dependency Inversion**:
- Depend on abstractions (Middleware interface)
- Not on concrete implementations

---

## 📁 File Structure

```
laravel/Themes/Sixteen/resources/views/pages/
├── tests/
│   ├── [slug].blade.php          # Dynamic route (38 pages)
│   └── index.blade.php           # Static index page
└── [other-namespaces]/
    ├── [slug].blade.php
    └── index.blade.php
```

---

## 🔧 Middleware: PageSlugMiddleware

**Path**: `Modules/Cms/Http/Middleware/PageSlugMiddleware.php`

**Responsibilities**:
1. Extract `pageSlug` from request
2. Load JSON content from `laravel/config/local/fixcity/database/content/pages/`
3. Validate page exists
4. Inject content into shared data
5. Handle 404 for missing pages

**Example**:
```php
public function handle(Request $request, Closure $next): Response
{
    // Get pageSlug from Volt component
    $pageSlug = $request->get('pageSlug'); // e.g., "tests.argomenti"
    
    // Load JSON content
    $jsonFile = config_path("local/fixcity/database/content/pages/{$pageSlug}.json");
    
    if (!file_exists($jsonFile)) {
        abort(404, "Page [{$pageSlug}] not found");
    }
    
    // Parse JSON
    $content = json_decode(file_get_contents($jsonFile), true);
    
    // Share with view
    View::share('pageContent', $content);
    
    return $next($request);
}
```

---

## 📊 Block Rendering Flow

```
<x-page side="content" :slug="$pageSlug" :data="$data" />
    ↓
Page Component (blade)
    ↓
Loop through content_blocks
    ↓
For each block:
    @include($block->view, $block->data)
    ↓
Block View (e.g., blocks/hero/center.blade.php)
    ↓
HTML Output
```

---

## ✅ Naming Conventions

### Page Slug Pattern

**Format**: `{namespace}.{page_name}`

**Examples**:
- `tests.argomenti`
- `tests.homepage`
- `tests.servizi`
- `cms.about`
- `cms.contact`

### JSON Content File

**Pattern**: `{namespace}/{page_name}.json`

**Path**: `laravel/config/local/fixcity/database/content/pages/`

**Example**:
```
tests.argomenti.json
```

### Volt Component Name

**Pattern**: `{namespace}.{action}`

**Examples**:
- `tests.view` (generic view)
- `tests.index` (index page)
- `cms.view` (CMS generic)
- `cms.show` (CMS detail)

---

## 🚀 Creating New Test Pages

### Step 1: Create JSON Content

**File**: `laravel/config/local/fixcity/database/content/pages/tests.my-page.json`

```json
{
  "id": "tests.my-page",
  "title": {
    "it": "La Mia Pagina",
    "en": "My Page"
  },
  "slug": "tests.my-page",
  "content_blocks": {
    "it": [
      {
        "type": "hero/center",
        "data": {
          "view": "pub_theme::components.blocks.hero.center",
          "title": "Benvenuto"
        }
      }
    ]
  }
}
```

### Step 2: Access Page

**URL**: `http://fixcity.local/it/tests/my-page`

**Routing**:
- Folio → `[slug].blade.php`
- `slug = "my-page"`
- `pageSlug = "tests.my-page"`
- JSON loaded automatically

**No additional files needed!**

---

## 🎯 Philosophy Summary

### The Zen of Folio + Volt

1. **File-based routing** → No routes/*.php files
2. **Single dynamic file** → [slug].blade.php handles all pages
3. **Middleware for logic** → Keep views thin
4. **Volt for reactivity** → Livewire without complexity
5. **JSON for content** → Separate content from code
6. **Blocks for rendering** → Composable components

### Why This Matters

**Before**:
- 38 identical blade files
- Copy-paste errors
- Hard to maintain
- Violates DRY

**After**:
- 1 dynamic blade file
- Zero duplication
- Easy to maintain
- Follows DRY + KISS

---

## 📚 Related Documentation

- [Block View Naming Convention](./BLOCK_VIEW_NAMING_CONVENTION.md)
- [Universal Block Types Taxonomy](./UNIVERSAL_BLOCK_TYPES_TAXONOMY.md)
- [Multi-Block JSON Pattern](./json-multi-block-governance.md)
- [Zen of Documentation](../../../../docs/ZEN_OF_DOCUMENTATION.md)

---

## 🔍 Troubleshooting

### Error: "Unable to locate view"

**Cause**: Block view file doesn't exist

**Fix**:
```bash
# Check if view exists
ls -la laravel/Themes/Sixteen/resources/views/components/blocks/hero/center.blade.php

# Create if missing
# See: GSD Phase 06
```

### Error: "Page not found"

**Cause**: JSON content file missing

**Fix**:
```bash
# Check if JSON exists
ls -la laravel/config/local/fixcity/database/content/pages/tests.my-page.json

# Create JSON file
```

### Error: "Class not found"

**Cause**: Missing use statements or wrong namespace

**Fix**:
```php
// Add missing imports
use function Laravel\Folio\middleware;
use function Laravel\Folio\name;
use Livewire\Volt\Component;
```

---

**Last Updated**: 2026-03-30  
**Next Review**: After new test page creation  
**Owner**: Multi-Agent Team
