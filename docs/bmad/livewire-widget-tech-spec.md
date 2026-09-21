---
title: "Tech spec — Notify FQCN"
type: tech-spec
module: Notify
related:
  - ./livewire-widget-prd.md
---

# Tech spec Notify

File unico PHP futuro: `app/Providers/Filament/AdminPanelProvider.php` blocco hook.

Target (non committare ora): `Blade::render('@livewire(\'' . DatabaseNotifications::class . '\')')` con `use` già presente. Polling e trigger invariati.

Test: `/admin` autenticato mostra campanella se flag off; nessun 500 se flag on (hook assente).
