# Roadmap modulo Xot - Completamento e miglioramenti

"Il motore che muove l'universo Quaeris."

## Visione

Consolidare Xot come un framework "Zero-Config" per Laravel 12, dove ogni nuovo modulo eredita automaticamente sicurezza, internazionalizzazione, gestione temi e performance di alto livello tramite una semplice estensione di classi base.

## Fasi di sviluppo

### Fase 1: Framework stabilization (completed)

- [x] PHPStan Level 10 compliance as standard.
- [x] Recursive documentation cleanup and standardization.
- [x] GitHub Action automation for quality check and releases.
- [x] Semantic versioning: automated release workflow (v2.0.0).
- [x] Core abstractions (XotBase classes, PDF generation action, AI-ready scaffolding).

### Fase 2: Developer happiness (in progress)

- [ ] Refactoring di `XotBaseServiceProvider` per supportare il boot asincrono.
- [ ] Piena compatibilita' con Filament v5 plugins.
- [ ] Master-detail evolution: refactor di `XotBaseManageRelatedRecords` per supportare infolist header e form unificati.
- [ ] Xot CLI: comandi Artisan per generare moduli conformi in 1 secondo.
- [ ] Trait auditor: tool che rileva collisioni di nomi nei trait a tempo di build.
- [ ] Miglioramento della `XotBasePage` per supportare Folio + Volt in modo nativo.

### Fase 3: AI core integration (future)

- [ ] AI code reviewer: modello locale che verifica le regole prima del commit.
- [ ] Self-healing base classes: le classi base suggeriscono correzioni di tipo in base al PHPStan.
- [ ] Cross-module dependency resolver: visualizzazione grafica delle dipendenze tra moduli core.
- [ ] Automatic API documentation generation for all modules.
- [ ] Self-healing database migrations.

## Checklist qualita'

- [x] PHPStan Level 10.
- [ ] Zero dipendenze esterne non necessarie (keep it lean).
- [ ] 100% test coverage sui dispatcher di actions.

---
Last updated: 2026-03-13
