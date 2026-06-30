# Ponytail audit — Notify (over-engineering)

**Ultimo run:** 2026-06-30  
**Modulo:** notifiche multi-canale.  
**Hub:** [../../../../docs/audit/ponytail-audit.md](../../../../docs/audit/ponytail-audit.md)  
**Remediation:** [../../../../docs/project/ponytail-audit-remediation.md](../../../../docs/project/ponytail-audit-remediation.md)  
**GitHub monorepo:** [Issue #221](https://github.com/laraxot/base_predict_fila5/issues/221) · [Discussion #222](https://github.com/laraxot/base_predict_fila5/discussions/222) · [Discussion #228](https://github.com/laraxot/base_predict_fila5/discussions/228)

## Scopo business

Notify invia messaggi su canali configurati (email, SMS, push, …). Il driver attivo deve essere **uno per ambiente**; molti provider in codice senza uso in produzione è complessità senza valore.

## Findings

| # | Tag | Cosa tagliare | Sostituzione | Path |
|---|-----|---------------|--------------|------|
| N1 | `yagni` | 8 action SMS + test (~881 righe) per 7 driver quando `config/sms.php` default è `smsfactor` | Interfaccia + impl del driver attivo + switch config | `app/Actions/SMS/`, `tests/Unit/Actions/SMS/` |
| N2 | `yagni` | 3 varianti Agiletelecom (`SendAgiletelecomSMSAction`, `v1`, `v2`) | Una impl; versione API in config | `app/Actions/SMS/SendAgiletelecom*` |
| N3 | `delete` | `Contracts\SmsActionContract` root (0 import) | Solo `Contracts\SMS\SmsActionContract` | `app/Contracts/SmsActionContract.php` |
| N4 | `delete` | `SmsProviderContract` (0 implementazioni) | `SmsActionContract` | `app/Contracts/SmsProviderContract.php` |
| N6 | `delete`→`.bak` | `Modules.bak/` (doc Xot annidato per errore) | Spostare in Xot/wiki o archivio | `Modules.bak/` |
| N7 | `delete`→`.bak` | Scaffolding agent `_bmad/`, `.planning/` (~2k file) | Wiki in `docs/wiki/` o repo tooling | `_bmad/`, `.planning/` |

## ⛔ Fuori perimetro (non tagliare)

| Area | Motivo |
|------|--------|
| `app/Models/Policies/*Policy.php` | Contratto Laravel/Filament per modello — anche `extends NotifyBasePolicy {}` senza metodi. Vedi [Job: model-policy-laravel-contract](../../Job/docs/wiki/concepts/model-policy-laravel-contract.md). |

## Contesto config

`config/sms.php` imposta `default => smsfactor`. Gli altri driver sono opzionali: tenere solo quelli **effettivamente** configurati in produzione.

## Azione proposta

Dopo discussione: rename `.bak` su provider non usati, non delete. Verificare invio SMS con Pest + quality gate.

## Collegamenti

- [provider-actions-architecture.md](./provider-actions-architecture.md)
- [composer-dependencies.md](./composer-dependencies.md)
- [Xot Notify hub](../../Xot/docs/ponytail-audit-over-engineering.md)
