---
title: "Audit BMAD — Notify"
type: audit
status: review
updated: 2026-11-16
module: Notify
qmd: "audit BMAD Notify source-first qualità"
---

# Audit BMAD — Notify

SSoT dettagliata: [audits/notify-audit.md](./audits/notify-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 254 |
| Test | 170 |
| Resources | 6 |
| Actions | 53 |
| Services | 0 |
| Policy `return true` | 0 |
| Marker | 0 |

## Lo scopo in una frase **Notify e' il solo punto da cui la piattaforma parla con una persona: separa il *fatto* che qualcosa e' accaduto dal *come* glielo si dice.**

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
