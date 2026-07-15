---
title: "PHPStan Syntax Errors Fix - Notify Module"
type: concept
tags: [phpstan, syntaxs]
created: 2026-07-14
updated: 2026-07-14
qmd: "phpstan-syntaxs phpstan syntax errors fix - notify module"
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

# PHPStan Syntax Errors Fix - Notify Module

**Modulo**: Notify  
**Livello PHPStan**: 10  
**Status**: ✅ **COMPLETATO**

---

## 📊 Errori Risolti

### 1. `Models/EmailTemplate.php`

**Errori**:
- Syntax error, unexpected '*' on line 19
- Syntax error, unexpected '}', expecting ',' or ']' or ')' on line 27

**Causa**: PHPDoc incompleto e array non chiuso correttamente nel metodo `casts()`.

**Fix Applicato**:
```php
// PRIMA (ERRATO)
protected $fillable = [...];

     * Get the attributes that should be cast.
     *
     * @return array<string, string>
    protected function casts(): array
    {
        return [
            'variables' => 'array',
            'categories' => 'array',
    }

// DOPO (CORRETTO)
protected $fillable = [...];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'variables' => 'array',
            'categories' => 'array',
        ];
    }
```

**Lezioni Apprese**:
- ✅ PHPDoc deve sempre iniziare con `/**` e terminare con `*/`
- ✅ Array devono essere sempre chiusi con `];`
- ✅ Metodi devono avere PHPDoc completo prima della dichiarazione

---

### 2. `Models/Theme.php`

**Errori**: Stessi errori di `EmailTemplate.php`

**Fix Applicato**: Stesso pattern di correzione.

**Pattern Identificato**: Errori duplicati suggeriscono conflitti Git mal risolti o copia-incolla incompleti.

---

## ✅ Verifica Post-Fix

```bash
./vendor/bin/phpstan analyse Modules/Notify/Models/EmailTemplate.php --level=10
./vendor/bin/phpstan analyse Modules/Notify/Models/Theme.php --level=10
```

**Risultato**: ✅ **0 errori**

---

## 📚 Best Practices

1. **PHPDoc Completo**: Sempre includere `/**` e `*/` per ogni metodo
2. **Chiusura Array**: Verificare sempre che gli array siano chiusi con `];`
3. **Type Hints**: Usare sempre type hints espliciti nei metodi
4. **Verifica Sintassi**: Eseguire `php -l` prima di commit

---

**Status**: ✅ **COMPLETATO**

**Ultimo aggiornamento**: [DATE]
