---
title: "no app/Support — business logic in QueueableAction"
type: concept
tags: [notify, actions, queueable-action, support, refactor, push, mail]
created: 2026-07-12
updated: 2026-07-12
qmd: "Notify module no app Support QueueableAction push mail Mailtrap"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - ../../../../docs/wiki/rules/queueable-action-trait-mandatory.md
  - claude-audit-static.md
---

# no `app/Support/` — business logic in QueueableAction

## Scopo

Nel modulo Notify **non** esiste più `app/Support/`. Ogni helper con comportamento di dominio è sotto `app/Actions/`.

## Migrazione (2026-07-12)

| Legacy `app/Support/` | Destinazione |
|----------------------|--------------|
| `PushNotificationPlatformDelivery.php` (path errato, namespace già `Actions`) | `app/Actions/PushNotificationPlatformDelivery.php` |
| `MailEngines/MailtrapEngine` | `Actions/Mail/SendMailtrapMailAction` |

## Perché

- **Path = namespace:** `PushNotificationPlatformDelivery` era in `Support/` ma namespace `Modules\Notify\Actions` — incoerenza PSR-4
- **Single-purpose:** invio mail Mailtrap → `SendMailtrapMailAction::execute()`
- **Orchestrazione push:** `SendPushNotificationAction` delega a `PushNotificationPlatformDelivery` (multi-piattaforma, resta Action con `QueueableAction`)

## `PushNotificationPlatformDelivery` — token vs topic

| Metodo pubblico | Uso | Piattaforme |
|-----------------|-----|-------------|
| `sendToPlatform($platform, $token, …)` | singolo device | fcm, apns, webpush |
| `sendTopicToPlatform($platform, $topic, …)` | broadcast su topic FCM `/topics/{name}` | fcm (HTTP reale), apns/webpush (simulati) |
| `sendBatchToPlatform` | loop token + aggregazione success/fail | tutte |

**Regola multi-agente:** non aggiungere stub `send*TopicNotification` se esiste già l’implementazione — causa `class.duplicateMethod` PHPStan. Una sola definizione per metodo privato; FCM topic usa payload `to: /topics/{topic}`.

Chiamata tipica: `SendPushNotificationAction` → `new PushNotificationPlatformDelivery()` (DI opzionale nel costruttore).

## Collegamenti

- [claude-audit-static.md](claude-audit-static.md)
- [queueable-action-trait-mandatory](../../../../docs/wiki/rules/queueable-action-trait-mandatory.md)
