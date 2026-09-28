---
title: "README"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "README"
issues: []
discussions: []
---

# _bak — storico notifications (non eseguire)

Laravel non carica sottocartelle di `migrations/`.

Anti-pattern rimosso: `User/.../2026_07_02_000000_create_notifications_table.php` (owner sbagliato, `extends Migration`).

Canon: `../2026_06_10_134000_create_notifications_table.php` (Notify, `XotBaseMigration`).
