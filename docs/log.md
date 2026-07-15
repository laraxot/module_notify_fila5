---
title: "Wiki Log"
type: concept
tags: [log]
created: 2026-07-14
updated: 2026-07-14
qmd: "log wiki log"
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

# Wiki Log

Registro cronologico delle operazioni sulla wiki.
Formato: `## [YYYY-MM-DD] tipo | Descrizione`

## Convenzioni

- **ingest**: Aggiunta di nuovi sorgenti o creazione di pagine
- **query**: Domande e risposte salvate
- **lint**: Controllo salute e manutenzione
- **update**: Aggiornamento di pagine esistenti
- **refactor**: Ristrutturazione della wiki

## Istruzioni per l'LLM

Quando esegui un'operazione:
1. Appendi un entry in questo formato
2. Usa timestamp ISO 8601
3. Includi link alle pagine create/aggiornate

---

## [2026-04-15] bootstrap | Initial Wiki Setup

- Creato schema [[.schema/WIKI_SCHEMA.md]]
- Creato [[wiki/index.md]] con struttura
- Create cartelle `wiki/` e `raw/` per:
  - Root `docs/`
  - Tutti i moduli in `laravel/Modules/*/docs/`
  - Tutti i temi in `laravel/Themes/*/docs/`

---

<!-- Aggiungi nuove entries qui -->

## [2026-04-16] update | PHPStan module workflow governance

- Aggiunto [[wiki/concepts/phpstan-central-config-rule.md]]
- Aggiornato [[wiki/index.md]]
- Registrata la regola operativa: usare sempre `cd laravel && ./vendor/bin/phpstan analyse Modules/<ModuleName>` con config centrale `laravel/phpstan.neon`

## [2026-04-16] update | PHPStan full-project-first rule

- Aggiornato [[wiki/concepts/phpstan-central-config-rule.md]]
- Registrata la regola operativa: validare prima l'intero progetto con `cd laravel && ./vendor/bin/phpstan analyse`
- Solo se il rumore è troppo alto, scendere a validazione modulo per modulo
