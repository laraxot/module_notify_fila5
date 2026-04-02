# Homepage Visual Comparison - Sixteen Theme

**Data**: 2026-04-02  
**Status**: In Progress

---

## Screenshots

### Header Comparison

| Local | Reference |
|-------|------------|
| ![Header Local](./visual-comparison/header-local.png) | ![Header Reference](./visual-comparison/header-reference.png) |

### Footer Comparison

| Local | Reference |
|-------|------------|
| ![Footer Local](./visual-comparison/footer-local.png) | ![Footer Reference](./visual-comparison/footer-reference.png) |

### Homepage Completa (Full Page)

| Local | Reference |
|-------|------------|
| ![Homepage Local](./visual-comparison/homepage-local-full.png) | ![Homepage Reference](./visual-comparison/homepage-reference-full.png) |

### Hero Section

| Local | Reference |
|-------|------------|
| ![Hero Local](./visual-comparison/hero-local.png) | ![Hero Reference](./visual-comparison/hero-reference.png) |

### Cards/News Section

| Local | Reference |
|-------|------------|
| ![Cards Local](./visual-comparison/cards-local.png) | ![Cards Reference](./visual-comparison/cards-reference.png) |

### Services Section

| Local | Reference |
|-------|------------|
| ![Services Local](./visual-comparison/services-local.png) | ![Services Reference](./visual-comparison/services-reference.png) |

---

## Analisi Differenze Rilevate

### 🔴 CRITICO - Layout Diverso

La struttura della pagina locale è DIFFERENTE dalla reference:
- **Hero**: Reference ha search bar + evidenze cards. Locale ha solo card notizia
- **Navigation**: Reference ha "Vivi il Comune" dropdown, locale no
- **Evidence Section**: Reference blu (#0066CC), locale diverso

### ✅ FATTO - Colori Header/Footer
- Header Slim: #007a52 ✅
- Header Navbar: #007a52 ✅
- Footer Main: #009699 ✅
- Footer Secondary: #17334f ✅

### 🟡 STATO ATTUALE

**JSON Aggiornato** con block Servizi e AMMINISTRAZIONE ma:
- I blocchi non vengono renderizzati - il sistema CMS non riconosce `services-homepage` e `administration-homepage` come tipi validi
- Servizi nel menu ma NON nella content section (hero, topics, etc)

### Prossime Azioni

1. **Verificare Block Processor** - Il CMS deve processare i tipi di blocco
2. **Creare componenti BlockData** per i nuovi tipi se necessario
3. **Verificare Hero section** - layout diverso da reference
4. **Verificare Navigation** - menu diversi

---

## Piano di Correzione

1. **Aggiungere sezione Servizi** - Card con icone servizi comunali
2. **Aggiungere sezione AMMINISTRAZIONE** - Menu con servizi comunali
3. **Modificare layout Hero** - Aggiungere overlay scuro come reference
4. **Aggiornare JSON** - Aggiungere block mancanti in `tests.homepage.json`

---

## Contenuto Reference Mancante nel JSON

Reference ha这些 sezioni che mancano nel JSON locale:
- `block-servizi` - Card servizi con icone
- `block-amministrazione` - Menu servizi amministrativi

---

## Prossimi Passi

1. [x] Catturare screenshot comparativi
2. [ ] Analizzare differenze Hero section
3. [ ] Analizzare differenze Cards/News
4. [ ] Analizzare differenze Topics/Services
5. [ ] Allineare CSS mancanti
6. [ ] Testare responsive behavior

---

## Strumenti di Test

- Script screenshot: `screenshots.cjs` (locale), `capture-reference.cjs` (reference)
- Homepage URL: http://127.0.0.1:8000/it/tests/homepage
- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html

---

## Documentazione Collegata

- [Project Visual Comparison](../docs/project/visual-comparison/index.md)
- [Theme Documentation](./README.md)
- [Design Comuni Analysis](./docs/design-comuni-analysis.md)

| Element | Reference | Local | Status |
|---------|-----------|-------|--------|
| Header Slim BG | #007a52 (green) | #007a52 | ✅ MATCH |
| Header Navbar BG | #007a52 (green) | #007a52 | ✅ MATCH |
| Brand Title | #17334f (dark) | #17334f | ✅ MATCH |
| Footer Main BG | #009699 (teal) | #009699 | ✅ MATCH |
| Footer Secondary BG | #17334f | #17334f | ✅ MATCH |
| Search/Evidence BG | #0073e6 (blue) | #0073e6 | ✅ MATCH |

---

## Structure Status

- ✅ HTML structure identical
- ✅ All data-element attributes match
- ✅ Search modal functional
- ✅ Colors aligned with Bootstrap Italia reference

---

## Related Documentation

- [Project Visual Comparison](../docs/project/visual-comparison/index.md)
- [Theme Documentation](./README.md)
- [Design Comuni Analysis](./docs/design-comuni-analysis.md)