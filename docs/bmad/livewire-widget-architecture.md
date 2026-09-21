---
title: "Architecture — Notify"
type: architecture
module: Notify
related:
  - ./livewire-widget-prd.md
---

# Architecture Notify

```
XotData.disable_database_notifications
  └─ false → trigger + polling + hook USER_MENU_BEFORE
                 └─ @livewire(DatabaseNotifications::class)
```

ADR: vendor resta vendor. Solo il **riferimento** diventa tipizzato.
