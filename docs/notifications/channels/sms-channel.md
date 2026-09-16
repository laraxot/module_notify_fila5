# `SmsChannel`

<<<<<<< HEAD
This document describes the `SmsChannel`, a custom Laravel Notification Channel designed to send SMS messages. It integrates with the application's phone number normalization logic and provides a placeholder for actual SMS gateway integration.

## Location

`laravel/Modules/Notify/app/Notifications/Channels/SmsChannel.php`

## Purpose

To provide a dedicated and extensible mechanism for sending SMS notifications via Laravel's Notification system. It ensures that phone numbers are normalized to a consistent format before sending and separates the SMS sending logic from the notification content generation.

## Key Features

*   **Custom Notification Channel:** Fully integrated into Laravel's Notification system.
*   **Phone Number Normalization:** Utilizes `Modules\Notify\Actions\NormalizePhoneNumberAction` to ensure recipient phone numbers are in a consistent, E.164-like format.
*   **Recipient Discovery:** Automatically attempts to retrieve the recipient's phone number from the `notifiable` model (via `phone` attribute or `routeNotificationForSms` method).
*   **Logging:** Logs SMS sending attempts for debugging and auditing purposes.
*   **Extensible:** Designed with a placeholder for integration with various third-party SMS gateway providers.

## Methods

### `send(object $notifiable, \Illuminate\Notifications\Notification $notification): void`

The primary method called by Laravel's Notification system to dispatch an SMS.

1.  Retrieves the SMS content by calling `$notification->toSms($notifiable)`.
2.  Discovers the recipient's phone number using `getRecipientPhoneNumber()`.
3.  If a recipient phone number is found, it normalizes it using `NormalizePhoneNumberAction`.
4.  Logs the SMS sending attempt.
5.  Contains a placeholder for integration with an actual SMS service provider.

### `getRecipientPhoneNumber(object $notifiable): ?string` (Protected)

A helper method to determine the phone number for the SMS recipient.

1.  Checks if the `$notifiable` object has a `phone` attribute.
2.  Checks if the `$notifiable` object has a `routeNotificationForSms()` method.
3.  Returns the discovered phone number as a string, or `null` if no phone number can be found.

## Usage

This channel is typically referenced in `ChannelEnum` and used by `RecordNotification`'s `via()` method.

## Adherence to Laraxot Principles

*   **DRY (Don't Repeat Yourself):** Centralizes SMS sending and phone number normalization logic.
*   **KISS (Keep It Simple, Stupid):** Provides a clear and focused responsibility for SMS dispatch.
*   **Separation of Concerns:** Clearly separates SMS transport logic from notification content.
*   **Modularization:** Resides within the `Notify` module, encapsulating notification-related functionality.

## Related Documentation

*   [`ChannelEnum` Documentation](`../../enums/channel-enum.md`)
*   [`RecordNotification` Documentation](`../record-notification.md`)
*   [`NormalizePhoneNumberAction` Documentation](`../../actions/normalize-phone-number-action.md`)
*   [Laravel Notifications Documentation](https://laravel.com/docs/master/notifications#custom-channels)
=======
Canale di notifica Laravel per l'invio di SMS. Non contiene la logica di
trasporto: sceglie il **driver** e delega alla sua `Send{Provider}SMSAction`.

> SSoT sul funzionamento e sulla storia (regressione + fix): il concept
> [../../wiki/concepts/sms-channel-driver-selection.md](../../wiki/concepts/sms-channel-driver-selection.md).
> Questo file è solo un riferimento rapido.

## Percorso

`laravel/Modules/Notify/app/Channels/SmsChannel.php`

(non `app/Notifications/Channels/` — lì c'è solo il legacy `NetfunChannel`
accoppiato a `ThemeNotification`.)

## Come arriva qui una notifica

`RecordNotification::via()` (e `ChannelEnum::Sms`, `Contact`) restituiscono
`SmsChannel::class`. Laravel risolve `app(SmsChannel::class)` → autowire di
`SmsActionFactory`.

## `send(object $notifiable, Notification $notification): ?array`

1. `$notification->toSms($notifiable)` → deve restituire uno `SmsData` (altrimenti
   `Exception`). `SmsData` porta `from` / `recipient` / `body` già pronti (il
   corpo lo compone chi implementa `toSms()`, es. `SpatieEmail::buildSms()` per
   `RecordNotification`).
2. Driver: se la notifica espone `getProvider(): ?string` (es. `SmsNotification`)
   usa quello; altrimenti `null`.
3. `SmsActionFactory::create($driver)` — con `$driver === null` la factory usa
   `config('sms.default')` (env `SMS_DRIVER`).
4. `->execute($smsData)` sull'azione del driver risolto.

Ritorna quello che ritorna `SmsActionContract::execute()` — di norma
`array{status_code: int, status_txt: string}`.

## `SmsActionFactory`

Mappa esplicita `driver => Send{Provider}SMSAction::class`:
`smsfactor`, `netfun`, `twilio`, `nexmo`, `plivo`, `gammu`, `agiletelecom`.
Alias: `smsfac → smsfactor`, `vonage → nexmo`. Un driver non mappato lancia
`Exception` chiara. Ogni `Send*SMSAction` legge la propria
`config('sms.drivers.<driver>')` e lancia se non configurata.

## Usare Netfun

`.env`: `SMS_DRIVER=netfun` + `NETFUN_TOKEN=...` (`config('sms.drivers.netfun')`).
Nessuna modifica al codice — vale anche per gli SMS di invito survey
(`SendInviteAction` → `RecordNotification` → `SmsChannel`).

## Correlati

- [`ChannelEnum`](../../enums/channel-enum.md)
- [`RecordNotification`](../record-notification.md)
- `NormalizePhoneNumberAction` — la normalizzazione E.164 vive dentro le
  `Send*SMSAction`, non in `SmsChannel`.
>>>>>>> laraxot/dev
