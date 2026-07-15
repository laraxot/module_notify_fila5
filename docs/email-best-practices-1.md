---
title: "Best Practices per il Sistema Email"
type: concept
tags: [email, best, practices]
created: 2026-07-14
updated: 2026-07-14
qmd: "email-best-practices-1 best practices per il sistema email"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
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

# Best Practices per il Sistema Email

## Migrazioni Database

### Struttura Standard
- Utilizzare sempre `XotBaseMigration` come base
- Implementare modifiche nella sezione `tableUpdate`
- Non creare nuove migrazioni per modifiche a tabelle esistenti

### Gestione Campi
- Verificare l'esistenza delle colonne prima di modificarle
- Utilizzare i metodi helper forniti da `XotBaseMigration`
- Documentare tutte le modifiche alle strutture

### Compatibilità
- Mantenere la retrocompatibilità
- Gestire correttamente i rollback
- Testare le migrazioni in ambiente di sviluppo 
