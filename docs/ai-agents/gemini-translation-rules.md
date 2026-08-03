# GEMINI Translation Rules

Regole gestione traduzioni.

---

## Regola Critica

Tutti i file di traduzione per i moduli Laraxot (`Modules/{ModuleName}/lang/{locale}/{resource}.php`) DEVONO contenere le seguenti chiavi di primo livello:

### Chiavi Obbligatorie

- `navigation` (con sotto-chiavi: `label`, `plural_label`, `group`, `icon`, `sort`)
- `label`
- `plural_label`
- `fields` (con chiavi per ogni campo)
- `actions` (con chiavi per ogni azione)

### Esempio

```php
// Modules/User/lang/it/filters.php
return [
    'navigation' => [
        'label' => 'Utenti',
        'plural_label' => 'Utenti',
        'group' => 'Gestione',
    ],
    'fields' => [
        'name' => 'Nome',
        'email' => 'Email',
    ],
    // ...
];
```

### Perché Queste Chiavi?

Sono **fondamentali** per:
- Corretto funzionamento Filament
- Consistenza nell'interfaccia utente
- Navigazione del pannello admin

### Rischio

La loro **assenza o modifica non autorizzata** può causare errori e incoerenze.

---

## Translation Pattern

Tutte le traduzioni DEVONO avere **5 livelli**:

```
namespace::context.collection.element.type
```

### Esempio

```blade
<<<<<<< HEAD
✅ __('forecast::home.hero.cta_learn.label')
❌ __('forecast::fields.key')  // Missing type!
=======
✅ __('predict::home.hero.cta_learn.label')
❌ __('predict::fields.key')  // Missing type!
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
```

### Eccezione

<<<<<<< HEAD
`forecast::messages.*` - valore diretto, NO `.label`
=======
`predict::messages.*` - valore diretto, NO `.label`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)

---

## 🔗 Link

- [Indice GEMINI](./gemini-split-index.md)
- [translation-management skill available](../../.opencode/skills/translation-management/SKILL.md)
- [GEMINI.md originale](../../GEMINI.md)
- [Index principale](./index.md)
