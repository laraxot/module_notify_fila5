---
title: "Mixed (tipo di dato) - Solo come Ultima Spiaggia"
type: concept
tags: [mixed, type, ultima, spiaggia]
created: 2026-07-14
updated: 2026-07-14
qmd: "mixed-type-ultima-spiaggia mixed (tipo di dato) - solo come ultima spiaggia"
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

# Mixed (tipo di dato) - Solo come Ultima Spiaggia

**Regola critica**: Il tipo `mixed` in PHP deve essere usato **SOLO come ultima spiaggia**.

## Preferenze (in ordine)

1. **Union types** - `string|int|null`
2. **Generics** - `Collection<int, User>`, `array<string, Component>`
3. **Interfacce** - `ArrayAccess`, `Iterator`
4. **Classi base** - `object`, `array`
5. **mixed** - solo quando non esiste alternativa (es. API esterne senza tipo garantito)

## Collegamenti

- [array-keys-mixed-property-exists.mdc](../.cursor/rules/array-keys-mixed-property-exists.mdc)
- [filament-array-typing.mdc](../.cursor/rules/filament-array-typing.mdc)
- [critical-rules-and-memories](../laravel/Modules/Xot/docs/critical-rules-and-memories.md)
- [AGENTS.md](../AGENTS.md)
