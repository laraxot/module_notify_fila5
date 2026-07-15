---
title: "Collegamenti Documentazione Notify"
type: concept
tags: [collegamenti]
created: 2026-07-14
updated: 2026-07-14
qmd: "collegamenti collegamenti documentazione notify"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./acronym-naming-conventions-1.md"
  - "./actions-calling-actions-pattern.md"
  - "./advanced-template-system.md"
  - "./analisi-completa.md"
  - "./analisi-dettagliata-1.md"
  - "./analisi-dettagliata-2.md"
  - "./analisi-dettagliata-3.md"
  - "./analisi-dettagliata-4-1.md"
---

# Collegamenti Documentazione Notify

- [README Notify](readme.md)
- [Architettura del modulo](architecture.md)
- [CRUD Template Email Filament](crud-template-email-filament.md)
- [Panoramica Template Email](email-template-landscape.md)
- [Deep Dive Template Email](email-templates-deep-dive.md)
- [Analisi Tools Esterni](codebrisk-tools-analysis.md)
- [Collezione Tailwind CSS](webcrunch-tailwind-collection.md)
- [Queueable Actions](queueable-actions.md)
- [Filament Blade Components](filament-blade-components.md)

> In tutto <nome progetto>, non si usano Service class custom ma solo [spatie/laravel-queueable-action](https://github.com/spatie/laravel-queueable-action).
> Usa sempre i componenti Blade nativi di Filament (`<x-filament::...>`) – [Guida Filament](https://filamentphp.com/docs/3.x/support/blade-components/overview).
