---
type: decision-log
title: "Decision Log — Notify"
links: {github_issue: #XXX, discussion: #XXX}
---
# Decision Log — Notify

## Decisions

### 2026-10-08: Ripristino traduzioni e SendNetfunSMSAction regrediti dal re-import del 07/10
- **Choose**: Ripristinare dallo stato del monorepo al 06/10 `lang/it/{send_push_notification,send_whats_app,send_spatie_email,send_aws_email}.php` e `Actions/SMS/SendNetfunSMSAction.php` (torna `isSuccessfulResponse()`).
- **Over**: Tenere le versioni del commit `13c52bb06` (07/10 13:02, senza genitori).
- **Because**: Stesso re-import della voce precedente su `RecordNotification`/`SmsChannel`. Le traduzioni avevano perso da 1 a 39 voci, `send_aws_email` aveva il refuso "(AWS]". Nessun lavoro successivo sui file. Criterio: contenuto attuale identico byte per byte a una versione più vecchia già sostituita; per ogni file controllata la storia completa (`--full-history`) per non perdere commit successivi.
- **Verifica**: `php -l`; PHPStan su `Modules` senza errori in Notify; test prima/dopo identici.

### 2026-10-08: Ripristino fix inviti/SMS persi nel re-import del 07/10
- **Choose**: Ripristinare verbatim `Notifications/RecordNotification.php` da `db4fc2482` (06/10) e `Channels/SmsChannel.php` da `b265a033c` (24/09), le ultime versioni con i fix.
- **Over**: Riscrivere i fix a mano, o adattare `UpdateContactInviteCountersListener` (Quaeris) a una firma senza `getRecord()`.
- **Because**: Il re-import `89ae0b10a` (07/10, nuovo commit radice, 4875 file) partiva da una copia vecchia e ha tolto:
  - `RecordNotification::getRecord()`: il listener Quaeris su `NotificationSent` andava in errore fatale *dopo* l'invio. Contatori `mail_count`/`sms_count`/`*_sent_at` mai scritti, filtro anti-doppio-invio di `SendInviteAction` cieco, job fallito con email già partita.
  - Il guard `trim($smsBody) === ''` in `toSms()`: un survey senza `sms_template` spediva un SMS vuoto al gateway (Difetto 17/AC7, story Quaeris `quaeris-send-invite-migrate-to-record-notification.md`).
- **Nota**: la metà `SmsChannel` dello stesso Difetto 17 (`$smsData === null` → `return null`) mancava già dal 24/09, anche in `db4fc2482`: con il solo guard, l'SMS vuoto non partiva ma il job lanciava *toSms method must return an instance of SmsData*. Vanno insieme.
- **Rispetto al file corrente**: in `RecordNotification` torna anche `$fallbackTo` (camelCase del 21/09); in `SmsChannel` il diff è solo il blocco `null`.
- **Verifica**: `php -l` e PHPStan puliti, sparito il `method.notFound` del listener Quaeris; `SmsChannel::send()` con `toSms()` = `null` restituisce `null` senza eccezione; test Quaeris del listener e di `SendInviteAction` verdi. I test Unit di Notify lanciati dalla root falliscono per bootstrap (*Target class [config] does not exist*): `tests/Pest.php` del modulo non viene caricato, indipendente da questo fix.
- **Rischio aperto**: il fix vive nel working tree finché non arriva su `laraxot/module_notify_fila5`; un nuovo pull lo ricancella. È la terza perdita (29/09 e 07/10 le precedenti). Il resto del re-import non è stato verificato.

## Open Questions

