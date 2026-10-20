---
title: "Notify — Indice canonico docs"
status: canonical
module: Notify
updated: 2026-10-20
---

> Indice canonico. Indici storici alternativi: `00-INDEX.md`, `00-index.md`, `INDEX.md` (stale, 280 righe), `index.md`, `README.md`, `MODULE_DOCS_INDEX.md`. Nessun file storico cancellato.

> Convenzione: [Docs Organization — Modules & Themes](../../Xot/docs/conventions/docs-organization.md)

# Notify — Indice docs

Modulo Notify (notifiche multi-canale: email, SMS, WhatsApp, push, Telegram). Gestisce invio, tracking e template.

## Panoramica
- [README.md](./README.md) — identità, mappa del codice, limiti verificati
- [scopo.md](./scopo.md) — scopo del modulo
- [wiki/purpose.md](./wiki/purpose.md) — scopo wiki

## Architettura
- [architecture/](./architecture/) — architettura canali
- [email-templates/](./email-templates.md) / `mail-templates/` — template email
- [sms/](./sms/) — driver SMS; `notifications/` — notifiche
- [email/](./email/) — sistema email; `messaging/` — messaggi
- [bmad/architecture.md](./bmad/architecture.md) — dossier BMAD

## PHPStan / Qualità
- [phpstan/](./phpstan/) — report per livello
- [stories/phpstan-notificationmanager-service-removed.story.md](./stories/phpstan-notificationmanager-service-removed.story.md) — rimozione Service
- [stories/phpstan-wave-coord.story.md](./stories/phpstan-wave-coord.story.md) — wave coordinata
- [quality/](./quality/) — audit e report
- Gate 2026-10-20: `phpstan analyse Modules` → file_errors 0

## BMAD / Stories
- [bmad/](./bmad/) — dossier BMAD (54 file: architecture, quick-ref, setup, stories/)
- [stories/](./stories/) — storie feature (28 file: phpstan, servizi→azioni, audit)
- [decision-log.md](./decision-log.md) — decisioni

## Struttura (sottocartelle)
- `bmad/` — dossier BMAD
- `stories/` — storie feature
- `concepts/` — concetti architetturali (`xotbase-never-extend-filament.md`)
- `wiki/` — wiki (912 md, ingresso `wiki/index.md`; duplicati `wiki/00-INDEX.md`, `wiki/index.md`) — mantenuti
- `tests/` / `testing/` — test e linee guida
- `archive/`, `raw/` — immutabili / legacy

## Duplicati storici mantenuti
- `00-INDEX.md` (operativo, 13 KB) — ingresso primario
- `00-index.md` — copia maiuscola/minuscola
- `INDEX.md` (stale, 280 righe, 2026-07-20) — mantenuto; riferimento storico
- `index.md` (stale, 16 KB) — mantenuto
- `README.md` / `readme.md` / `README-*.md` — mantenuti
- `MODULE_DOCS_INDEX.md`, `DOCUMENTATION_INDEX.md`, `MASTER_DOCUMENTATION_INDEX.md` — mantenuti

---
*Aggiornato: 2026-10-20 — conforme a `docs-organization.md`; `00-INDEX.md` resta ingresso operativo, `INDEX.md` canonico ora aggiornato, nessun file cancellato.*
