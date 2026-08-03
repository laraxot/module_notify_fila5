# Merge conflict markers — Notify

<<<<<<< HEAD
## Stato (2026-08-02)

Resolved forward-only:
- [x] `resources/svg/*.svg` (13) — SVG reale, non puntatore Git LFS
- [x] `app/Filament/Resources/**/Tables/*Table.php` (3 conflitti + 3 allineati) — corpo HEAD, firma `public function getTableColumns()` (non `static`)
- [x] `docs/redundancy-report.md` — HEAD version
=======
## Stato (2026-05-26)

- [x] `app/Filament/Resources/**/Tables/*Table.php` (3 conflitti + 3 allineati) — corpo HEAD, firma `public function getTableColumns()` (non `static`: vedi memoria sotto)
- [x] `docs/redundancy-report.md` — HEAD
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
- [x] Rimossi `*.php.up` backup con marker

## Verifica

```bash
cd laravel && git grep -n '^<<<<<<< ' -- Modules/Notify/
./vendor/bin/phpstan analyse Modules/Notify --memory-limit=2G
```

## Memoria

<<<<<<< HEAD
[`docs/wiki/memories/merge-collision-notify-lessons.md`](wiki/memories/merge-collision-notify-lessons.md)
=======
[`docs/wiki/memories/merge-collision-notify-lessons.md`](wiki/memories/merge-collision-notify-lessons.md)
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
