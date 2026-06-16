# Documentation Reorganization Architecture

**Version**: 1.0.0  
**Created**: 2026-03-30  
**Status**: Draft

## Overview

Architettura per riorganizzare la documentazione del progetto FixCity seguendo i principi DRY (Don't Repeat Yourself) e KISS (Keep It Simple, Stupid).

## Project Configuration

### Theme Detection Algorithm

```php
// 1. Read APP_URL from .env
$appUrl = env('APP_URL', 'http://fixcity.local');
// Result: "http://fixcity.local"

// 2. Remove protocol
$domain = str_replace(['http://', 'https://', 'www.'], '', $appUrl);
// Result: "fixcity.local"

// 3. Explode and reverse
$parts = array_reverse(explode('.', $domain));
// Result: ["local", "fixcity"]

// 4. Join with "/"
$configPath = implode('/', $parts);
// Result: "local/fixcity"

// 5. Read config
$config = include base_path("config/{$configPath}/xra.php");
$theme = $config['pub_theme'];
// Result: "Sixteen"
```

### Current Configuration

| Setting | Value | Source |
|---------|-------|--------|
| **APP_URL** | `http://fixcity.local` | `laravel/.env` |
| **Domain** | `fixcity.local` | Derived |
| **Config Path** | `config/local/fixcity/xra.php` | Derived |
| **pub_theme** | `Sixteen` | Config file |
| **Document Root** | `public_html` | Project structure |
| **Theme Path** | `laravel/Themes/Sixteen/` | Derived |

## Documentation Structure

### Current State (PROBLEM)

```
base_fixcity_fila5/
├── docs/                          # ✅ Root docs
│   ├── openviking-integration.md
│   ├── bmad-gsd-ralph-integration.md
│   ├── unified-ai-workflow.md
│   └── README.md
├── .planning/                     # ⚠️ GSD planning docs
│   ├── PROJECT.md
│   └── phases/
├── _bmad/                         # ⚠️ BMAD docs
│   └── bmm/
├── laravel/Modules/               # ⚠️ Module docs (MANY duplicates)
│   ├── AI/docs/                   # 10+ files
│   ├── Activity/docs/             # 50+ files
│   ├── Blog/docs/                 # 20+ files
│   └── .../docs/
├── laravel/Themes/                # ⚠️ Theme docs
│   ├── Sixteen/docs/              # ✅ Active theme
│   │   ├── 00-INDEX.md
│   │   └── ...
│   └── TwentyOne/docs/            # ❌ Inactive theme (remove refs)
│       └── ...
└── bashscripts/docs/              # ✅ Script docs
```

### Target State (SOLUTION)

```
base_fixcity_fila5/
├── docs/                          # 📚 MASTER DOCUMENTATION
│   ├── README.md                  # Master index
│   ├── project/                   # Project-wide docs
│   │   ├── configuration.md       # Theme, document_root, etc.
│   │   ├── ai-workflow/           # BMAD, GSD, Ralph, OpenViking
│   │   └── conventions/           # Coding standards
│   ├── modules/                   # → Links to module docs
│   │   └── index.md               # Module docs index
│   └── themes/                    # → Links to theme docs
│       └── index.md               # Theme docs index
│
├── laravel/Modules/*/docs/        # 📦 MODULE-SPECIFIC DOCS
│   └── README.md                  # Module index (DRY links)
│
├── laravel/Themes/Sixteen/docs/   # 🎨 ACTIVE THEME DOCS
│   └── README.md                  # Theme index (updated from TwentyOne)
│
├── .planning/                     # 📋 GSD WORKSPACE (ephemeral)
│   └── (auto-generated)
│
├── _bmad/                         # 📝 BMAD WORKSPACE (ephemeral)
│   └── (auto-generated)
│
└── bashscripts/docs/              # 🔧 SCRIPT DOCS
    └── README.md                  # Script index
```

## DRY + KISS Principles

### DRY (Don't Repeat Yourself)

**RULE**: Every piece of knowledge must have a single, unambiguous, authoritative representation.

**Implementation**:
1. **Module docs** → Only in `laravel/Modules/*/docs/`
2. **Theme docs** → Only in `laravel/Themes/Sixteen/docs/`
3. **Project docs** → Only in `docs/`
4. **Cross-references** → Use links, not copies

**Example**:
```markdown
<!-- WRONG: Duplicating content -->
# PHPStan Guide
[full PHPStan guide content...]

<!-- CORRECT: Link to source -->
# PHPStan Guide
See [Module PHPStan Guide](../laravel/Modules/Xot/docs/phpstan-guide.md)
```

### KISS (Keep It Simple, Stupid)

**RULE**: Most systems work best if they are kept simple rather than made complicated.

**Implementation**:
1. **Essential docs only** → Remove nice-to-have documentation
2. **Flat structure** → Max 3 levels of nesting
3. **Clear naming** → Descriptive filenames, no abbreviations
4. **Single purpose** → Each file covers one topic

**Example**:
```markdown
<!-- WRONG: Too many topics in one file -->
# Module Guide
- Installation
- Configuration
- PHPStan
- Testing
- Deployment
- Troubleshooting
- FAQ
- Changelog

<!-- CORRECT: Separate files -->
# Module Guide
- [Installation](installation.md)
- [Configuration](configuration.md)
- [PHPStan](phpstan.md)
- [Testing](testing.md)
```

## Duplicate Detection Strategy

### Algorithm

```python
def find_duplicates(docs_folder):
    """
    Find duplicate documentation files
    """
    # 1. Group by filename
    by_name = group_by_filename(docs_folder)
    
    # 2. For each group with same name:
    for name, files in by_name.items():
        if len(files) > 1:
            # Compare content similarity
            similarity = calculate_similarity(files)
            
            # If >80% similar, mark as duplicate
            if similarity > 0.8:
                mark_duplicate(files)
    
    # 3. Group by content hash
    by_hash = group_by_content_hash(docs_folder)
    
    # 4. Return duplicates
    return duplicates
```

### Categories of Duplicates

1. **Exact Duplicates** (100% same)
   - Action: Delete, keep one copy
   
2. **Near Duplicates** (>80% similar)
   - Action: Consolidate into one, delete others
   
3. **Related Content** (50-80% similar)
   - Action: Cross-reference with links
   
4. **Different Topics** (<50% similar)
   - Action: Keep separate, add to index

## Index Strategy

### Master Index (docs/README.md)

```markdown
# FixCity Documentation

## Quick Links
- [Configuration](project/configuration.md)
- [AI Workflow](project/ai-workflow/)
- [Module Docs](modules/index.md)
- [Theme Docs](themes/index.md)

## Project Documentation
- [Configuration](project/configuration.md) - Theme, document_root, paths
- [AI Workflow](project/ai-workflow/) - BMAD, GSD, Ralph, OpenViking
- [Conventions](project/conventions/) - Coding standards

## Module Documentation
| Module | Docs | Status |
|--------|------|--------|
| AI | [Docs](../../laravel/Modules/AI/docs/) | ✅ |
| Activity | [Docs](../../laravel/Modules/Activity/docs/) | ✅ |
| ... | ... | ... |

## Theme Documentation
| Theme | Docs | Status |
|-------|------|--------|
| Sixteen (Active) | [Docs](../../laravel/Themes/Sixteen/docs/) | ✅ |
| TwentyOne | [Docs](../../laravel/Themes/TwentyOne/docs/) | ⚠️ Inactive |
```

### Module Index (laravel/Modules/*/docs/README.md)

```markdown
# Module Name - Documentation

**Path**: `laravel/Modules/ModuleName/`

## Quick Start
- [Installation](installation.md)
- [Configuration](configuration.md)

## Core Documentation
- [Architecture](architecture.md)
- [Models](models.md)
- [Filament Resources](filament-resources.md)

## Quality
- [PHPStan](phpstan.md)
- [Testing](testing.md)

## Cross-References
- [Project Docs](../../../docs/)
- [Theme Docs](../../../laravel/Themes/Sixteen/docs/)
```

### Theme Index (laravel/Themes/Sixteen/docs/README.md)

```markdown
# Sixteen Theme - Documentation

**Path**: `laravel/Themes/Sixteen/`  
**Status**: ✅ Active Theme  
**Config**: `config/local/fixcity/xra.php` → `pub_theme`

## Quick Start
- [Installation](installation.md)
- [Configuration](configuration.md)

## Components
- [Hero](components/hero.md)
- [Footer](components/footer.md)
- [Markets](components/markets.md)

## Build System
- [Vite](build/vite.md)
- [Assets](build/assets.md)

## Cross-References
- [Project Docs](../../../docs/)
- [Module Docs](../../../laravel/Modules/*/docs/)
```

## Migration Plan

### Phase 1: Audit (30 min)

```bash
# 1. List all documentation files
find docs/ laravel/Modules/*/docs/ laravel/Themes/*/docs/ -name "*.md" | sort

# 2. Find duplicates
# (Use script to compare content)

# 3. Create inventory
# Document: filename, path, size, last_modified, content_hash
```

### Phase 2: Cleanup (1-2 ore)

```bash
# 1. Backup
git branch backup-docs-before-cleanup

# 2. Remove exact duplicates
# Keep one copy, delete others

# 3. Consolidate near-duplicates
# Merge content, keep one file

# 4. Update references
# Change TwentyOne → Sixteen
```

### Phase 3: Indices (1 ora)

```bash
# 1. Create master index
echo "# FixCity Documentation" > docs/README.md

# 2. Create module indices
for module in laravel/Modules/*/; do
    create_module_index "$module"
done

# 3. Create theme index
create_theme_index "laravel/Themes/Sixteen/"

# 4. Update cross-references
update_all_links
```

### Phase 4: Update Rules (30 min)

```bash
# 1. Update .windsurfrules
cat >> .windsurfrules << 'EOF'
# Theme Configuration
- Active Theme: Sixteen
- Config: config/local/fixcity/xra.php
- Detection: APP_URL → domain → reverse → config path

# Document Root
- public_html is document root
- Theme assets: public_html/assets

# Documentation Structure
- Project: docs/
- Modules: laravel/Modules/*/docs/
- Themes: laravel/Themes/Sixteen/docs/
- DRY: No duplicates, use links
- KISS: Essential only, max 3 levels
EOF

# 2. Update OpenViking memories
openviking add-memory --title="Project Configuration" --content="..."
```

## Success Criteria

| Metric | Target | Measurement |
|--------|--------|-------------|
| Duplicate files | 0 | Content comparison |
| Broken links | 0 | Link checker |
| Indexed docs | 100% | Index coverage |
| Theme references | 100% Sixteen | Grep for TwentyOne |
| Time to find doc | <30s | User testing |

## Risks & Mitigations

| Risk | Impact | Mitigation |
|------|--------|------------|
| Delete important docs | High | Backup first, review carefully |
| Break existing links | Medium | Update all references, use redirects |
| Lose git history | Low | Use `git mv` not `rm + add` |
| Theme confusion | High | Clear documentation of detection algorithm |

## References

- **DRY Principle**: https://en.wikipedia.org/wiki/Don%27t_repeat_yourself
- **KISS Principle**: https://en.wikipedia.org/wiki/KISS_principle
- **Documentation Index**: `docs/README.md` (to be created)
- **Theme Detection**: `laravel/.env` → `config/local/fixcity/xra.php`

---

**Last Updated**: 2026-03-30  
**Next Review**: After cleanup completion
