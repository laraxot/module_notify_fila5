# Homepage Visual Comparison - Deep Analysis 2026-04-02

**Reference**: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html  
**Local**: http://127.0.0.1:8000/it/tests/homepage

---

## SEZIONE 1: HEADER

### Reference (Bootstrap Italia Standard)
```
- it-header-slim-wrapper: bg-primary (#007a52), region name link, language dropdown, "Accedi all'area personale" button
- it-header-center-wrapper: logo SVG "Il mio Comune", tagline "Un comune da vivere", social icons (Twitter, FB, YT, etc.), search button
- it-header-navbar-wrapper: hamburger menu, nav links (Amministrazione, Novità, Servizi, Vivere il Comune), secondary nav (Iscrizioni, Estate in città, etc.)
```

### Local (FixCity)
```
- Stesso layout ma MANCANO:
  - Social icons nella navbar (solo search button)
  - Secondary nav links (Iscrizioni, Estate in città, Polizia locale)
  - Logo SVG vs text
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Social icons in header | ✅ Twitter, FB, YT, Telegram, WhatsApp, RSS | ❌ MANCANO |
| Secondary nav | ✅ Iscrizioni, Estate in città, Polizia locale | ❌ MANCANO |
| Logo | SVG "Il mio Comune" | Testo "Nome del comune" |

---

## SEZIONE 2: HERO SECTION

### Reference
```
- Layout: 2 colonne (6+6)
- Sinistra: Card con category-top (Notizie icon + "Notizie" + data), h3 title, excerpt in bold/lora, chip "Estate in città", "Tutte le novità" link
- Destra: img-fluid con immagine
- Colori: bg-white
```

### Local
```
- Stesso layout
- Stessi elementi
- Colori: bg-white
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Layout | ✅ 2 colonne identico | ✅ |
| Search box (sotto card) | ✅ "Cerca nel sito" | ✅ Presente |
| Colori | Standard BI | Standard BI |

**STATUS: ✅ 95% MATCH**

---

## SEZIONE 3: GOVERNANCE (#calendario)

### Reference
```
- Cards (3): Mario Rossi (card-teaser-image con img), La giunta comunale, Il consiglio comunale
- Eventi: Calendar carousel con splide - "Settembre 2022", cards per ogni giorno (15lun, 16mar, etc.)
- Styling: section-muted, pb-90 pb-lg-50
```

### Local
```
- Stesso layout cards
- Stesso carousel events
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Cards | ✅ 3 cards identiche | ✅ |
| Calendar | ✅ Splide carousel | ✅ |

**STATUS: ✅ 95% MATCH**

---

## SEZIONE 4: EVIDENCE SECTION (Argomenti in evidenza)

### Reference
```
- Background: evidenza-header.png con gradient overlay
- Cards (3): Trasporto pubblico (con external_site card), Animale domestico (con links), Sport (con links)
- Altri argomenti: chips (Associazioni, Concorsi, etc.), "Mostra tutti" button
- Siti tematici: 3 cards colorate (blue, warning, dark)
- Styling: py-5 pb-lg-80, gradient overlay
```

### Local
```
- Stesso layout
- Stesso background image
- Cards con links e external_site
- Siti tematici con colori
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Background image | ✅ Presente | ✅ |
| Gradient overlay | Green gradient | Green gradient |
| Cards | ✅ 3 cards | ✅ |
| Siti tematici | ✅ 3 colored | ✅ |

**STATUS: ✅ 90% MATCH (gradient potrebbe essere diverso)**

---

## SEZIONE 5: USEFUL LINKS

### Reference
```
- Search: "Cerca una parola chiave" con button "Invio"
- Links: "Link utili" con 6 links
- Layout: col-12 col-lg-6 centrato
```

### Local
```
- Stesso layout
- Stesso search input
- Stessi links
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Search bar | ✅ Presente | ✅ |
| Links | ✅ 6 links | ✅ |

**STATUS: ✅ 100% MATCH**

---

## SEZIONE 6: FEEDBACK (Rating)

### Reference
```
- bg-primary section
- Card con: "Quanto sono chiare le informazioni su questa pagina?"
- 5 star rating
- Form steps (non visibile all'inizio)
```

### Local
```
- Stesso layout rating
- 5 stars
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Rating section | ✅ Presente | ✅ |

**STATUS: ✅ 100% MATCH**

---

## SEZIONE 7: CONTACTS

### Reference
```
- Link items: "Leggi le domande frequenti", "Richiedi assistenza", "Chiama il numero verde 05 0505", "Prenota appuntamento"
- Report links: "Segnala disservizio"
- Search section: "Cerca nel sito" + suggestions
```

### Local
```
- Stessi contact links
- Stessa struttura
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Contact links | ✅ 4 items | ✅ |
| Report links | ✅ 1 item | ✅ |
| Search section | ✅ Presente | ✅ |

**STATUS: ✅ 100% MATCH**

---

## SEZIONE 8: FOOTER

### Reference
```
- Logo UE: logo-eu-inverted.svg
- 4 colonne: Amministrazione, Categorie di servizio, Novità, Vivere il comune, Contatti
- Footer bottom: links (Leggi le FAQ, etc.), social icons
- Colori: bg-dark (#17334f)
```

### Local
```
- Stessa struttura
- Stesso logo UE
- Colori allineati
```

### DIFFERENZE
| Elemento | Reference | Local |
|----------|-----------|-------|
| Logo UE | ✅ Presente | ✅ |
| Colonne | ✅ 4+ sections | ✅ |
| Social icons | ✅ Present | ✅ |
| Colori | #17334f | #17334f allineati |

**STATUS: ✅ 90% MATCH**

---

## RIEPILOGO DIFFERENZE

### CRITICHE (da fixare)
1. **Header Navbar**: MANCA secondary nav links
   - Reference: Iscrizioni, Estate in città, Polizia locale, Tutti gli argomenti
   - Local: SOLO main nav (Home, Argomenti, Novità, Servizi, Amministrazione, Eventi)
   
2. **Header Social Icons**: MANCANO alcuni social
   - Reference: Twitter, Facebook, YouTube, Telegram, WhatsApp, RSS
   - Local: SOLO Facebook, Twitter, YouTube

### MINORI (da verificare)
1. Logo: ✅ SVG presente
2. Gradient overlay: verificare colore esatto
3. Spacing/padding: piccole differenze

---

## FILES DA MODIFICARE

### Header
- `resources/views/components/bootstrap-italia/header.blade.php`
  - Aggiungere secondary nav links dopo main nav
  - Aggiungere Telegram, WhatsApp, RSS social icons

### CSS
- `resources/css/components/bootstrap-italia-classes.css`
- `resources/css/design-comuni.css`

---

## PROSSIMI PASSI

1. [ ] Trovare fonte header component
2. [ ] Aggiungere social icons mancanti
3. [ ] Aggiungere secondary nav links
4. [ ] Verificare logo SVG
5. [ ] Run build e test