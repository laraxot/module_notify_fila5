<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> a988596b (first)
# 📬 Notify

[![Domain-Notify](https://img.shields.io/badge/Domain-Notifications-E65100.svg)](#)
[![Laravel 12](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com/)
[![Filament 5](https://img.shields.io/badge/Filament-5-ffab00.svg)](https://filamentphp.com/)
[![PHP 8.4+](https://img.shields.io/badge/PHP-8.4+-777BB4.svg)](https://php.net/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue.svg)](https://www.php-fig.org/psr/psr-12/)
[![Strict Types](https://img.shields.io/badge/PHP-strict__types-1-informational.svg)](#)
[![Laraxot Modules](https://img.shields.io/badge/Architecture-Modular-purple.svg)](#)
[![FixCity Platform](https://img.shields.io/badge/Platform-FixCity-008758.svg)](#)
[![Notify Platform](https://img.shields.io/badge/Platform-Notify-008758.svg)](#)

> **Il cittadino sa cosa succede al suo ticket.** Email, template, canali — orchestrazione notifiche enterprise.

---

<<<<<<< HEAD
<<<<<<< .merge_file_lkaMEP
## Scopo e confini

Notify è il livello di **trasporto** delle comunicazioni verso l'esterno: 46 Action, tutte
`QueueableAction`, organizzate per corriere (11 provider SMS, 8 push FCM, 4 WhatsApp,
4 mail, 3 Telegram) e non per contenuto. Sa come si consegna un messaggio; non sa perché
esista. Sei moduli lo consumano — IndennitaResponsabilita (9 file), Progressioni (6),
Xot (4), Ptv (3), Pdnd (2), User (1).

Il confine da non superare: **la decisione di notificare non è di Notify.** Nasce dove
sta lo stato (`Xot\States\Transitions\XotBaseTransition`, `Ptv\Actions\Scheda\SendMailByRecord`).
Oggi il confine interno più rotto è un altro: 3 modelli su 14 estendono
`Illuminate\...\Model` invece di `BaseModel` e finiscono fuori dalla connection `notify`,
e `docs/` pesa 804.192 righe contro 17.341 di `app/` — 46 a 1, con 83 gruppi di file
`.md` byte-identici.

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

---

## Scopo e confini

Notify è il livello di **trasporto** delle comunicazioni verso l'esterno: 46 Action, tutte
`QueueableAction`, organizzate per corriere (11 provider SMS, 8 push FCM, 4 WhatsApp,
4 mail, 3 Telegram) e non per contenuto. Sa come si consegna un messaggio; non sa perché
esista. Sei moduli lo consumano — IndennitaResponsabilita (9 file), Progressioni (6),
Xot (4), Ptv (3), Pdnd (2), User (1).

Il confine da non superare: **la decisione di notificare non è di Notify.** Nasce dove
sta lo stato (`Xot\States\Transitions\XotBaseTransition`, `Ptv\Actions\Scheda\SendMailByRecord`).
Oggi il confine interno più rotto è un altro: 3 modelli su 14 estendono
`Illuminate\...\Model` invece di `BaseModel` e finiscono fuori dalla connection `notify`,
e `docs/` pesa 804.192 righe contro 17.341 di `app/` — 46 a 1, con 83 gruppi di file
`.md` byte-identici.

Scopo esteso, misure e mosse: [docs/scopo.md](docs/scopo.md).

---

## Perché

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
=======
## Perché esiste
>>>>>>> a988596b (first)

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

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

<<<<<<< HEAD
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
<<<<<<< HEAD
>>>>>>> 3096f6ae (chore(gitattributes): sync dal prototipo canonico, no git-lfs [graft: broken parent 2c641c73 missing upstream, treated as root - local-only replace, not pushed])
=======

---

## Scopo del modulo

Perche' esiste, come raggiungere meglio il suo scopo e cosa **non** gli appartiene:
[`docs/purpose.md`](./docs/purpose.md).
>>>>>>> bdc49995 (.)
=======
**Modulo** `notify` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5
**Modulo** `notify` · **Laraxot** · **Notify Platform** · PHPStan 10 · Filament 5
>>>>>>> a988596b (first)
