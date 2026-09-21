<<<<<<< HEAD
---
id: module-notify-readme
title: "Notify — Consegna delle Comunicazioni Applicative"
type: module-readme
category: module-documentation
module: Notify
status: active
tags: [notify, notifications, channels, templates]
created: 2026-09-14
updated: 2026-09-14
qmd: "notify notifications mail push sms templates queue module documentation"
issues:
  - "https://github.com/laraxot/module_notify_fila5/issues/68"
discussions:
  - "https://github.com/laraxot/module_notify_fila5/discussions/69"
related:
  - "./docs/"
sources: []
---

=======
<<<<<<< HEAD
>>>>>>> 7e6063a3 (.)
# 📬 Notify

> **Consegna delle comunicazioni applicative.**

Trasporti e template; la decisione di notificare resta nel dominio.

## Cosa offre

- **template**
- **canali**
- **queue/retry**
- **eventi e stati**

## Confini architetturali

Questo modulo possiede le responsabilità elencate sopra e pubblica contratti riusabili agli altri moduli. La logica applicativa vive in Actions del modulo; l’interfaccia amministrativa segue le basi Laraxot/XotBase. Le dipendenze verso altri moduli devono restare esplicite e orientate verso contratti stabili.

<<<<<<< HEAD
## Integrazione rapida
=======
Scopo esteso, misure e mosse: [docs/scopo.md](docs/scopo.md).
=======
# 📬 Notify — il modulo che decide se il cittadino lo sa

[![PHP](https://img.shields.io/badge/PHP-%5E8.3-777BB4.svg)](../../composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-%5E13.0-FF2D20.svg)](../../composer.json)
[![Filament](https://img.shields.io/badge/Filament-%5E5.0-FDAB3D.svg)](composer.json)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max%2C%200%20errori-brightgreen.svg)](../../phpstan.neon)
[![strict_types](https://img.shields.io/badge/declare-strict__types%3D1-informational.svg)](#)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

> Un cambio di stato che nessuno notifica non è successo, dal punto di vista di
> chi aspetta. Notify è il modulo che chiude quel loop: email, SMS, WhatsApp,
> Telegram, push FCM — cinque canali diversi, un solo posto dove si decide chi
> viene avvisato di cosa.

Badge verificati l'1 settembre 2026 con `phpstan analyse Modules/Notify` (0
errori, `level: max` come da `phpstan.neon` di progetto — sacro, mai bypassato
con `-c` o `--level`). Rilanciabile: `cd laravel && ./vendor/bin/phpstan analyse Modules/Notify`.
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)

Il modulo è caricato dall’architettura modulare Laraxot. Per verificarne lo stato:

````bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/Notify
````

<<<<<<< HEAD
Per i test e le convenzioni operative, consultare la documentazione locale prima di introdurre nuove integrazioni.
=======
Un sistema che cambia stato in silenzio genera ticket duplicati, telefonate
all'ufficio e sfiducia — non perché il lavoro non sia stato fatto, ma perché
nessuno lo sapeva. Notify esiste per rendere quel gap strutturalmente
impossibile: ogni evento di dominio che dichiara "questo va comunicato" passa
di qui, non attraverso un `Mail::send()` scritto ad hoc dentro un controller.

## Logica
<<<<<<< HEAD
=======
## Perché esiste
>>>>>>> .merge_file_Bt5am7

Chiude il loop feedback: ogni cambio stato può diventare messaggio tracciabile.

## Superpoteri

- Template mail e layout modulari
- Integrazione eventi dominio ticket
- Filament per configurazione
- BMAD skills e tooling AI nel repo

## Certificazioni

| Certificazione | Stato |
|----------------|-------|
| PHPStan livello 10 | Target progetto |
| `declare(strict_types=1)` | Su nuovo codice PHP |
| Filament 5 + XotBase | Admin enterprise |
| Test PHPUnit / Pest | Suite modulo |
| Documentazione wiki | Cartella `docs/` |

## Vuoi entrare nel team?

Comunicazione **affidabile** = fiducia istituzionale. Qui si implementa.

Stack frontoffice: **Tailwind · Alpine · Lit · DaisyUI · Flowbite · Filament v5** — vedi [STORY-133](../../../docs/stories/STORY-133-frontend-stack-religion-tailwind-alpine-lit.md).

---
>>>>>>> 7e6063a3 (.)

## Documentazione

La mappa tecnica è in [docs/README.md](./docs/README.md).

- [Story BMAD del modulo](./docs/stories/)
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Le modifiche devono mantenere `declare(strict_types=1);` nel codice PHP, rispettare PHPStan configurato dal progetto e aggiornare la documentazione tecnica quando cambiano contratti, dipendenze o flussi. Le story BMAD restano accanto al codice del modulo per conservare ownership e contesto.

---

<<<<<<< HEAD
**Modulo** `notify` · **Laraxot ecosystem** · **Project-agnostic**
=======
<<<<<<< .merge_file_lkaMEP
**Modulo** `notify` · **Laraxot / FixCity Platform** · licenza MIT

---

## Scopo del modulo

Perche' esiste, come raggiungere meglio il suo scopo e cosa **non** gli appartiene:
[`docs/purpose.md`](./docs/purpose.md).
=======
**Modulo** `notify` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
**Modulo** `notify` · **Laraxot** · **Notify Platform** · PHPStan 10 · Filament 5
>>>>>>> .merge_file_Bt5am7
=======

Cinque canali (email, SMS, WhatsApp, Telegram, push FCM), un'unica interfaccia
verso il resto dei moduli. Chi genera la notifica non sa — e non deve sapere —
quale corriere la consegna: quella scelta è un dettaglio di configurazione
Filament, non una `if` sparsa nel codice applicativo.

## Filosofia

**Un canale che fallisce non deve far fallire gli altri quattro.** Rate
limiting per canale (`HasNotificationRateLimiting`, verificato: zero consumer
diretti nel repo perché è un trait pubblico di piattaforma, non debito morto —
vedi `docs/phpstan-ignore-audit.md`), retry isolati, nessun canale che blocca
la coda per colpa di un provider esterno lento.

## Religione

**Un numero senza il comando che l'ha prodotto non è un numero, è una
promessa.** Questo file dichiarava "PHPStan Level 10" — non è mai stato vero
in questo formato (il progetto usa `level: max`, non un intero) e "Laravel 12"
quando la dipendenza reale (ereditata dalla root) è `^13.0`. Non succede più:
ogni cifra qui sotto viene da un comando datato, eseguibile di nuovo.

## Politica

`laravel/phpstan.neon` è sacro — nessun agente lo tocca. Ogni verifica gira
nuda, senza override di livello, perché un numero ottenuto aggirando la
config del progetto non certifica niente del progetto.

## Zen

Cinque corrieri, un solo messaggio da consegnare per davvero: al cittadino,
non al log.

---

## Stato misurato — 1 settembre 2026

| Metrica | Valore | Comando |
|---|---:|---|
| File PHP / righe di codice | 720 / 54.927 | `find app -name '*.php' \| xargs wc -l` |
| File di test / casi | 126 / 823 | `./vendor/bin/pest Modules/Notify` |
| Copertura (Unit, misurata 27 ago) | **6.3 %** — bassa, dichiarata non nascosta | `docs/coverage.md` |
| PHPStan | **0 errori**, `level: max` | `./vendor/bin/phpstan analyse Modules/Notify` |
| `@phpstan-ignore` residui | 1, auditato e motivato | `docs/phpstan-ignore-audit.md` |
| PHPInsights — Code | 91.8 % | `./tools/phpinsights.sh Modules/Notify` |
| PHPInsights — Complexity | 100.0 % | idem |
| PHPInsights — Architecture | 85.7 % | idem |
| PHPInsights — Style | 87.7 % | idem |
| PHPMD su `app/` | 191 rilievi reali | `./tools/phpmd.sh Modules/Notify/app` |

La copertura al 6.3% è il numero più debole di questo modulo e non è
nascosto: 823 casi di test esistono, ma coprono a campione, non a fondo.
Dettaglio in [`docs/quality-audit.md`](docs/quality-audit.md) e
[`docs/coverage.md`](docs/coverage.md).

## Cosa contiene

- **Canali** — email (template DB via `spatie/laravel-database-mail-templates`),
  SMS, WhatsApp, Telegram (`irazasyed/telegram-bot-sdk`), push FCM
  (`kreait/laravel-firebase`, `laravel-notification-channels/fcm`).
- **Rate limiting** — `HasNotificationRateLimiting`, per evitare che un canale
  in errore spammi retry.
- **Filament** — configurazione notifiche via admin panel.

## Come si verifica (non fidarti di questo file)

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Notify          # 0 errori atteso
./tools/phpmd.sh Modules/Notify/app                  # NON la root del modulo
./tools/phpinsights.sh Modules/Notify
./vendor/bin/pest Modules/Notify
```

## Documentazione

| | |
|---|---|
| Audit di qualità (fonte dei numeri sopra) | [`docs/quality-audit.md`](docs/quality-audit.md) |
| Copertura test | [`docs/coverage.md`](docs/coverage.md) |
| Audit `@phpstan-ignore` | [`docs/phpstan-ignore-audit.md`](docs/phpstan-ignore-audit.md) |
| Wiki tecnica | [`docs/`](docs/) |

---

**Modulo** `notify` · **Laraxot / FixCity Platform** · licenza MIT
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
>>>>>>> 7e6063a3 (.)
