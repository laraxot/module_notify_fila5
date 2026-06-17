# Product Brief: Design Comuni HTML Replication

## 1. Visione

Replicare le pagine statiche del progetto [Italia Design Comuni](https://italia.github.io/design-comuni-pagine-statiche/) in FixCity mantenendo **identità HTML esatta** nel tag `<body>` (escludendo gli script). L'obiettivo è avere HTML identico tra le pagine upstream AGID e FixCity, usando il sistema CMS esistente con JSON + Blade components.

## 2. Problema

Attualmente l'HTML di FixCity non corrisponde alle pagine AGID:
- Classi CSS diverse
- Struttura tag non allineata
- Attribute data-* mancanti
- ARIA attributes non conformi

## 3. Utenti

- **Cittadini**: navigano il sito comunale
- **Admin**: gestiscono contenuti tramite CMS
- **Sviluppatori**: mantengono e estendono il sistema

## 4. Scope

### In Scope
- [x] Abilitare Folio routing (`CmsServiceProvider.php:64`)
- [ ] Replicare homepage.html (38 pagine totali)
- [ ] Creare JSON content per ogni pagina
- [ ] Matching HTML struttura esatta con upstream
- [ ] Header/Footer conformi AGID

### Out of Scope
- CSS personalizzati (phase 2)
- JavaScript interactive (phase 2)
- Backend CMS completi

## 5. Milestones

| Milestone | Descrizione | ETA |
|-----------|-------------|-----|
| M1 | Folio routing abilitato | ✅ |
| M2 | Homepage HTML identico | 2h |
| M3 | Altre 37 pagine replicate | 8h |
| M4 | Verifica HTML parity | 1h |

## 6. Metriche

| Metrica | Target | Attuale |
|---------|--------|---------|
| HTML Match | 95%+ | ~30% |
| CSS Classes | 100% | ~40% |
| ARIA Attributes | 100% | ~20% |

## 7. Pagine da Replicare

### Generali (9)
- homepage.html
- domande-frequenti.html
- risultati-ricerca.html
- argomenti.html
- argomento.html
- lista-risorse.html
- lista-categorie.html
- lista-risorse-categorie.html
- mappa-sito.html

### Amministrazione (2)
- amministrazione.html
- documenti-dati.html

### Novità (2)
- novita.html
- novita-dettaglio.html

### Servizi (3)
- servizi.html
- servizi-categoria.html
- servizio-dettaglio.html

### Vivere il Comune (2)
- eventi.html
- evento-dettaglio.html

### Prenotazione Appuntamento (8)
- appuntamento-01-ufficio.html
- appuntamento-01-ufficio-luogo.html
- appuntamento-02-data-orario.html
- appuntamento-03-dettagli.html
- appuntamento-04-richiedente.html
- appuntamento-04-richiedente-autenticato.html
- appuntamento-05-riepilogo.html
- appuntamento-06-conferma.html

### Richiesta Assistenza (2)
- assistenza-01-dati.html
- assistenza-02-conferma.html

### Segnalazione Disservizio (7)
- segnalazione-dettaglio.html
- segnalazione-01-privacy.html
- segnalazione-02-dati.html
- segnalazione-03-riepilogo.html
- segnalazione-04-conferma.html
- segnalazione-area-personale.html
- segnalazioni-elenco.html

## 8. Approccio Tecnico

1. **Folio routing**: già abilitato (linea 64)
2. **Dynamic route**: `[slug].blade.php` per tutte le pagine
3. **JSON content**: `config/local/fixcity/database/content/pages/tests.*.json`
4. **Block views**: componenti generici (hero, card, grid)
5. **Header/Footer**: componenti AGID esistenti

## 9. Documentazione

- Theme docs: `laravel/Themes/Sixteen/docs/`
- Module docs: `laravel/Modules/Cms/docs/`
- Index: bidirezionale con link relativi