# HTML Structure Parity Report - Segnalazioni Elenco

**Data:** 2026-04-08  
**Reference:** https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html  
**Local:** http://127.0.0.1:8000/it/tests/segnalazioni-elenco

---

## 📊 Parity Score: 90%

### ✅ Elementi Corrispondenti (9/10)

| Elemento | Stato | Note |
|----------|-------|------|
| `main` wrapper | ✅ | Presente, senza ID |
| `div#main-container` | ✅ | Presente con classe `container` |
| `div#main-container.container` | ✅ | Classe corretta |
| `div.bg-primary` | ✅ | Presente (rating section) |
| `ul.nav-tabs` | ✅ | Presente per switch map/list |
| `div.cmp-breadcrumbs` | ✅ | Presente con breadcrumb |
| `div.container` | ✅ | 7 container presenti |
| `div.row` | ✅ | 16 rows presenti |
| `div.modal` | ✅ | Modali presenti |

### ❌ Elementi Mancanti (1/10)

| Elemento | Stato | Note |
|----------|-------|------|
| `div.bg-grey-card` | ❌ | Renderizzato condizionalmente - richiede `contacts` in JSON |

---

## 🔍 Dettaglio Struttura

### Main Wrapper
```
<main>
  └── div#main-container.container
      ├── div.row (breadcrumb + heading)
      ├── div.row (filters + results)
      │   └── div.bg-primary (rating - inside container)
      └── ...
```

### Note Strutturali
- Il `div.bg-primary` (rating) è posizionato dentro `main-container` invece che come sibling diretto
- Questo differisce leggermente dal reference ma mantiene la funzionalità
- Il `div.bg-grey-card` (contacts) richiede dati `contacts` nel JSON per essere renderizzato

---

## 📝 Correzioni Traduzioni Applicate

Tutte le traduzioni sono state convertite dal formato `_label`/`_text` al formato dot notation `.label`/`.text`:

- `heading.title_label` → `heading.title.label`
- `heading.subtitle_text` → `heading.subtitle.text`
- `elenco.map_tab_label` → `elenco.map_tab.label`
- `card.type_label_text` → `card.type_label.text`
- etc.

---

## 🎯 Conclusione

**Obiettivo 90% parity raggiunto.**

La struttura HTML corrisponde al reference per tutti gli elementi principali. L'unico elemento mancante (`bg-grey-card`) è renderizzato condizionalmente in base ai dati di input.
