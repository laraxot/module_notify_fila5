# da Support a Actions — Filosofia

> **Aggiornato 2026-07-12:** `app/Support/` è **eliminato** nel modulo Notify. Canonico: [wiki/concepts/no-app-support-queueable-actions.md](wiki/concepts/no-app-support-queueable-actions.md).

## Principio (post-migrazione)

Tutta la logica di dominio vive in **`app/Actions/`** (Spatie `QueueableAction` + `execute()`).

| Tipo | Path canonico |
|------|----------------|
| Unità di business (sync/queue) | `app/Actions/*Action.php` |
| Facade multi-metodo / coordinator | `app/Adapters/` |
| DTO / config tipizzata | `app/Datas/` |

**Vietato** ricreare `app/Support/` per helper, formatter, resolver o delivery push/mail.

## Distinzione

| Categoria | Esempi | Directory |
|-----------|--------|-----------|
| **Actions** | Invio push, mail Mailtrap, dispatch notifiche | `Actions/` |
| **Adapters** | Facade che delega a più Actions | `Adapters/` |
| **Datas** | Config immutabile, registry costanti | `Datas/` |

## Spatie QueueableAction

Tutte le classi in `app/Actions/` DEVONO:

1. Usare `Spatie\QueueableAction\QueueableAction`
2. Esporre un metodo `execute()` come entry point principale
3. Avere suffisso `*Action` (salvo eccezioni documentate nel modulo)

## Cosa abbiamo spostato (2026-07-12)

| Legacy | Destinazione |
|--------|--------------|
| `app/Support/PushNotificationPlatformDelivery.php` | `app/Actions/PushNotificationPlatformDelivery.php` |
| `app/Support/MailEngines/MailtrapEngine` | `app/Actions/Mail/SendMailtrapMailAction.php` |

## Collegamenti

- [no-app-support-queueable-actions](wiki/concepts/no-app-support-queueable-actions.md)
- [claude-audit-static](wiki/concepts/claude-audit-static.md)
- Issue [#372](https://github.com/laraxot/base_fixcity_fila5/issues/372) · Discussion [#273](https://github.com/laraxot/base_fixcity_fila5/discussions/273)
