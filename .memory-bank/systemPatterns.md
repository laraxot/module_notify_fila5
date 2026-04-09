# System Patterns

**Date**: 2026-04-09  
**Architecture**: Modular Monolith + Theme System

## 🏗️ Architectural Patterns

### 1. Modular Monolith (Nwidart + Laraxot)
```
Modules/
├── module.json           → Module definition
├── app/
│   ├── Models/          → Extend XotBaseModel
│   ├── Actions/         → Business logic (NO Services)
│   ├── Providers/       → Extend XotBaseServiceProvider
│   └── Filament/        → Admin panel resources
├── resources/
│   └── views/pages/     → Folio pages (se necessario)
└── routes/              → EMPTY (Filio routing)
```

**Regole**:
- ✅ Estendere SEMPRE classi XotBase*
- ✅ Usare Actions (spatie/laravel-queueable-action)
- ❌ MAI creare Services
- ❌ MAI modificare routes/ (vuoti di proposito)

### 2. Theme System
```
Themes/Sixteen/
├── resources/
│   ├── css/app.css      → Tailwind entry point
│   ├── views/pages/     → Folio pages
│   └── dist/            → Compiled assets
├── tailwind.config.js
└── vite.config.js
```

**Build Process**:
1. Modifica CSS/JS in `Themes/Sixteen/resources/`
2. `npm run build` → Compila in `resources/dist/`
3. `npm run copy` → Copia a `public_html/themes/Sixteen/`

### 3. Routing Pattern (NO traditional routes)
- **Frontoffice**: Folio file-based routing
- **Backoffice**: Filament admin panels
- **routes/web.php**: EMPTY (di proposito)
- **routes/api.php**: EMPTY o NON esiste

## 🎨 CSS/JS Patterns

### Bootstrap Italia → Tailwind Mapping
```css
/* style-apply.css: Bootstrap classes → Tailwind @apply */
.btn-primary {
  @apply bg-primary-500 text-white px-4 py-2 rounded;
}
```

**Regole**:
1. Mantieni classi Bootstrap nell'HTML (per parity)
2. Stili con Tailwind @apply in CSS
3. Interattività con Alpine.js (NO data-bs-*)

### Font Configuration
```css
/* Google Fonts - MUST be first @import */
@import url('https://fonts.googleapis.com/css2?family=Titillium+Web:...');

/* Computed style target */
font-family: "Titillium Web"; /* NO fallbacks per match esatto */
```

## 🧠 Memory Patterns

### Knowledge Graph Memory
- **Entity**: Concetto con nome unico
- **Observation**: Fatto atomico su entity
- **Relation**: Connessione attiva tra entities

### Memory Bank
- **activeContext.md**: Sessione corrente
- **productContext.md**: Descrizione progetto
- **techContext.md**: Stack tecnico
- **systemPatterns.md**: Pattern architetturali (questo file)
- **progress.md**: Avanzamento e decisioni

## 🔧 Development Workflow

### 1. Feature Development
```
Discuss → Plan → Execute → Verify → Document
```

### 2. CSS/JS Improvements
```
Screenshot → Compare → Modify CSS → Build → Screenshot → Repeat
```

### 3. Documentation Updates
```
Change code → Update module docs → Update theme docs → Update indexes
```

## ⚡ Quality Gates

| Gate | Tool | Target |
|------|------|--------|
| Formatting | Laravel Pint | PSR-12 |
| Static Analysis | PHPStan | Level 10 |
| Tests | Pest PHP | 100% coverage |
| HTML Parity | compare-html.py | >80% |
| Font Match | Computed style | 100% match |
