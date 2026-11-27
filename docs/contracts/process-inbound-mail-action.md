---
title: "Contratto — ProcessInboundMailAction"
type: contract
<<<<<<< HEAD
action: "Modules\Notify\Actions\Mail\ProcessInboundMailAction"
tags: [contract, action, notify, inbound, webhook, email]
created: 2026-11-24
updated: 2026-11-24
=======
action: "Modules\\Notify\\Actions\\Mail\\ProcessInboundMailAction"
module: Notify
status: accepted
tags: [contract, action, notify, mail, inbound, webhook]
created: 2026-11-26
updated: 2026-11-26
related:
  - ../adr/0004-webhooks-authenticate-with-a-token-in-the-path.md
>>>>>>> laraxot/dev
---

# ProcessInboundMailAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
<<<<<<< HEAD
Sorgente: `app/Actions/Mail/ProcessInboundMailAction.php`. Decisione: [token nel percorso](../adr/webhooks-authenticate-with-a-token-in-the-path.md).

## Input

- `POST /api/inbound/{provider}/{token}` (rotta `notify.inbound`, `routes/api.php`).
- Payload riconosciuti, in quest'ordine: Postmark JSON (`MessageID`/`FromFull`), Mailgun form (`sender`/`body-mime`), MIME grezzo
  (`Content-Type: message/rfc822` o corpo che inizia con `From:`).
- Config: `notify.notify.inbound_token` (`MAIL_INBOUND_TOKEN`).

## Output

- `401 {"error":"unauthorized"}` con token errato o non configurato.
- `422 {"error":"unparseable"}` se il payload non è riconosciuto.
- `200 {"ok": true}` dopo il salvataggio.
=======
Sorgente: `app/Actions/Mail/ProcessInboundMailAction.php`. Webhook della posta in arrivo
(`POST /api/inbound/{provider}/{token}`): salva in `inbound_emails` il messaggio e il raw `.eml`.

## Input

- `Request $request`: payload Postmark (JSON), Mailgun (form) oppure MIME grezzo
  (`Content-Type: message/rfc822` o body che inizia con `From:`).
- `string $provider`: segmento del percorso (`postmark`, `mailgun`, ...), usato come chiave di dedup.
- Token nel percorso confrontato con `notify.notify.inbound_token`.

## Output

- `401` se il token non coincide o non e' configurato.
- `422 {"error":"unparseable"}` se il payload non e' riconosciuto da nessun parser.
- `200 {"ok":true}` dopo `updateOrCreate` su `inbound_emails`.
>>>>>>> laraxot/dev

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< HEAD
| NOTIFY-INBOUND-INV-1 | Token confrontato con `hash_equals`; token non configurato = 401 per tutti, prima di leggere il payload. | `NOTIFY-INBOUND-INV-1` |
| NOTIFY-INBOUND-INV-2 | Un messaggio è una riga di `inbound_emails` per (`provider`, `message_id`): la ritrasmissione aggiorna, non duplica. | — |
| NOTIFY-INBOUND-INV-3 | Un payload non riconosciuto non scrive nulla (né file né riga) e risponde 422. | — |
| NOTIFY-INBOUND-INV-4 | La riga salvata ha `status = 'received'` e `received_at`. | — |

Debito: INV-2 e INV-4 sono provate da `tests/Feature/InboundMailWebhookTest.php` («stores postmark payload», «is idempotent on
message id»), oggi rosse nel DB di prova condiviso (manca la tabella `inbound_emails`): i group si aggiungono quando tornano verdi.

## Effetti collaterali

- Il corpo grezzo (o `body-mime`) su disco `local` in `inbound/{provider}/AAAA/MM/GG/<uuid>.eml`, se non vuoto; il percorso in `raw_path`.
- `InboundEmail::updateOrCreate` sulla connessione `notify`.
- `Log::warning('notify.inbound.parse_failed')` quando il payload non si legge.

## Errori

- Errori di parsing → 422 (non escono). Errori di disco o database → eccezione al framework (500, il provider riprova).

## Non fa

- Non deduplica i file: ogni ritrasmissione scrive un nuovo `.eml`, anche quando la riga viene solo aggiornata.
- Con `message_id` nullo la chiave diventa (`provider`, NULL): un secondo messaggio senza ID aggiorna la stessa riga (comportamento
  del codice com'è, da non imitare).
- Non smista né risponde ai messaggi e non crea entità di dominio: lo fa il progetto leggendo `inbound_emails`.
- Non cancella mai i `.eml` né le righe: la conservazione dei dati personali va decisa dal progetto.
- Non valida il `{provider}` dell'URL: è solo un'etichetta.
=======
| NOTIFY-INBOUND-INV-1 | Token assente o errato → 401, nessuna scrittura. | NOTIFY-INBOUND-INV-1 |
| NOTIFY-INBOUND-INV-2 | Dedup per `(provider, message_id)` via `updateOrCreate`: un reinvio aggiorna la stessa riga e `received_at`/`status='received'`. Limite noto: il test prova una sola riga dopo due invii, non l'aggiornamento di `received_at` e `status`. | NOTIFY-INBOUND-INV-2 |
| NOTIFY-INBOUND-INV-3 | Il raw MIME e' salvato su `Storage::disk('local')` in `inbound/{provider}/Y/m/d/{uuid}.eml` e il path finisce in `raw_path`; body vuoto → `raw_path` null. | — (non dimostrato) |
| NOTIFY-INBOUND-INV-4 | Payload non riconosciuto (non Postmark/Mailgun/MIME) → 422 e nessuna riga creata. | — (non dimostrato) |

## Effetti collaterali

- `INSERT`/`UPDATE` su `inbound_emails`.
- Scrittura file su disco locale (`inbound/...`).
- `Log::warning('notify.inbound.parse_failed')` sui payload non parsabili.

## Errori

- `401` — token errato o `inbound_token` non configurato.
- `422` — payload non interpretabile.

## Non fa

- Non instrada la posta verso altri moduli: salva e basta (l'eventuale smistamento e' del progetto).
- Non pulisce gli `.eml`: la retention e' una policy esterna.
- Non invia email: e' solo il lato in ingresso.
>>>>>>> laraxot/dev
