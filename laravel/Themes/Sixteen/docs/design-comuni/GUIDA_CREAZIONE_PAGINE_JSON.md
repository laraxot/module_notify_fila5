# 📝 Design Comuni - Guida Creazione Pagine JSON

**Data**: 2026-03-30  
**Stato**: Guida Operativa  
**Versione**: 1.0.0

## 🎯 Sistema CMS JSON-Based

Il tema Sixteen usa un sistema CMS che legge i contenuti da file JSON invece che da database.

### Posizione File
```
laravel/config/local/{tenant}/database/content/pages/{slug}.json
```

Per FixCity:
```
laravel/config/local/fixcity/database/content/pages/tests.{slug}.json
```

## 📁 Struttura JSON

### Schema Base
```json
{
    "id": "{id_univoca}",
    "title": {
        "it": "Titolo pagina",
        "en": "Page title"
    },
    "slug": "tests.{slug}",
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "tipo_blocco",
                "data": {
                    "key": "value"
                }
            }
        ]
    },
    "sidebar_blocks": {
        "it": [],
        "en": []
    },
    "footer_blocks": {
        "it": ""
    },
    "created_at": "2024-01-01T00:00:00.000000Z",
    "updated_at": "2024-01-01T00:00:00.000000Z",
    "created_by": "uuid-utente",
    "updated_by": "uuid-utente"
}
```

## 🧩 Blocchi Disponibili

### Hero Block
```json
{
    "type": "hero",
    "data": {
        "title": "Titolo Hero",
        "subtitle": "Sottotitolo",
        "content": "Contenuto HTML",
        "image": "/path/to/image.jpg",
        "cta_button": {
            "text": "Call to Action",
            "url": "/link"
        }
    }
}
```

### Breadcrumb Block
```json
{
    "type": "breadcrumb",
    "data": {
        "items": [
            {"label": "Home", "url": "/"},
            {"label": "Pagine", "url": "/pages"},
            {"label": "Pagina corrente", "url": null}
        ]
    }
}
```

### Card Grid Block
```json
{
    "type": "card_grid",
    "data": {
        "title": "Titolo sezione",
        "cards": [
            {
                "title": "Titolo card",
                "content": "Contenuto card",
                "url": "/link",
                "icon": "icon-name"
            }
        ]
    }
}
```

### Text Block
```json
{
    "type": "text",
    "data": {
        "content": "<p>Contenuto HTML</p>",
        "class": "custom-class"
    }
}
```

## 📝 Esempio: Homepage

File: `config/local/fixcity/database/content/pages/tests.homepage.json`

```json
{
    "id": "tests-homepage",
    "title": {
        "it": "Homepage Design Comuni",
        "en": "Design Comuni Homepage"
    },
    "slug": "tests.homepage",
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {
                    "title": "Benvenuto nel Comune",
                    "subtitle": "Un comune da vivere",
                    "content": "<p>Scopri i servizi e le novità del tuo comune</p>"
                }
            },
            {
                "type": "card_grid",
                "data": {
                    "title": "Servizi in evidenza",
                    "cards": [
                        {
                            "title": "Servizi Digitali",
                            "content": "Accedi ai servizi online",
                            "url": "/it/tests/servizi",
                            "icon": "it-services"
                        },
                        {
                            "title": "Amministrazione",
                            "content": "Giunta e consiglio",
                            "url": "/it/tests/amministrazione",
                            "icon": "it-pa"
                        },
                        {
                            "title": "Novità",
                            "content": "Comunicati e avvisi",
                            "url": "/it/tests/novita",
                            "icon": "it-info-circle"
                        }
                    ]
                }
            }
        ]
    },
    "sidebar_blocks": {
        "it": []
    },
    "footer_blocks": {
        "it": ""
    }
}
```

## 📝 Esempio: Argomenti

File: `config/local/fixcity/database/content/pages/tests.argomenti.json`

```json
{
    "id": "tests-argomenti",
    "title": {
        "it": "Argomenti",
        "en": "Topics"
    },
    "slug": "tests.argomenti",
    "content": null,
    "content_blocks": {
        "it": [
            {
                "type": "breadcrumb",
                "data": {
                    "items": [
                        {"label": "Home", "url": "/"},
                        {"label": "Argomenti", "url": null}
                    ]
                }
            },
            {
                "type": "hero",
                "data": {
                    "title": "Argomenti",
                    "subtitle": "Naviga per tematiche",
                    "content": "<p>Gli argomenti aiutano a orientarsi nella ricerca di informazioni e servizi</p>"
                }
            },
            {
                "type": "card_grid",
                "data": {
                    "title": "Tutti gli argomenti",
                    "cards": [
                        {
                            "title": "Iscrizioni",
                            "content": "Servizi per iscrizioni e registrazioni",
                            "url": "/it/tests/argomento/iscrizioni"
                        },
                        {
                            "title": "Estate in città",
                            "content": "Eventi e iniziative estive",
                            "url": "/it/tests/argomento/estate"
                        }
                    ]
                }
            }
        ]
    },
    "sidebar_blocks": {
        "it": []
    },
    "footer_blocks": {
        "it": ""
    }
}
```

## 🔄 Flusso di Lavoro

### 1. Creare File JSON
```bash
# Posizione
config/local/fixcity/database/content/pages/tests.{slug}.json
```

### 2. Definire Slug
```json
{
    "slug": "tests.{slug}"
}
```

### 3. Aggiungere Blocchi
```json
{
    "content_blocks": {
        "it": [
            {
                "type": "hero",
                "data": {...}
            }
        ]
    }
}
```

### 4. Testare Pagina
```
http://fixcity.local/it/tests/{slug}
```

## 📊 Pagine da Creare

### Generali (9)
- [ ] `tests.homepage.json`
- [ ] `tests.argomenti.json`
- [ ] `tests.argomento.json`
- [ ] `tests.domande-frequenti.json`
- [ ] `tests.risultati-ricerca.json`
- [ ] `tests.lista-risorse.json`
- [ ] `tests.lista-categorie.json`
- [ ] `tests.lista-risorse-categorie.json`
- [ ] `tests.mappa-sito.json`

### Amministrazione (2)
- [ ] `tests.amministrazione.json`
- [ ] `tests.documenti-dati.json`

### Novità (2)
- [ ] `tests.novita.json`
- [ ] `tests.novita-dettaglio.json`

### Servizi (3)
- [ ] `tests.servizi.json`
- [ ] `tests.servizi-categoria.json`
- [ ] `tests.servizio-dettaglio.json`

### Vivere il Comune (2)
- [ ] `tests.eventi.json`
- [ ] `tests.evento-dettaglio.json`

### Prenotazione Appuntamento (8)
- [x] `tests.appuntamento-06-conferma.json` ✅ Esistente
- [ ] `tests.appuntamento-01-ufficio.json`
- [ ] `tests.appuntamento-01-ufficio-luogo.json`
- [ ] `tests.appuntamento-02-data-orario.json`
- [ ] `tests.appuntamento-03-dettagli.json`
- [ ] `tests.appuntamento-04-richiedente.json`
- [ ] `tests.appuntamento-04-richiedente-autenticato.json`
- [ ] `tests.appuntamento-05-riepilogo.json`

### Richiesta Assistenza (2)
- [ ] `tests.assistenza-01-dati.json`
- [ ] `tests.assistenza-02-conferma.json`

### Segnalazione Disservizio (7)
- [ ] `tests.segnalazione-dettaglio.json`
- [ ] `tests.segnalazione-01-privacy.json`
- [ ] `tests.segnalazione-02-dati.json`
- [ ] `tests.segnalazione-03-riepilogo.json`
- [ ] `tests.segnalazione-04-conferma.json`
- [ ] `tests.segnalazione-area-personale.json`
- [ ] `tests.segnalazioni-elenco.json`

## 🔗 Riferimenti

### File Esistenti
- `config/local/fixcity/database/content/pages/tests.appuntamento-06-conferma.json`
- `config/local/fixcity/database/content/pages/1.json`

### Documentazione
- `Modules/Cms/docs/content-storage.md` - Sistema archiviazione
- `Modules/Cms/docs/content_blocks_system.md` - Blocchi contenuto
- `docs/design-comuni/ARCHITETTURA_E FILOSOFIA.md` - Architettura Sixteen

## ✅ Checklist Creazione Pagina

- [ ] Creare file JSON in `config/local/fixcity/database/content/pages/`
- [ ] Impostare slug corretto: `tests.{slug}`
- [ ] Definire titolo multilingua
- [ ] Aggiungere blocchi contenuto
- [ ] Testare pagina: `/it/tests/{slug}`
- [ ] Verificare rendering blocchi
- [ ] Aggiornare documentazione

---

**Lezione Appresa**: Il sistema CMS di Sixteen legge i contenuti da file JSON. Ogni pagina è un file JSON con blocchi di contenuto.

**Prossimo Step**: Creare i 39 file JSON per le pagine Design Comuni.
