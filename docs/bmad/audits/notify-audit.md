---
title: "Audit approfondito modulo Notify"
type: audit
status: review
updated: 2026-11-16
module: Notify
qmd: "audit approfondito Notify inventario PHPStan Pest policy Filament Actions"
---

# Audit approfondito — Notify

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 254 |
| Test PHP | 170 |
| Models (`app/Models/*.php`) | 18 |
| Policy files (approx) | 22 |
| Resource Filament | 6 |
| Actions | 53 |
| Services | 0 |
| Migration | 30 |
| Lang IT files | 179 |
| Marker conflitto | 0 |
| Occorrenze `return true` in Policy | 0 |
| Ratio test/app | 0.67 |

## Scopo (da docs esistenti / codice)

## Lo scopo in una frase **Notify e' il solo punto da cui la piattaforma parla con una persona: separa il *fatto* che qualcosa e' accaduto dal *come* glielo si dice.**

## Finding preliminari (da inventario)

- Nessun finding automatico critico dall'inventario; completare review sicurezza/runtime con story dedicate.

## Finding approfonditi (codice)

- **P1** Doppio orchestratore `NotificationManager` + `SendNotificationAction`; errori canale swallow.
- **P1** Doppione `NormalizePhoneNumberAction` (root vs SMS/).
- **P2** Modelli orfani `Theme` / `EmailTemplate` senza BaseModel/connection.
- ~54 Actions, 0 Services; policy spesso shell.

## Gate

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Notify
# Pest solo fuori da 10.100.200.15 e con DB testing raggiungibile
./vendor/bin/pest Modules/Notify/tests --no-coverage
```

PHPStan `Modules` (2026-11-16): **0 errori** sul tree completo.

## Piano

Vedi [piano-miglioramento.md](../piano-miglioramento.md).

## Riferimenti

- [audit.md](../audit.md)
- [ECC](../../ecc/notify-ecc-audit.md)
- [Story](../stories/module-bmad-audit.story.md)
