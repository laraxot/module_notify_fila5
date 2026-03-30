# 🛠️ NPM Scripts Guide - Sixteen Theme

**Data**: 2026-03-30  
**Versione**: 1.0.0  
**Stato**: Documentazione Operativa

## 📦 Panoramica

Il tema Sixteen utilizza **Vite** come build tool per compilare CSS e JavaScript.

## 🚀 Comandi NPM Principali

### 1. `npm run dev` - Sviluppo
```bash
cd laravel/Themes/Sixteen
npm run dev
```

**Cosa fa**:
- Avvia Vite in modalità development
- Hot Module Replacement (HMR)
- Watch mode per cambiamenti
- Server di sviluppo su `http://localhost:5173`

**Quando usare**:
- Durante lo sviluppo
- Quando devi vedere le modifiche in tempo reale
- Debug di CSS/JS

### 2. `npm run build` - Produzione
```bash
cd laravel/Themes/Sixteen
npm run build
```

**Cosa fa**:
- Compila CSS e JS per produzione
- Minifica i file
- Genera manifest.json
- Output in `public/` directory

**Quando usare**:
- **SEMPRE** dopo modifiche a CSS/JS
- Prima di deploy in produzione
- Dopo aver modificato file in `resources/css/` o `resources/js/`

### 3. `npm run copy` - Pubblica Asset
```bash
cd laravel/Themes/Sixteen
npm run copy
```

**Cosa fa**:
- Copia file da `public/` a `../../../public_html/themes/Sixteen/`
- Copia il manifest.json
- Rende gli asset accessibili pubblicamente

**Quando usare**:
- **SEMPRE** dopo `npm run build`
- Per pubblicare le modifiche
- Prima di testare in browser

### 4. `npm run quality` - Controlli Qualità
```bash
cd laravel/Themes/Sixteen
npm run quality
```

**Cosa fa**:
- Esegue tutti i controlli di qualità
- Biome (linter/formatter)
- ESLint (JavaScript/TypeScript)
- HTMLHint (HTML validation)
- Markdownlint (Markdown)

**Quando usare**:
- Prima di commit
- Dopo modifiche significative
- Per verificare la qualità del codice

### 5. `npm run fix` - Auto-Fix
```bash
cd laravel/Themes/Sixteen
npm run fix
```

**Cosa fa**:
- Esegue auto-fix per problemi risolvibili
- Biome --write
- ESLint --fix

**Quando usare**:
- Dopo `npm run quality` se ci sono errori
- Prima di commit
- Per formattare automaticamente

## 📋 Workflow Standard

### Sviluppo (Development)
```bash
# 1. Apri il terminale
cd laravel/Themes/Sixteen

# 2. Avvia dev server
npm run dev

# 3. Modifica file CSS/JS
# Le modifiche sono visibili immediatamente

# 4. Quando hai finito, build per produzione
npm run build
npm run copy
```

### Modifica CSS
```bash
# 1. Modifica file CSS
nvim resources/css/app.css

# 2. Compila
npm run build

# 3. Pubblica
npm run copy

# 4. Testa in browser
# http://fixcity.local/...
```

### Modifica JavaScript
```bash
# 1. Modifica file JS
nvim resources/js/app.js

# 2. Compila
npm run build

# 3. Pubblica
npm run copy

# 4. Testa in browser
```

### Pre-Commit Checklist
```bash
# 1. Controlla qualità
npm run quality

# 2. Fix automatici
npm run fix

# 3. Build produzione
npm run build

# 4. Pubblica
npm run copy

# 5. Commit
git add .
git commit -m "feat: description"
```

## 🔧 Script Personalizzati

### `package.json` Scripts
```json
{
    "scripts": {
        "dev": "vite",
        "build": "vite build",
        "copy": "mkdir -p ../../../public_html/themes/Sixteen && cp -r ./public/* ../../../public_html/themes/Sixteen/",
        "quality": "npm run quality:biome && npm run quality:eslint && npm run quality:htmlhint && npm run quality:markdownlint",
        "fix": "npm run fix:biome && npm run fix:eslint"
    }
}
```

## 📁 Directory Structure

```
laravel/Themes/Sixteen/
├── resources/
│   ├── css/
│   │   ├── app.css              ← CSS principale
│   │   ├── design-comuni.css    ← CSS Design Comuni
│   │   └── ...
│   └── js/
│       ├── app.js               ← JS principale
│       └── ...
├── public/
│   ├── assets/                  ← Output build
│   └── manifest.json            ← Manifest Vite
└── package.json                 ← Scripts config
```

## 🎯 Best Practices

### 1. SEMPRE Build + Copy
```bash
# ❌ SBAGLIATO
# Modifico CSS e ricarico pagina

# ✅ CORRETTO
# Modifico CSS → npm run build → npm run copy → Ricarico pagina
```

### 2. Usa Dev Mode per Sviluppo
```bash
# ✅ Per sviluppo
npm run dev

# ✅ Per produzione
npm run build && npm run copy
```

### 3. Quality Check Prima di Commit
```bash
# ✅ Prima di commit
npm run quality
npm run fix
```

### 4. Commit Piccoli e Frequenti
```bash
# ✅ Commit piccoli
git add resources/css/app.css
npm run build
npm run copy
git commit -m "style: update header CSS"
```

## 🐛 Troubleshooting

### Problema: Modifiche CSS non visibili
**Soluzione**:
```bash
npm run build
npm run copy
# Clear browser cache (Ctrl+Shift+R)
```

### Problema: Errori di build
**Soluzione**:
```bash
npm run quality
npm run fix
# Correggi errori manualmente
npm run build
```

### Problema: Manifest.json mancante
**Soluzione**:
```bash
npm run build
npm run copy
# Verifica che manifest.json esista in public/
```

## 📚 Riferimenti

### Documentazione Ufficiale
- [Vite Documentation](https://vitejs.dev/)
- [Tailwind CSS Documentation](https://tailwindcss.com/)
- [npm Documentation](https://docs.npmjs.com/)

### File Correlati
- `package.json` - Scripts configuration
- `vite.config.js` - Vite configuration
- `tailwind.config.js` - Tailwind configuration

---

**Regola d'Oro**: Dopo ogni modifica a CSS/JS, esegui SEMPRE:
```bash
npm run build
npm run copy
```
