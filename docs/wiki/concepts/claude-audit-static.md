---
title: "claude-audit static — modulo Notify"
type: concept
module: Notify
tags: [notify, quality, claude-audit, actions]
created: 2026-07-09
updated: 2026-07-12
qmd: "Notify claude-audit static 80 SendPushNotificationAction no app Support"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
  - "https://github.com/laraxot/base_fixcity_fila5/issues/704"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/705"
related:
  - ./no-app-support-queueable-actions.md
  - ../actions-over-services.md
  - ../../../../../../bashscripts/tools/run-claude-audit-module-static.sh
related:
  - "./code-redundancy-notify.md"
  - "./composer-root-minimal-nwidart.md"
  - "./context-overflow-prevention.md"
  - "./enum-standards.md"
  - "./llm-wiki-governance.md"
  - "./method-name-homonyms.md"
  - "./module-root-uppercase-folders-archive.md"
  - "./no-app-support-queueable-actions.md"
---

# claude-audit static (Notify)

## Comando

```bash
bash bashscripts/tools/run-claude-audit-module-static.sh Notify
```

## Fix applicati (80/0)

- `PushNotificationService` → `SendPushNotificationAction` + `PushNotificationPlatformDelivery` (da `app/Support/` eliminato → `app/Actions/`)
- Test model >500 LOC → split su confine `test()` (`split-notify-large-tests.py`)
- Lang `test_smtp.php` — header commenti ≥5%

## Report

`Modules/Notify/.claude-audit/audit-report.html`
