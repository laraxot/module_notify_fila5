# 📋 Design Comuni Integration - Piano di Lavoro Completo

## 🎯 Obiettivo

Integrare le 39 pagine del design system **Bootstrap Italia** nel tema **Sixteen** di FixCity, utilizzando l'infrastruttura **Tailwind CSS 4 + Vite + DaisyUI** già esistente nel tema.

## 📊 Stato Attuale

### ✅ Cosa Esiste Già

1. **Tema Sixteen** (`/var/www/_bases/base_fixcity_fila5/laravel/Themes/Sixteen/`):
   - ✅ Vite 7 configurato (`vite.config.js`)
   - ✅ Tailwind CSS 4 + DaisyUI 4
   - ✅ bootstrap-italia 2.16.0 installato come dependency
   - ✅ Build system con manifest.json
   - ✅ Script npm per build, copy, watch

2. **Conversione CSS** (`Main_files/five/src/`):
   - ✅ `style.css` (2145 righe) - Conversione completa Bootstrap Italia → CSS nativo
   - ✅ `style-apply.css` - Versione con @apply di Tailwind
   - ✅ `vite.config.ts` configurato
   - ✅ `tailwind.config.js` con tema bootstrap_italia per DaisyUI
   - ✅ Documentazione completa in `docs/`

3. **Pagine Blade** (`resources/design-comuni/pages/`):
   - ✅ `homepage.blade.php` - Creata
   - ✅ `argomenti.blade.php` - Creata
   - ✅ `[slug].blade.php` - Route dinamica

4. **Documentazione** (`docs/design-comuni/`):
   - ✅ README.md
   - ✅ PAGES_INDEX.md
   - ✅ SESSION_SUMMARY.md
   - ✅ manifest.php (39 pagine)

### ⚠️ Cosa Manca

1. **Integrazione CSS**:
   - ❌ Spostare `Main_files/five/src/style.css` in `resources/css/design-comuni.css`
   - ❌ Importare in `resources/css/app.css`
   - ❌ Aggiornare pagine Blade per usare Vite assets

2. **Pagine da Creare** (37 pagine):
   - ❌ 7 Generali
   - ❌ 2 Amministrazione
   - ❌ 2 Novità
   - ❌ 3 Servizi
   - ❌ 2 Vivere il Comune
   - ❌ 8 Prenotazione Appuntamento
   - ❌ 2 Richiesta Assistenza
   - ❌ 7 Segnalazione Disservizio

3. **Componenti Blade**:
   - ❌ Header components (slim, center, navbar)
   - ❌ Footer components (main, secondary)
   - ❌ Card components (news, service, event, topic)
   - ❌ Navigation components (breadcrumb, pagination)

## 🚀 Piano di Lavoro - 5 Fasi

### **Fase 1: Integrazione Infrastruttura** (1-2 giorni)

#### Task 1.1: Spostare CSS
```bash
# Copiare style.css nella struttura resources
cp Main_files/five/src/style.css resources/css/design-comuni.css
cp Main_files/five/src/style-apply.css resources/css/design-comuni-apply.css
```

#### Task 1.2: Importare in app.css
```css
/* resources/css/app.css */
@import './design-comuni.css';
```

#### Task 1.3: Aggiornare vite.config.js
```js
// Aggiungere design-comuni come entry point
input: [
    'resources/css/app.css',
    'resources/css/design-comuni.css',
    'resources/js/app.js',
],
```

#### Task 1.4: Aggiornare Pagine Blade
```blade
{{-- Invece di asset('design-comuni/assets/...') --}}
@vite(['resources/css/design-comuni.css', 'resources/js/app.js'])
```

---

### **Fase 2: Componenti Blade Riutilizzabili** (2-3 giorni)

#### Task 2.1: Header Components
Creare in `resources/views/components/design-comuni/header/`:
- `slim.blade.php` - Regione, lingua, login
- `center.blade.php` - Brand, social, search
- `navbar.blade.php` - Menu navigazione

#### Task 2.2: Footer Components
Creare in `resources/views/components/design-comuni/footer/`:
- `main.blade.php` - Footer principale
- `secondary.blade.php` - Footer secondario

#### Task 2.3: Card Components
Creare in `resources/views/components/design-comuni/cards/`:
- `news-card.blade.php`
- `service-card.blade.php`
- `event-card.blade.php`
- `topic-card.blade.php`

#### Task 2.4: Navigation Components
Creare in `resources/views/components/design-comuni/navigation/`:
- `breadcrumb.blade.php`
- `pagination.blade.php`

---

### **Fase 3: Pagine Restanti** (5-7 giorni)

#### Priorità 1 - Pagine Principali (2 giorni)
1. `servizi.blade.php`
2. `novita.blade.php`
3. `amministrazione.blade.php`
4. `eventi.blade.php`

#### Priorità 2 - Flusso Appuntamento (2 giorni)
5-12. Tutte le 8 pagine del flusso appuntamento

#### Priorità 3 - Altre Pagine (2-3 giorni)
13-37. Restanti pagine

---

### **Fase 4: Testing e Ottimizzazione** (2 giorni)

#### Task 4.1: Test Funzionali
- Testare tutte le 39 pagine
- Verificare responsive su mobile/tablet/desktop
- Testare navigazione e link

#### Task 4.2: Ottimizzazione Performance
- Build production: `npm run build:production`
- Analizzare bundle: `npm run analyze`
- Ottimizzare assets

#### Task 4.3: Accessibilità
- Verificare WCAG 2.1 AA
- Test screen reader
- Verificare focus states

---

### **Fase 5: Documentazione e Deploy** (1 giorno)

#### Task 5.1: Documentazione
- Aggiornare README.md con stato finale
- Creare CHANGELOG.md
- Documentare componenti

#### Task 5.2: Deploy
- Build production
- Copy in public_html
- Test in produzione

---

## 📅 Timeline Stimata

| Fase | Giorni | Start | End |
|------|--------|-------|-----|
| Fase 1 | 2 | Day 1 | Day 2 |
| Fase 2 | 3 | Day 3 | Day 5 |
| Fase 3 | 7 | Day 6 | Day 12 |
| Fase 4 | 2 | Day 13 | Day 14 |
| Fase 5 | 1 | Day 15 | Day 15 |
| **TOTALE** | **15 giorni** | | |

---

## 🎯 Metriche di Successo

- ✅ 39/39 pagine create e funzionanti
- ✅ 100% responsive (mobile, tablet, desktop)
- ✅ Bundle size < 500KB (gzipped)
- ✅ Lighthouse score > 90
- ✅ WCAG 2.1 AA compliant
- ✅ Build time < 30s

---

## 📝 GitHub Issues da Creare

### Issue Template
```markdown
## Descrizione
[Descrizione chiara e concisa]

## Task
- [ ] Task 1
- [ ] Task 2
- [ ] Task 3

## Criteri di Accettazione
- [ ] Criterio 1
- [ ] Criterio 2

## Risorse
- Link a file/documenti correlati

## Stima
[X] punti / [Y] ore
```

### Lista Issue

#### 🏗️ Infrastructure (3 issues)
1. **[INFRA-01]** Integrate Bootstrap Italia CSS into Vite build
2. **[INFRA-02]** Create design-comuni.css entry point
3. **[INFRA-03]** Update Blade pages to use @vite instead of asset()

#### 🧩 Components (8 issues)
4. **[COMP-01]** Create header-slim component
5. **[COMP-02]** Create header-center component
6. **[COMP-03]** Create header-navbar component
7. **[COMP-04]** Create footer-main component
8. **[COMP-05]** Create footer-secondary component
9. **[COMP-06]** Create card components (news, service, event, topic)
10. **[COMP-07]** Create breadcrumb component
11. **[COMP-08]** Create pagination component

#### 📄 Pages - Generali (7 issues)
12. **[PAGE-01]** Create argomento page
13. **[PAGE-02]** Create domande-frequenti page
14. **[PAGE-03]** Create risultati-ricerca page
15. **[PAGE-04]** Create lista-risorse page
16. **[PAGE-05]** Create lista-categorie page
17. **[PAGE-06]** Create lista-risorse-categorie page
18. **[PAGE-07]** Create mappa-sito page

#### 📄 Pages - Amministrazione/Novità/Servizi (7 issues)
19. **[PAGE-08]** Create amministrazione page
20. **[PAGE-09]** Create documenti-dati page
21. **[PAGE-10]** Create novita page
22. **[PAGE-11]** Create novita-dettaglio page
23. **[PAGE-12]** Create servizi page
24. **[PAGE-13]** Create servizi-categoria page
25. **[PAGE-14]** Create servizio-dettaglio page

#### 📄 Pages - Vivere il Comune (2 issues)
26. **[PAGE-15]** Create eventi page
27. **[PAGE-16]** Create evento-dettaglio page

#### 📄 Pages - Flussi (17 issues)
28. **[FLOW-01]** Create appuntamento-01-ufficio page
29. **[FLOW-02]** Create appuntamento-01-ufficio-luogo page
30. **[FLOW-03]** Create appuntamento-02-data-orario page
31. **[FLOW-04]** Create appuntamento-03-dettagli page
32. **[FLOW-05]** Create appuntamento-04-richiedente page
33. **[FLOW-06]** Create appuntamento-04-richiedente-autenticato page
34. **[FLOW-07]** Create appuntamento-05-riepilogo page
35. **[FLOW-08]** Create appuntamento-06-conferma page
36. **[FLOW-09]** Create assistenza-01-dati page
37. **[FLOW-10]** Create assistenza-02-conferma page
38. **[FLOW-11]** Create segnalazione-dettaglio page
39. **[FLOW-12]** Create segnalazione-01-privacy page
40. **[FLOW-13]** Create segnalazione-02-dati page
41. **[FLOW-14]** Create segnalazione-03-riepilogo page
42. **[FLOW-15]** Create segnalazione-04-conferma page
43. **[FLOW-16]** Create segnalazione-area-personale page
44. **[FLOW-17]** Create segnalazioni-elenco page

#### 🧪 Testing/QA (2 issues)
45. **[TEST-01]** Test all 39 pages for responsiveness
46. **[TEST-02]** Accessibility audit (WCAG 2.1 AA)

#### 📚 Documentation (1 issue)
47. **[DOC-01]** Complete documentation update

---

## 🔗 GitHub Discussions

### Discussion 1: Architecture Decision Record
**Title**: [ADR] Bootstrap Italia → Tailwind CSS Conversion Strategy

**Content**:
- Discussione sull'approccio di conversione
- CSS nativo vs @apply directives
- Performance implications
- Best practices per manutenzione futura

### Discussion 2: Component Design Patterns
**Title**: Component Design Patterns for Bootstrap Italia

**Content**:
- Come strutturare i componenti Blade
- Naming conventions
- Props/slots patterns
- Accessibility patterns

### Discussion 3: Performance Optimization
**Title**: Performance Optimization Strategies

**Content**:
- Bundle size optimization
- CSS purging strategies
- Lazy loading components
- Caching strategies

---

## 🎯 Next Steps Immediati

1. ✅ Creare questo piano come `THEME_PLAN.md`
2. ⏳ Creare GitHub issues (47 issues total)
3. ⏳ Creare GitHub discussions (3 discussions)
4. ⏳ Iniziare Fase 1 (Infrastructure)

---

**Ultimo Aggiornamento**: 2026-03-30  
**Stato**: In Pianificazione  
**Prossima Azione**: Creare GitHub issues
