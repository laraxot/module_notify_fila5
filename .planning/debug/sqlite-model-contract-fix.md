---
status: gathering
trigger: "Debug and fix critical database issue - fixcity_data.sqlite missing + ModelContract getKey() signature incompatibility"
created: 2026-04-09T12:00:00Z
updated: 2026-04-09T12:00:00Z
---

## Current Focus

hypothesis: Two separate issues: (1) missing SQLite database file, (2) ModelContract::getKey() signature incompatible with Laravel's Model::getKey()
test: Read config files and contract to understand the exact signatures
expecting: Find the exact incompatibility and fix path
next_action: "gather initial evidence - read .env, database config, ModelContract, XotBaseModel"

## Symptoms

expected: Database exists, migrations run successfully, CMS pages load from DB, test pages return HTTP 200
actual: fixcity_data.sqlite doesn't exist, migrations fail with getKey() signature incompatibility, all pages return HTTP 500
errors: "Declaration of Illuminate\Database\Eloquent\Model::getKey() must be compatible with Modules\Xot\Contracts\ModelContract::getKey(): mixed"
reproduction: "curl http://127.0.0.1:8000/it/tests/segnalazione-crea returns 500; php artisan migrate fails"
started: Database file was never created or was deleted; contract signature is wrong

## Eliminated

## Evidence

## Resolution

root_cause:
fix:
verification:
files_changed: []
