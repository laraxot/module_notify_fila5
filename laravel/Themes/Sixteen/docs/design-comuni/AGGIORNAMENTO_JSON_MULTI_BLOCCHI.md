# 🔄 Design Comuni - Aggiornamento JSON con Multipli Blocchi

**Data**: 2026-03-30  
**Stato**: Guida Operativa  
**Versione**: 1.0.0

## 🎯 Obiettivo

Aggiornare tutti i file JSON esistenti per usare **MULTIPLI blocchi Filament** invece di un solo blocco.

## ❌ Struttura Attuale (SBAGLIATA)

La maggior parte dei JSON attuali ha **UN SOLO BLOCCO**:

```json
{
    "slug": "tests.homepage",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "title": "Benvenuto",
                    "subtitle": "Un comune da vivere"
                }
            }
        ]
    }
}
```

## ✅ Struttura Corretta (MULTIPLI BLOCCHI)

Ogni pagina deve avere **5-10 blocchi**:

```json
{
    "slug": "tests.homepage",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "view": "pub_theme::components.blocks.hero.default",
                    "title": "Il mio Comune",
                    "subtitle": "Un comune da vivere",
                    "background_color": "bg-italia-blue-500",
                    "text_color": "text-white"
                }
            },
            {
                "type": "feature_sections",
                "data": {
                    "view": "pub_theme::components.blocks.feature_sections.default",
                    "title": "Servizi in evidenza",
                    "sections": [
                        {
                            "title": "Servizi Digitali",
                            "description": "Accedi ai servizi online",
                            "icon": "it-services"
                        },
                        {
                            "title": "Amministrazione",
                            "description": "Giunta e consiglio",
                            "icon": "it-pa"
                        },
                        {
                            "title": "Novità",
                            "description": "Comunicati e avvisi",
                            "icon": "it-info-circle"
                        }
                    ]
                }
            },
            {
                "type": "paragraph",
                "data": {
                    "view": "pub_theme::components.blocks.paragraph.default",
                    "content": "<p>Esplora per argomenti</p>",
                    "class": "text-center text-xl"
                }
            },
            {
                "type": "links",
                "data": {
                    "view": "pub_theme::components.blocks.links.grid",
                    "title": "Argomenti principali",
                    "links": [
                        {"label": "Iscrizioni", "url": "/it/tests/argomento/iscrizioni"},
                        {"label": "Estate in città", "url": "/it/tests/argomento/estate"},
                        {"label": "Polizia locale", "url": "/it/tests/argomento/polizia"}
                    ]
                }
            },
            {
                "type": "cta",
                "data": {
                    "view": "pub_theme::components.blocks.cta.default",
                    "title": "Hai bisogno di aiuto?",
                    "description": "Contatta l'URP",
                    "button_text": "Contattaci",
                    "button_url": "/it/tests/assistenza"
                }
            }
        ]
    }
}
```

## 📋 Template per Ogni Tipo di Pagina

### Homepage (5-7 blocchi)

```json
{
    "content_blocks": {
        "it": [
            {"type": "hero", ...},                    // 1. Hero principale
            {"type": "feature_sections", ...},        // 2. Servizi/features
            {"type": "paragraph", ...},               // 3. Testo introduttivo
            {"type": "links", ...},                   // 4. Link argomenti
            {"type": "stats", ...},                   // 5. Statistiche (opzionale)
            {"type": "cta", ...}                      // 6. Call-to-action
        ]
    }
}
```

### Pagina Argomento (4-6 blocchi)

```json
{
    "content_blocks": {
        "it": [
            {"type": "breadcrumb", ...},              // 1. Breadcrumb
            {"type": "hero", ...},                    // 2. Hero titolo
            {"type": "paragraph", ...},               // 3. Descrizione
            {"type": "links", ...},                   // 4. Servizi correlati
            {"type": "info", ...}                     // 5. Informazioni (opzionale)
        ]
    }
}
```

### Pagina Servizi (5-7 blocchi)

```json
{
    "content_blocks": {
        "it": [
            {"type": "breadcrumb", ...},              // 1. Breadcrumb
            {"type": "hero", ...},                    // 2. Hero
            {"type": "feature_sections", ...},        // 3. Lista servizi
            {"type": "paragraph", ...},               // 4. Descrizione
            {"type": "cta", ...}                      // 5. Call-to-action
        ]
    }
}
```

### Pagina Dettaglio (6-8 blocchi)

```json
{
    "content_blocks": {
        "it": [
            {"type": "breadcrumb", ...},              // 1. Breadcrumb
            {"type": "hero", ...},                    // 2. Hero titolo
            {"type": "info", ...},                    // 3. Informazioni principali
            {"type": "paragraph", ...},               // 4. Descrizione estesa
            {"type": "links", ...},                   // 5. Link correlati
            {"type": "contact", ...}                  // 6. Contatti (opzionale)
        ]
    }
}
```

### Wizard/Flusso (4-6 blocchi)

```json
{
    "content_blocks": {
        "it": [
            {"type": "breadcrumb", ...},              // 1. Breadcrumb
            {"type": "wizard", ...},                  // 2. Wizard steps
            {"type": "form", ...},                    // 3. Modulo
            {"type": "info", ...}                     // 4. Informazioni helper
        ]
    }
}
```

## 🛠️ Blocchi Filament Disponibili

### Blocchi Principali (usare sempre)
1. **HeroBlock** - Hero section
2. **FeatureSectionsBlock** - Features/services grid
3. **ParagraphBlock** - Testo semplice
4. **LinksBlock** - Lista link
5. **CtaBlock** - Call-to-action
6. **InfoBlock** - Informazioni con icone

### Blocchi Secondari (usare se necessario)
7. **StatsBlock** - Statistiche
8. **ContactBlock** - Modulo contatti
9. **NewsletterBlock** - Newsletter signup
10. **NavigationBlock** - Navigazione
11. **LogoBlock** - Logo
12. **SocialBlock** - Social links
13. **QuickLinksBlock** - Link rapidi
14. **ActionsBlock** - Azioni rapide

## 📝 Esempi Pratici di Aggiornamento

### Prima: Homepage con 1 blocco
```json
{
    "slug": "tests.homepage",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "title": "Benvenuto"
                }
            }
        ]
    }
}
```

### Dopo: Homepage con 6 blocchi
```json
{
    "slug": "tests.homepage",
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "view": "pub_theme::components.blocks.hero.default",
                    "title": "Il mio Comune",
                    "subtitle": "Un comune da vivere",
                    "background_color": "bg-italia-blue-500",
                    "text_color": "text-white"
                }
            },
            {
                "type": "feature_sections",
                "data": {
                    "view": "pub_theme::components.blocks.feature_sections.default",
                    "title": "Servizi in evidenza",
                    "sections": [
                        {
                            "title": "Servizi Digitali",
                            "description": "Accedi ai servizi online",
                            "icon": "it-services"
                        },
                        {
                            "title": "Amministrazione",
                            "description": "Giunta e consiglio",
                            "icon": "it-pa"
                        },
                        {
                            "title": "Novità",
                            "description": "Comunicati e avvisi",
                            "icon": "it-info-circle"
                        }
                    ]
                }
            },
            {
                "type": "paragraph",
                "data": {
                    "view": "pub_theme::components.blocks.paragraph.default",
                    "content": "<p>Esplora per argomenti</p>",
                    "class": "text-center text-xl mt-8"
                }
            },
            {
                "type": "links",
                "data": {
                    "view": "pub_theme::components.blocks.links.grid",
                    "title": "Argomenti principali",
                    "links": [
                        {"label": "Iscrizioni", "url": "/it/tests/argomento/iscrizioni"},
                        {"label": "Estate in città", "url": "/it/tests/argomento/estate"},
                        {"label": "Polizia locale", "url": "/it/tests/argomento/polizia"}
                    ]
                }
            },
            {
                "type": "stats",
                "data": {
                    "view": "pub_theme::components.blocks.stats.default",
                    "title": "Il Comune in numeri",
                    "stats": [
                        {"label": "Abitanti", "value": "50.000", "icon": "users"},
                        {"label": "Servizi", "value": "120", "icon": "services"},
                        {"label": "Eventi/anno", "value": "300", "icon": "events"}
                    ]
                }
            },
            {
                "type": "cta",
                "data": {
                    "view": "pub_theme::components.blocks.cta.default",
                    "title": "Hai bisogno di aiuto?",
                    "description": "Contatta l'ufficio relazioni con il pubblico",
                    "button_text": "Contattaci",
                    "button_url": "/it/tests/assistenza",
                    "button_color": "bg-italia-blue-500 hover:bg-italia-blue-600"
                }
            }
        ]
    }
}
```

## ✅ Checklist Aggiornamento

Per ogni file JSON:

- [ ] Aggiungere **breadcrumb** come primo blocco (se pagina interna)
- [ ] Aggiungere **hero** come secondo blocco
- [ ] Aggiungere **2-4 blocchi di contenuto** (feature_sections, paragraph, links, etc.)
- [ ] Aggiungere **cta** come ultimo blocco
- [ ] Assicurarsi che ogni blocco abbia `"view": "pub_theme::components.blocks.*"`
- [ ] Verificare che i blocchi usino i campi corretti
- [ ] Testare la pagina dopo l'aggiornamento

## 📊 Stato Aggiornamento

| Categoria | Totale | Aggiornati | % |
|-----------|--------|------------|---|
| Generali | 9 | 0 | 0% |
| Amministrazione | 2 | 0 | 0% |
| Novità | 2 | 0 | 0% |
| Servizi | 3 | 0 | 0% |
| Vivere il Comune | 2 | 0 | 0% |
| Prenotazione | 8 | 0 | 0% |
| Assistenza | 2 | 0 | 0% |
| Segnalazione | 7 | 0 | 0% |
| **TOTALE** | **35** | **0** | **0%** |

---

**Prossimo Step**: Aggiornare tutti i 35 file JSON per usare multipli blocchi Filament.
