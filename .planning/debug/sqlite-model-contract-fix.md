---
status: investigating
trigger: "Debug and fix critical database issue - fixcity_data.sqlite missing + ModelContract getKey() signature incompatibility"
created: 2026-04-09T12:00:00Z
updated: 2026-04-09T12:05:00Z
---

## Current Focus

hypothesis: Two issues: (1) ModelContract::getKey(): mixed and getRelationValue(): mixed are incompatible with Laravel's Model methods - the interface declares return types that conflict with parent. (2) Database file exists but no migrations have been run. The 'cms' and 'xot' connections need to resolve to the sqlite database.
test: Check if the error occurs when bootstrapping Laravel by trying to artisan migrate; fix ModelContract first
expecting: After fixing ModelContract signatures, migrations should bootstrap correctly
next_action: "Fix ModelContract - remove getKey() and getRelationValue() from interface since they conflict with Laravel Model"

## Symptoms

expected: Database exists, migrations run successfully, CMS pages load from DB, test pages return HTTP 200
actual: fixcity_data.sqlite doesn't exist, migrations fail with getKey() signature incompatibility, all pages return HTTP 500
errors: "Declaration of Illuminate\Database\Eloquent\Model::getKey() must be compatible with Modules\Xot\Contracts\ModelContract::getKey(): mixed"
reproduction: "curl http://127.0.0.1:8000/it/tests/segnalazione-crea returns 500; php artisan migrate fails"
started: Database file was never created or was deleted; contract signature is wrong

## Eliminated

- hypothesis: Database file doesn't exist
  evidence: File exists at laravel/database/fixcity_data.sqlite (12KB, created today at 12:17)
  timestamp: 2026-04-09T12:05:00Z

## Evidence

- timestamp: 2026-04-09T12:02:00Z
  checked: laravel/.env
  found: DB_CONNECTION=sqlite, DB_DATABASE=fixcity_data
  implication: Database path resolves to database_path('fixcity_data.sqlite') = laravel/database/fixcity_data.sqlite

- timestamp: 2026-04-09T12:02:00Z
  checked: laravel/config/database.php
  found: sqlite connection uses database_path(env('DB_DATABASE', 'database').'.sqlite')
  implication: Path resolution confirmed

- timestamp: 2026-04-09T12:03:00Z
  checked: Modules/Xot/app/Contracts/ModelContract.php
  found: Interface declares `public function getKey(): mixed;` and `public function getRelationValue(string $key): mixed;` with merge conflict markers (<<<<<<< HEAD / ======= / >>>>>>> 9506daa5)
  implication: These methods conflict with Laravel's Model which has different signatures. Also has leftover git merge conflict markers in PHPDoc.

- timestamp: 2026-04-09T12:03:00Z
  checked: Modules/Xot/app/Models/XotBaseModel.php
  found: extends Eloquent Model, does NOT implement ModelContract directly. Has $connection = 'xot'
  implication: Models extending XotBaseModel use 'xot' connection which is not defined in database.php

- timestamp: 2026-04-09T12:04:00Z
  checked: Modules/Cms/app/Models/BaseModel.php
  found: extends XotBaseModel, overrides $connection = 'cms'
  implication: CMS models use 'cms' connection which is also not defined in database.php

- timestamp: 2026-04-09T12:04:00Z
  checked: Modules/Cms/app/Models/Page.php
  found: extends BaseModelLang -> BaseModel -> XotBaseModel. Uses SushiToJsons trait (Sushi pattern - loads from array, not DB)
  implication: Page model uses Sushi pattern - data comes from getRows() method, not from database table

- timestamp: 2026-04-09T12:05:00Z
  checked: php artisan migrate:status
  found: ALL migrations are Pending - no tables exist yet
  implication: Database file exists but is empty (no schema)

## Resolution

root_cause:
fix:
verification:
files_changed: []
