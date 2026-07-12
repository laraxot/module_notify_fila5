## [2026-07-12] deadcode | swarm — root duplicate Actions

- Rimosso `Actions/NormalizePhoneNumberAction.php` (root) — 0 consumer prod; canonico `SMS/NormalizePhoneNumberAction`
- Rimosso `Actions/NotificationManager.php` + test dedicato — 0 consumer prod (wrapper su `SendNotificationAction` mai chiamato)
- Rimosso `tests/Unit/Actions/NormalizePhoneNumberActionTest.php` (testava duplicato root)
- Issue [#372](https://github.com/laraxot/base_fixcity_fila5/issues/372)

## [2026-07-12] phpstan | PushNotificationPlatformDelivery — rimossi metodi topic duplicati

- Causa: stub multi-agente su `sendFCM/APNS/WebPushTopicNotification` accanto all’implementazione FCM HTTP
- Fix: una sola definizione; FCM topic reale, apns/webpush simulati con `topic` in response
- PHPStan Modules: 0 errori
- Doc: [concepts/no-app-support-queueable-actions.md](concepts/no-app-support-queueable-actions.md) § token vs topic

## [2026-07-12] security | rimossi dddx attivi (Wave F claude-audit)

- `SmtpMailSendAction`: `RuntimeException` al posto di `dddx('WIP')` (action non implementata)
- `EsendexSendAction`: rimosso `dddx($res)` dopo decode JSON
- `SendPushNotificationPage` / `SendPushNotification`: `Log::error` + Filament notification danger (pattern `SendFirebasePushNotificationPage`)
- `tests/Pest.php`: `uses(TestCase::class)->in('Feature','Unit')` per discovery static audit
- Audit static post-fix: **79/100** — HIGH residuo «No Tests Found» = falso negativo (135+ file in `tests/`)

## [2026-06-10] schema | notifications owner Notify — XotBaseMigration

- Canonico: `2026_06_10_133000_create_notifications_table.php`
- Vietato `create_notifications_table` in User/
- Doc: [concepts/notifications-database-contract.md](concepts/notifications-database-contract.md)

## [2026-06-05] docs | HackerNoon harness — tips 001-022 in wiki locale

- Stub/checklist: second-brain → canon Xot, ai-harness, [hackernoon map](../../../../../docs/wiki/concepts/hackernoon-ai-coding-tips-fixcity-map.md), [llm-wiki.txt](../../../../../bashscripts/tools/prompts/llm-wiki.txt)
- GitHub: [#272](https://github.com/laraxot/base_fixcity_fila5/issues/272) / [D#273](https://github.com/laraxot/base_fixcity_fila5/discussions/273)

---
title: "Notify Wiki Activity Log"
module: "Notify"
---

# Notify - Wiki Activity Log

## [2026-05-11] Wiki Structure Created

- Created wiki structure: rules/, skills/, commands/, memories/, concepts/
- Created INDEX.md for each section
- Created module index.md
- Ready for on-demand loading via QMD


- 2026-06-10: boundary Notify schema / User runtime — vietato create_notifications in User (XotBaseMigration only)

## 2026-06-10 — notifications schema owner

- Unica `create_notifications_table` in Notify; `model_class` = `User\Models\Notification`
- Solo `XotBaseMigration` — mai `extends Migration`
- Vietato duplicato in User/ (es. pattern `2026_07_02_*` con bigint morphs)
