<<<<<<< HEAD
# Superpowers - Agentic Skills Framework

**Source**: https://github.com/obra/superpowers  
**Stars**: 126K  
**Version**: v5.0.6  
**License**: MIT  
**Status**: ✅ Installed

---

## Cosa è

Superpowers è un framework di skill componibili per coding agent (OpenCode, Claude Code, Cursor, Gemini CLI). Fornisce un workflow completo di sviluppo software autonomo basato su:

- **TDD** (Test-Driven Development) come default
- **Brainstorming** iterativo prima del codice
- **Pianificazione granulare** (task da 2-5 minuti)
- **Subagent-driven development** con review a due stadi
- **Systematic debugging** con processo a 4 fasi

---

## Installazione

### File: `opencode.json`

```json
{
  "plugin": ["superpowers@git+https://github.com/obra/superpowers.git"]
```

Il plugin si auto-install via Bun al riavvio di OpenCode. Si aggiorna automaticamente.

### Pin di versione

```json
{
  "plugin": ["superpowers@git+https://github.com/obra/superpowers.git#v5.0.6"]
=======
# 🦸 Superpowers for Laravel Modules

> **Last Updated**: 2026-03-31  
> **Status**: ✅ Active  
> **Version**: v5.0.6

---

## 📋 Overview

This guide explains how to use Superpowers skills specifically for Laravel module development in the FixCity platform.

---

## 🎯 Module Development Workflow

### Standard Module Workflow

```
1. Brainstorming
   ↓
2. Plan Module Structure
   ↓
3. Create Module (worktree)
   ↓
4. TDD Implementation
   ↓
5. Code Review
   ↓
6. Merge & Document
```

---

## 📁 Module Creation Example

### Scenario: Create "Ticket" Module

#### Phase 1: Brainstorming

**User**: "I want to create a ticket management module"

**Agent** (brainstorming skill):
```
## Clarifying Questions

1. **Ticket Types**
   - Single status or workflow (open → in-progress → resolved)?
   - Priority levels?
   - Categories?

2. **User Roles**
   - Who can create tickets?
   - Who can resolve?
   - Assignment system?

3. **Features**
   - Comments on tickets?
   - File attachments?
   - Activity tracking?

4. **Integration**
   - Notifications when status changes?
   - API endpoints?
   - Filament admin panel?
```

**Output**: Validated design document

---

#### Phase 2: Planning

**Agent** (writing-plans skill):

```markdown
## Plan: Ticket Module

### Task 1: Create Module Structure
- Command: `php artisan module:make Ticket`
- Time: 2 min
- Verification: `ls -la laravel/Modules/Ticket`

### Task 2: Create Migration
- File: `laravel/Modules/Ticket/database/migrations/2026_03_31_create_tickets_table.php`
- Time: 5 min
- Schema:
  - id (ulid, primary)
  - title (string)
  - description (text)
  - status (enum: open, in_progress, resolved)
  - priority (enum: low, medium, high, critical)
  - user_id (ulid, foreign)
  - assigned_to (ulid, foreign, nullable)
  - created_at, updated_at
- Verification: `php artisan migrate --pretend`

### Task 3: Create Model
- File: `laravel/Modules/Ticket/app/Models/Ticket.php`
- Time: 5 min
- Extends: `Modules\Ticket\app\BaseModel`
- Fillable: title, description, status, priority, user_id, assigned_to
- Relationships: user, assignee, comments
- Verification: `phpstan analyse Modules/Ticket/app/Models/Ticket.php`

### Task 4: Write Tests
- File: `laravel/Modules/Ticket/tests/Feature/TicketTest.php`
- Time: 15 min
- Tests:
  - creates ticket
  - belongs to user
  - has comments
  - status transitions
  - priority scopes
- Verification: `php artisan test --filter TicketTest`

### Task 5: Create Actions
- Files:
  - `app/Actions/Ticket/CreateTicketAction.php`
  - `app/Actions/Ticket/UpdateTicketAction.php`
  - `app/Actions/Ticket/AssignTicketAction.php`
- Time: 10 min
- Pattern: Spatie QueueableAction
- Verification: `phpstan analyse Modules/Ticket/app/Actions`

### Task 6: Create Filament Resource
- File: `app/Filament/Resources/TicketResource.php`
- Time: 15 min
- Form: title, description, status, priority, assignee
- Table: id, title, status, priority, created_at
- Filters: status, priority, assignee
- Verification: Open `/admin/tickets`

### Task 7: Create API Resource
- File: `app/Http/Resources/TicketResource.php`
- Time: 5 min
- Fields: id, title, status, priority, user, assignee, created_at
- Verification: `curl http://fixcity.local/api/tickets`

### Task 8: Documentation
- Files:
  - `laravel/Modules/Ticket/docs/README.md`
  - `laravel/Modules/Ticket/docs/features.md`
- Time: 10 min
- Verification: Review docs completeness
```

---

#### Phase 3: Git Worktree

```bash
# Create isolated workspace
git worktree add -b feature/ticket-module ../worktrees/ticket-module

# Switch to worktree
cd ../worktrees/ticket-module

# Verify
git branch
# * feature/ticket-module
```

---

#### Phase 4: TDD Implementation

**Task 2: Migration (TDD)**

```php
// 1. RED - Write test first
// tests/Feature/TicketMigrationTest.php
it('has tickets table', function () {
    expect(Schema::hasTable('tickets'))->toBeTrue();
});

it('tickets table has correct columns', function () {
    $columns = Schema::getColumnListing('tickets');
    expect($columns)->toContain('id', 'title', 'status', 'priority');
});

// Run: ❌ FAILS (table doesn't exist)

// 2. GREEN - Create migration
// database/migrations/2026_03_31_create_tickets_table.php
public function up(): void
{
    Schema::create('tickets', function (Blueprint $table) {
        $table->ulid('id')->primary();
        $table->string('title');
        $table->text('description');
        $table->string('status')->default('open');
        $table->string('priority')->default('medium');
        $table->ulid('user_id');
        $table->ulid('assigned_to')->nullable();
        $table->timestamps();
        
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('assigned_to')->references('id')->on('users');
        
        $table->index('status');
        $table->index('priority');
    });
}

// Run: ✅ PASSES

// 3. REFACTOR - Add index names
$table->index('status', 'idx_tickets_status');
$table->index('priority', 'idx_tickets_priority');

// Run: ✅ STILL PASSES
```

---

#### Phase 5: Code Review

**Review Request**:

```markdown
## Code Review: Ticket Module

**Plan**: [Link to plan above]
**Changes**: 15 files, +1,234 lines
**Tests**: 23 passed, 0 failed
**PHPStan**: Level 10 ✅

### Files Changed
- database/migrations/create_tickets_table.php
- app/Models/Ticket.php
- app/Actions/Ticket/*.php
- app/Filament/Resources/TicketResource.php
- tests/Feature/TicketTest.php
- docs/README.md

### Specific Questions
1. Is the status enum correct? (open, in_progress, resolved)
2. Should we add SLA tracking?
3. Any security concerns with assignment?

### Blocking Issues
None

### Non-Blocking
- Consider adding soft deletes for audit
- Maybe add ticket templates
```

---

## 🎯 Laraxot Integration

### Module-Specific Patterns

#### BaseModel Extension

```php
// ✅ CORRECT - Extend module's BaseModel
namespace Modules\Ticket\App\Models;

class Ticket extends BaseModel
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'user_id',
        'assigned_to',
    ];
}

// ❌ WRONG - Don't extend Laravel's Model directly
class Ticket extends \Illuminate\Database\Eloquent\Model
```

#### XotBase Filament Resource

```php
// ✅ CORRECT - Extend XotBaseResource
namespace Modules\Ticket\App\Filament\Resources;

use Xot\Base\Filament\Resources\XotBaseResource;

class TicketResource extends XotBaseResource
{
    protected static ?string $model = Ticket::class;
    
    public static function form(Form $form): Form
    {
        return parent::form($form)->schema([
            // Your form fields
        ]);
    }
}

// ❌ WRONG - Don't extend Filament's Resource directly
```

#### Actions Pattern

```php
// ✅ CORRECT - Spatie QueueableAction
namespace Modules\Ticket\App\Actions\Ticket;

use Spatie\QueueableAction\QueueableAction;

class CreateTicketAction
{
    use QueueableAction;
    
    public function execute(array $data): Ticket
    {
        return Ticket::create($data);
    }
}

// ❌ WRONG - Don't create Service classes
class TicketService
```

---

## 📊 Module Quality Gates

### Pre-Commit Checklist

```bash
# 1. Tests
php artisan test --filter Ticket

# 2. PHPStan
./vendor/bin/phpstan analyse Modules/Ticket --level=10

# 3. Pint (Code Style)
composer pint -- Modules/Ticket

# 4. Verify Documentation
ls -la Modules/Ticket/docs/

# 5. Check Translations
ls -la Modules/Ticket/lang/
```

### Required Files

```
Modules/Ticket/
├── app/
│   ├── Models/
│   │   └── Ticket.php              ← Required
│   ├── Actions/
│   │   └── Ticket/
│   │       ├── CreateTicketAction.php  ← Required
│   │       └── UpdateTicketAction.php  ← Required
│   └── Filament/
│       └── Resources/
│           └── TicketResource.php      ← Required for admin
├── database/
│   └── migrations/
│       └── 2026_03_31_create_tickets_table.php  ← Required
├── tests/
│   └── Feature/
│       └── TicketTest.php          ← Required
├── docs/
│   ├── README.md                   ← Required
│   └── features.md                 ← Required
└── lang/
    └── en/
        └── ticket.php              ← Required
```

---

## 🔧 Common Module Patterns

### Status Pattern

```php
// app/Enums/TicketStatus.php
enum TicketStatus: string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'in_progress';
    case RESOLVED = 'resolved';
    
    public function label(): string
    {
        return match($this) {
            self::OPEN => 'Open',
            self::IN_PROGRESS => 'In Progress',
            self::RESOLVED => 'Resolved',
        };
    }
    
    public function color(): string
    {
        return match($this) {
            self::OPEN => 'warning',
            self::IN_PROGRESS => 'info',
            self::RESOLVED => 'success',
        };
    }
}

// In Model
protected function casts(): array
{
    return [
        'status' => TicketStatus::class,
    ];
}
```

### Priority Pattern

```php
// app/Enums/TicketPriority.php
enum TicketPriority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';
    case CRITICAL = 'critical';
    
    public function label(): string
    {
        return match($this) {
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
            self::CRITICAL => 'Critical',
        };
    }
}
```

### Scopes Pattern

```php
// In Ticket Model
public function scopeOpen($query): Builder
{
    return $query->where('status', TicketStatus::OPEN);
}

public function scopeHighPriority($query): Builder
{
    return $query->whereIn('priority', [
        TicketPriority::HIGH,
        TicketPriority::CRITICAL,
    ]);
}

public function scopeUnassigned($query): Builder
{
    return $query->whereNull('assigned_to');
>>>>>>> origin/dev
}
```

---

<<<<<<< HEAD
## Workflow Base

```
1. brainstorming       → Refine idea, ask questions, present design in sections
2. using-git-worktrees → Create isolated workspace on new branch
3. writing-plans       → Break into 2-5 min tasks with exact file paths
4. subagent-driven     → Dispatch subagent per task (or executing-plans for batch)
5. test-driven-dev     → RED-GREEN-REFACTOR enforced per task
6. requesting-code-review → Review against plan
7. finishing-a-branch  → Verify tests, merge/PR decision
=======
## 📝 Module Documentation Template

```markdown
# Ticket Module

> **Status**: ✅ Active
> **Version**: 1.0.0

## Features

- Create and manage tickets
- Status workflow (open → in-progress → resolved)
- Priority levels
- Assignment system
- Activity tracking

## Models

### Ticket

```php
Ticket {
    id: ulid
    title: string
    description: text
    status: TicketStatus enum
    priority: TicketPriority enum
    user_id: ulid (foreign)
    assigned_to: ulid (foreign, nullable)
}
```

## Actions

- CreateTicketAction
- UpdateTicketAction
- AssignTicketAction
- ChangeStatusAction

## API Endpoints

- GET /api/tickets
- POST /api/tickets
- GET /api/tickets/{id}
- PUT /api/tickets/{id}
- DELETE /api/tickets/{id}

## Admin Panel

- `/admin/tickets` - List tickets
- `/admin/tickets/create` - Create ticket
- `/admin/tickets/{id}/edit` - Edit ticket

## Testing

```bash
php artisan test --filter Ticket
```

## PHPStan

```bash
./vendor/bin/phpstan analyse Modules/Ticket --level=10
```
>>>>>>> origin/dev
```

---

<<<<<<< HEAD
## Skill Library

### Testing
| Skill | Trigger |
|-------|---------|
| `test-driven-development` | Any implementation task |

### Debugging
| Skill | Trigger |
|-------|---------|
| `systematic-debugging` | Bug investigation, unexpected behavior |
| `verification-before-completion` | Before declaring fix complete |

### Collaboration
| Skill | Trigger |
|-------|---------|
| `brainstorming` | "help me plan", design discussion |
| `writing-plans` | After design approval |
| `executing-plans` | Batch execution with checkpoints |
| `subagent-driven-development` | Parallel subagent workflows |
| `requesting-code-review` | Between tasks |
| `using-git-worktrees` | Parallel branches |
| `finishing-a-branch` | Task completion |

### Meta
| Skill | Trigger |
|-------|---------|
| `writing-skills` | Create new skill |
| `using-superpowers` | Introduction |

---

## Tool Mapping (OpenCode)

| Superpowers (Claude Code) | OpenCode Equivalent |
|---------------------------|---------------------|
| `TodoWrite` | `todowrite` |
| `Task` (subagents) | `@mention` syntax |
| `Skill` tool | `skill` tool |
| File operations | Native OpenCode tools |

---

## Integrazione con Stack Progetto

Superpowers si integra con le metodologie già presenti:

| Metodo | Progetto | Superpowers |
|--------|----------|-------------|
| **TDD** | `skills/tdd/`, `skills/tdd-laravel/` | `test-driven-development` |
| **Brainstorming** | `skills/brainstorming-laravel/` | `brainstorming` |
| **Code Review** | `skills/bmad-code-review/` | `requesting-code-review` |
| **Debug** | `skills/systematic-debugging-laravel/` | `systematic-debugging` |
| **Planning** | `skills/gsd-plan-phase/` | `writing-plans` |
| **Execution** | `skills/gsd-execute-phase/` | `executing-plans` |
| **Skills creation** | `skills/skill-creator/` | `writing-skills` |

**Priorità**: Le skill di progetto (in `.opencode/skills/`) sovrascrivono Superpowers quando esiste overlap.

---

## Verifica Installazione

```
# In OpenCode, chiedi:
"Tell me about your superpowers"

# Oppure usa il tool skill:
skill tool → list skills → cerca superpowers/*
```

---

## Riferimenti

- [Superpowers Blog](https://blog.fsck.com/2025/10/09/superpowers/)
- [OpenCode Install Docs](https://github.com/obra/superpowers/blob/main/docs/README.opencode.md)
- [Discord Community](https://discord.gg/Jd8Vphy9jq)
- [PLUGINS_AND_SKILLS.md](../../.opencode/PLUGINS_AND_SKILLS.md)
=======
## 🔗 Related Documentation

### Internal

- [Superpowers README](../../README.md)
- [Workflow Guide](../../workflow.md)
- [Laraxot Core](../laraxot-core.md)
- [Module Architecture](../module-architecture.md)

### External

- [Superpowers GitHub](https://github.com/obra/superpowers)
- [Laraxot Documentation](https://laraxot.com)

---

**Maintainer**: Development Team  
**Last Review**: 2026-03-31  
**Next Review**: 2026-06-30  
**Status**: ✅ Active
>>>>>>> origin/dev
