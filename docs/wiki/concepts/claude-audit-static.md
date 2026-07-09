---
title: "claude-audit static — modulo Notify"
type: concept
module: Notify
tags: [notify, quality, claude-audit, actions]
created: 2026-07-09
updated: 2026-07-09
qmd: "Notify claude-audit static 80 SendPushNotificationAction no services"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/704"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/705"
related:
  - ../actions-over-services.md
  - ../../../../../../bashscripts/tools/run-claude-audit-module-static.sh
---

# claude-audit static (Notify)

## Comando

```bash
bash bashscripts/tools/run-claude-audit-module-static.sh Notify
```

## Fix applicati (80/0)

- `PushNotificationService` → `SendPushNotificationAction` + `Support/PushNotificationPlatformDelivery`
- Test model >500 LOC → split su confine `test()` (`split-notify-large-tests.py`)
- Lang `test_smtp.php` — header commenti ≥5%

## Report

`Modules/Notify/.claude-audit/audit-report.html`
