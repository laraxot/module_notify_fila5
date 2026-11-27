---
title: "Notify Module Documentation"
type: index
tags: [notify, docs]
module: Notify
created: 2026-07-20
updated: 2026-11-23
qmd: "notify documentazione index notify module documentation"
issues:
  - "https://github.com/laraxot/module_notify_fila5/issues/81"
related:
  - ../README.md
  - notifications/README.md
  - contracts/index.md
  - adr/index.md
---
# Notify Module Documentation

## Overview
Indice centrale della documentazione del modulo Notify: notifiche
multi-canale (email, SMS, WhatsApp, Telegram, push) in modo modulare
e riusabile.

## Principi chiave
1. **Modularita'**: modulo riusabile tra progetti, funzionalita' generica.
2. **Estendibilita'**: nuovi canali senza toccare il core.
3. **Affidabilita'**: error handling e logging robusti.

## Indice

- [Scopo](./scopo.md)
- [Architettura](./architecture.md) · [struttura progetto](./project-structure.md)
- [Sistema email database](./database-mail-system.md)
- [Layout email](./mail-layouts-guide.md) · [migrazione template](./mail-template-migration-guide.md)
- [Design email moderne](./modern-email-design-patterns.md)
- [Provider di notifica](./notification-providers-guide.md)
- [Configurazione SMS](./sms_config_structure.md)
- [Spatie Email](./spatie-email-usage-guide.md)
- [Traduzioni](./notify-translation-guide.md)
- [Funzionalita' mancanti](./missing-features.md)
- [Roadmap miglioramenti](./roadmap-miglioramenti.md)
- [Changelog](./CHANGELOG.md)

## Canali di notifica

- [Panoramica](./notifications/README.md) · [multi-canale](./notifications/multi_channel_notifications.md)
- [SMS](./notifications/sms_implementation_details.md) · [Telegram](./notifications/telegram_notifications_guide.md)

## Contratti e decisioni

- [Contratti delle Action](./contracts/index.md) · [indice contratti](./contracts/INDEX.md)
- [ADR](./adr/index.md)

## Story attive

- [Story attive](./stories/) — solo story in corso; le story chiuse sono in
  `archive/docs-legacy/stories/`

## Archivio

Documentazione storica, generata e di sessione archiviata fuori da `docs/`:
`archive/docs-legacy/` (ai-agents, wiki, project_docs, phpstan, mail-templates,
project, github, report e appunti). Vedi `archive/docs-legacy/README.md`.
