---
title: "Regole di Estensione delle Classi Filament"
type: rule
tags: [filament, extension, rules]
created: 2026-07-14
updated: 2026-07-14
qmd: "filament-extension-rules regole di estensione delle classi filament"
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

# Regole di Estensione delle Classi Filament

## Regola Fondamentale

**MAI** estendere direttamente classi di Filament. Utilizzare **SEMPRE** le classi wrapper con prefisso `XotBase` fornite dal modulo `Xot`.

## Mappatura Classi Corretta

| ❌ Classe Filament (NON USARE) | ✅ Classe XotBase (DA USARE) |
|-------------------------------|----------------------------|
| `\Filament\Pages\Page` | `\Modules\Xot\Filament\Pages\XotBasePage` |
| `\Filament\Resources\Resource` | `\Modules\Xot\Filament\Resources\XotBaseResource` |
| `\Filament\Resources\Pages\CreateRecord` | `\Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord` |
| `\Filament\Resources\Pages\EditRecord` | `\Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord` |
| `\Filament\Resources\Pages\ListRecords` | `\Modules\Xot\Filament\Resources\Pages\XotBaseListRecords` |
| `\Filament\Widgets\Widget` | `\Modules\Xot\Filament\Widgets\XotBaseWidget` |

## Esempi

### ❌ Errato
```php
use Filament\Pages\Page;

class SendSMSPage extends Page
{
    // ...
}
```

### ✅ Corretto
```php
use Modules\Xot\Filament\Pages\XotBasePage;

class SendSMSPage extends XotBasePage
{
    // ...
}
```

## Motivazione

1. **Consistenza**: Garantisce un approccio uniforme in tutto il progetto
2. **Estensibilità**: Le classi XotBase aggiungono funzionalità specifiche del progetto
3. **Centralizzazione**: Modifiche al comportamento di Filament possono essere gestite in un unico punto
4. **Adattabilità**: Facilita futuri aggiornamenti di Filament isolando le dipendenze dirette

## Vantaggi del Pattern di Wrapper

1. **Traduzione Automatica**: Le classi XotBase integrano automaticamente il sistema di traduzione
2. **Gestione Tenant**: Supporto integrato per multi-tenancy
3. **Sicurezza**: Controlli di autorizzazione centralizzati
4. **Logging**: Tracciamento uniformato delle azioni
5. **Configurazione**: Impostazioni standardizzate

## Verifica

Per verificare che tutte le classi seguano questa regola:

```bash
find /var/www/html/saluteora/laravel/Modules -path "*/Filament/*/*.php" -type f -exec grep -l "extends.*Filament" {} \;
```

Le pagine che violano questa regola devono essere immediatamente corrette per mantenere l'integrità dell'architettura.
