---
title: "Changelog - Modulo Notify"
type: concept
tags: [changelog]
created: 2026-07-14
updated: 2026-07-14
qmd: "changelog changelog - modulo notify"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./acronym-naming-conventions-1.md"
  - "./actions-calling-actions-pattern.md"
  - "./advanced-template-system.md"
  - "./analisi-completa.md"
  - "./analisi-dettagliata-1.md"
  - "./analisi-dettagliata-2.md"
  - "./analisi-dettagliata-3.md"
  - "./analisi-dettagliata-4-1.md"
related:
  - "./acronym-naming-conventions-1.md"
  - "./actions-calling-actions-pattern.md"
  - "./advanced-template-system.md"
  - "./analisi-completa.md"
  - "./analisi-dettagliata-1.md"
  - "./analisi-dettagliata-2.md"
  - "./analisi-dettagliata-3.md"
  - "./analisi-dettagliata-4-1.md"
---

# Changelog - Modulo Notify

Tutte le modifiche significative al modulo Notify saranno documentate in questo file.

## [2025-06-04] - Fix PSR-4 Autoloading

### Fixed
- **SendScheduledPushNotification.php**: Corretto import con namespace errato
  - Prima: `use Modules\Notify\App\Services\PushNotificationService;`
  - Dopo: `use Modules\Notify\Services\PushNotificationService;`
  - Dettagli: [psr4-namespace-fix.md](./psr4-namespace-fix.md)

### Documentation
- Aggiunta guida PSR-4 compliance per il modulo
- Regola Laraxot: MAI usare `\App\` nei namespace moduli

---

## Convenzioni

- Namespace modulo: `Modules\Notify\{Subdirectory}`
- NO: `Modules\Notify\App\{Subdirectory}`
- Cartella `app/` è organizzativa, non parte del namespace
