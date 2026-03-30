# 📁 Design Comuni - Struttura Directory Corretta

**Data**: 2026-03-30  
**Fix**: Spostamento HTML in Main_files  
**Stato**: ✅ Completato

## ❌ Errore Precedente

Gli HTML erano in:
```
resources/design-comuni/dist/sito/  ← SBAGLIATO
```

Questo è sbagliato perché:
- `resources/` è per file sorgente (Blade, CSS, JS)
- `dist/` contiene file compilati/output
- Gli HTML di riferimento dovrebbero stare in `Main_files/`

## ✅ Struttura Corretta

### Main_files/ (File di Riferimento)
```
Main_files/
├── five/                          ← Conversione Tailwind (2145 righe CSS)
│   ├── src/
│   │   ├── style.css              ← CSS Tailwind convertito
│   │   ├── style-apply.css        ← Versione @apply
│   │   ├── index.html             ← Pagina esempio
│   │   └── ...
│   └── docs/                      ← Documentazione conversione
│       ├── README.md
│       ├── conversion-log.md
│       └── ...
│
└── design-comuni-html/            ← HTML originali Bootstrap Italia
    └── dist/
        ├── sito/                  ← 38 pagine "sito"
        │   ├── homepage.html
        │   ├── argomenti.html
        │   ├── appuntamento-06-conferma.html
        │   └── ...
        └── servizi/               ← 46 pagine "servizi"
            ├── accesso-servizio.html
            ├── permessi-scheda-servizio.html
            └── ...
```

### resources/ (File Sorgente per Build)
```
resources/
├── css/
│   ├── app.css                    ← CSS principale
│   └── design-comuni.css          ← CSS Tailwind (2145 righe)
│
├── design-comuni/
│   ├── pages/                     ← Pagine Blade da creare
│   │   ├── homepage.blade.php     ✅
│   │   ├── argomenti.blade.php    ✅
│   │   └── ...                    ⏳ 37 da creare
│   └── manifest.php               ← Metadata pagine
│
└── views/
    └── pages/
        └── tests/
            └── [slug].blade.php   ← Route dinamica
```

## 📊 File Count

| Directory | Tipo | Count |
|-----------|------|-------|
| `Main_files/five/src/` | HTML + CSS | 7 file |
| `Main_files/five/docs/` | Documentation | 9 file |
| `Main_files/design-comuni-html/dist/sito/` | HTML originali | 38 file |
| `Main_files/design-comuni-html/dist/servizi/` | HTML originali | 46 file |
| `resources/css/` | CSS sorgente | 2 file |
| `resources/design-comuni/pages/` | Blade pages | 2 file (2/39) |

## 🎯 Scopo di Ogni Directory

### Main_files/five/
**Scopo**: Conversione Bootstrap Italia → Tailwind CSS  
**Contenuto**:
- CSS già convertito (2145 righe)
- HTML di esempio
- Documentazione della conversione

### Main_files/design-comuni-html/
**Scopo**: HTML originali di riferimento  
**Contenuto**:
- 84 file HTML originali da design-comuni-pagine-statiche
- Divisi in `sito/` (38) e `servizi/` (46)
- Usati come riferimento per creare le Blade pages

### resources/css/
**Scopo**: CSS sorgente per Vite build  
**Contenuto**:
- `app.css` - Importa tutto
- `design-comuni.css` - CSS Tailwind convertito

### resources/design-comuni/pages/
**Scopo**: Pagine Blade da creare  
**Contenuto**:
- 2 pagine create (homepage, argomenti)
- 37 pagine da creare

## 🔄 Flusso di Lavoro Corretto

1. **Studiare HTML originale** in `Main_files/design-comuni-html/dist/sito/`
2. **Studiare CSS Tailwind** in `Main_files/five/src/style.css`
3. **Creare pagina Blade** in `resources/design-comuni/pages/`
4. **Usare classi Tailwind** dal CSS convertito
5. **Testare** su `/it/tests/{slug}`

## 📝 Esempio: Creazione Pagina

### 1. Leggere HTML originale
```bash
cat Main_files/design-comuni-html/dist/sito/argomenti.html
```

### 2. Studiare CSS Tailwind
```bash
cat Main_files/five/src/style.css | grep "cmp-breadcrumbs" -A 20
```

### 3. Creare Blade page
```bash
nvim resources/design-comuni/pages/argomenti.blade.php
```

### 4. Usare classi Tailwind
```blade
{{-- Invece di Bootstrap classes --}}
<div class="container mx-auto px-4">

{{-- Usare classi Tailwind dal CSS convertito --}}
<nav class="cmp-breadcrumbs" role="navigation">
```

## 🔗 Riferimenti

### Directory
- `Main_files/five/` - Conversione Tailwind
- `Main_files/design-comuni-html/` - HTML originali
- `resources/css/` - CSS sorgente
- `resources/design-comuni/pages/` - Blade pages

### Documentazione
- `Main_files/five/docs/conversion-log.md` - Log conversione
- `Main_files/five/docs/css-architecture.md` - Architettura CSS
- `docs/design-comuni/THEME_PLAN.md` - Piano di lavoro
- `docs/design-comuni/TAILWIND_INTEGRATION_SUMMARY.md` - Integrazione Tailwind

## ✅ Check Struttura

Verificare struttura:
```bash
# Main_files
ls -la Main_files/
ls -la Main_files/design-comuni-html/dist/
ls -la Main_files/five/src/

# resources
ls -la resources/css/
ls -la resources/design-comuni/pages/
```

## 🎓 Lezioni Apprese

1. **Main_files/** è per file di riferimento e sorgenti
2. **resources/** è per file usati nel build
3. **dist/** non dovrebbe essere in resources/
4. **Separare chiaramente** riferimento vs sorgente vs output

---

**Stato**: ✅ Struttura corretta  
**HTML Originali**: Main_files/design-comuni-html/dist/  
**CSS Tailwind**: Main_files/five/src/style.css  
**Blade Pages**: resources/design-comuni/pages/
