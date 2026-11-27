---
title: "Contratto — HandleMailjetEventsAction"
type: contract
<<<<<<< HEAD
action: "Modules\Notify\Actions\Mail\Mailjet\HandleMailjetEventsAction"
tags: [contract, action, notify, mailjet, webhook]
created: 2026-11-24
updated: 2026-11-24
=======
action: "Modules\\Notify\\Actions\\Mail\\Mailjet\\HandleMailjetEventsAction"
module: Notify
status: accepted
tags: [contract, action, notify, mailjet, webhook, eventi]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0001-mail-delivery-outcomes-are-events.md
  - ../adr/0004-webhooks-authenticate-with-a-token-in-the-path.md
>>>>>>> laraxot/dev
---

# HandleMailjetEventsAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
<<<<<<< HEAD
Sorgente: `app/Actions/Mail/Mailjet/HandleMailjetEventsAction.php`. Studio e integrazione: `docs/email/mailjet.md`.
Decisioni: [token nel percorso](../adr/webhooks-authenticate-with-a-token-in-the-path.md),
[esiti come evento](../adr/mail-delivery-outcomes-are-events.md).

## Input

- `POST /api/notify/mailjet/events/{token}` (rotta `notify.mailjet.events`, `routes/api.php`).
- Corpo JSON: un evento Mailjet oppure una lista (raggruppamento attivo nel pannello Mailjet).
- Config: `notify.notify.mailjet_webhook_token` (`MAILJET_WEBHOOK_TOKEN`).

## Output

- `401 {"error":"unauthorized"}` se il token non coincide o non è configurato.
- Altrimenti `200 {"handled": <n>}`, con `n` = eventi validi.
=======
Sorgente: `app/Actions/Mail/Mailjet/HandleMailjetEventsAction.php`. Webhook degli esiti Mailjet
(`POST /api/notify/mailjet/events/{token}`): traduce ogni evento in `MailDeliveryEventData` e
lancia `MailDeliveryEventReceived`; non scrive nulla.

## Input

- `Request $request`: body JSON, un evento singolo oppure una lista (raggruppamento Mailjet).
- `string $token`: segmento del percorso, confrontato con `notify.notify.mailjet_webhook_token`.

## Output

- `JsonResponse`: `401 {"error":"unauthorized"}` se il token non coincide o non e' configurato;
  `200 {"handled": N}` altrimenti, con `N` = eventi validi gestiti (quelli ignoti non contano).
>>>>>>> laraxot/dev

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< HEAD
| NOTIFY-MAILJET-INV-1 | Token confrontato con `hash_equals`; token non configurato o vuoto = 401 per tutti, e nessun evento parte. | `NOTIFY-MAILJET-INV-1` |
| NOTIFY-MAILJET-INV-2 | Accetta sia un oggetto sia una lista; gli elementi non oggetto o senza `event`/`email` validi si saltano. | `NOTIFY-MAILJET-INV-2` |
| NOTIFY-MAILJET-INV-3 | `permanent` vale per hard bounce, `blocked`, `spam`, `unsub`; mai per `sent`, `open`, `click`, soft bounce. | `NOTIFY-MAILJET-INV-3` |
| NOTIFY-MAILJET-INV-4 | Tipi sconosciuti non sono un errore: risposta 200 (altrimenti Mailjet riprova ogni 30 s per 24 h e poi sospende l'URL). | `NOTIFY-MAILJET-INV-4` |

Test: `tests/Feature/MailjetEventsWebhookTest.php`.

## Effetti collaterali

- Un `MailDeliveryEventReceived` (con `MailDeliveryEventData`, `provider = 'mailjet'`) per ogni evento valido.
- `Log::warning('notify.mailjet.permanent_failure')` per ogni evento definitivo, con email, motivo e `custom_id`.

## Errori

- Nessuna eccezione per payload strani: si saltano. Un listener sincrono che lancia fa uscire l'eccezione (500): Mailjet riprova.

## Non fa

- Non scrive nel database: cosa fare di un esito (segnare un'email non valida, ritentare) lo decide il progetto ascoltando l'evento.
- Non deduplica: un evento ritrasmesso da Mailjet arriva due volte ai listener.
- Non verifica firme né IP di provenienza: l'unica autenticazione è il token.
- Non manda email (`CreateMailjetTransportAction` è il trasporto in uscita).
=======
| NOTIFY-MAILJET-INV-1 | Token errato, mancante o non configurato → 401 per tutti (`hash_equals`, niente fallback). | NOTIFY-MAILJET-INV-1 |
| NOTIFY-MAILJET-INV-2 | Ogni evento con `event` in `sent,delivered,open,click,bounce,blocked,spam,unsub` e `email` non vuota produce esattamente un `MailDeliveryEventReceived` con `provider='mailjet'`. | NOTIFY-MAILJET-INV-2 |
| NOTIFY-MAILJET-INV-3 | `permanent` e' vero solo per `blocked`, `spam`, `unsub` e per `bounce` con `hard_bounce === true`; i permanenti finiscono anche in `Log::warning('notify.mailjet.permanent_failure')`. | NOTIFY-MAILJET-INV-3 |
| NOTIFY-MAILJET-INV-4 | Eventi sconosciuti, malformati o non-array → 200 lo stesso: Mailjet sospende l'URL se riceve errori. | NOTIFY-MAILJET-INV-4 |

## Effetti collaterali

- `MailDeliveryEventReceived::dispatch($event)` per evento valido (il progetto ascolta).
- `Log::warning` per gli esiti permanenti.
- Nessuna scrittura su database.

## Errori

- `401` — token assente/invalido o `mailjet_webhook_token` non configurato.
- Nessun altro errore HTTP: i payload non interpretabili sono saltati.

## Non fa

- Non scrive tabelle: il modulo e' agnostico (vedi ADR 0001).
- Non deduplica eventi ritrasmessi da Mailjet.
- Non valida la firma del fornitore: l'autenticazione e' il token nel percorso (ADR 0004).
>>>>>>> laraxot/dev
