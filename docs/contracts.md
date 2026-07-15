---
title: "Contracts"
type: concept
tags: [contracts]
created: 2026-07-14
updated: 2026-07-14
qmd: "contracts contracts"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./-repos.md"
  - "./-todo.md"
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./AGENTS.md"
  - "./ANALISI-COMPLETA-.deprecated.md.md"
  - "./CHANGELOG.md"
related:
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./ANALISI-COMPLETA-2025-10-01.md"
  - "./COMPLETAMENTO-PROGETTO-2025-10-01.md"
  - "./DOCUMENTATION_IMPROVEMENT_SUMMARY_2026-03-13.md"
  - "./GITHUB_ISSUES_RECOMMENDATIONS_2026-03-02.md"
  - "./IMPLEMENTATION_SUMMARY_2025-01-27.md"
---

# Contracts

Questo documento contiene i collegamenti a tutte le interfacce principali del sistema.

## User Module

- [[HasTeamsContract]] - Interfaccia per la gestione dei team
  - Definisce i metodi per la gestione dei team
  - Utilizzata da [[BaseUser]]

- [[UserContract]] - Interfaccia base per gli utenti
  - Definisce i metodi base per gli utenti
  - Utilizzata da [[BaseUser]]

- [[HasTeamsAndUserContract]] - Interfaccia che combina HasTeamsContract e UserContract
  - Fornisce un'unica interfaccia per la gestione di team e utenti
  - Estende [[HasTeamsContract]] e [[UserContract]]

## Collegamenti Correlati

- [[Models]] - Modelli che implementano queste interfacce
- [[BaseUser]] - Implementazione principale delle interfacce 
