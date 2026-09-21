---
title: "Inventario Notify — hook database-notifications"
type: inventory
module: Notify
status: approved
related:
  - ./livewire-widget-prd.md
  - ../../Xot/docs/bmad/livewire-widget-project-context.md
  - ../../User/docs/bmad/livewire-inventory.md
---

# Inventario Notify

**Nessuna classe** in `app/Http/Livewire`.

Hook **attivo** in `AdminPanelProvider`:

```php
@livewire('database-notifications')
```

Classe reale: `Filament\Notifications\Livewire\DatabaseNotifications` (vendor). Trigger già `notify::livewire.database-notifications-trigger`. Gate: `XotData::disable_database_notifications`.

| Verdetto | Perché |
|----------|--------|
| **Non convertire in XotBaseWidget** | Codice non posseduto; fork ingestibile |
| **Sì: FQCN nel hook** | Stessa classe di difetto alias User. `DatabaseNotifications::class` al posto della stringa |
| User hook commentato | “moved into Notify” — non riattivare in User |

P1 chrome: ogni rename vendor dell’alias rompe il user menu di **tutti** i panel Notify.
