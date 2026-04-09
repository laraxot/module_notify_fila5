# CSS/JS Parity Phase - Design Comuni

## Obiettivo
Lavorando SOLO su CSS/JS (HTML è sacro, 80.6%+ parity strutturale), rendere il sito
visivamente identico al reference: https://italia.github.io/design-comuni-pagine-statiche/sito/

## Stato Attuale

### Struttura CSS
| File | Righe | Scopo |
|---|---|---|
| `style-apply.css` | 3259 | Bootstrap Italia → Tailwind @apply mapping |
| `components/bootstrap-italia-classes.css` | 1500 | Classi Bootstrap Italia replicate |
| `segnalazione-parity.css` | 2436 | Stili specifici pagine segnalazione |
| `homepage-parity-v2.css` | 845 | Fix homepage parity |
| Altri file parity | ~3000 | Argomenti, servizi, admin, ecc. |
| **Totale** | **~11000+** | |

### Classi Mancanti Aggiunte (2026-04-09)
- `.ps-5` — padding-start 3rem
- `.has-megamenu` — navbar mega menu positioning
- `.mobile-fill` — mobile full-width utility
- `.perfect-scrollbar` — custom scrollbar styling

### Merge Conflict Risolti
- `homepage-parity-v2.css` — rimosso marker `>>>>>>> 36abb5a44`

### HTML Parity Scores
| Pagina | Match % | Struttura Ref | Struttura Locale |
|---|---|---|---|
| segnalazione-01-privacy | 80.6% | 850 righe | 854 righe |
| segnalazione-02-dati | TBD | | |
| segnalazione-03-riepilogo | TBD | | |
| segnalazione-04-conferma | TBD | | |

## Architettura CSS

### Layer Order (app.css)
```
1. Tailwind base/components/utilities
2. style-apply.css (Bootstrap Italia mapping)
3. container-override.css
4. footer-override.css
5. bootstrap-italia.css
6. components/bootstrap-italia-classes.css
7. components/design-comuni.css
8. design-comuni-visual-fix.css
9. design-comuni-global.css
10. Segnalazione/Argomenti/Servizi parity files
11. app.css overrides finali
```

### Design Tokens
```css
--italia-green: #007a52
--italia-green-dark: #005c40
--italia-blue: #0073e6
--italia-gray-900: #1A1A1A
--italia-gray-700: #5C6F82
```

## Build Process
```bash
cd laravel/Themes/Sixteen
npm run build    # Compila CSS/JS
npm run copy     # Copia in public_html/themes/Sixteen/
```

## JavaScript Components
- **Alpine.js** — interattività (dropdown, search modal, rating, menu)
- **Splide** — carousel eventi
- **Nessun Bootstrap Italia JS** — tutto replicato con Alpine.js

## Checklist Verifica Manuale
Senza screenshot automatici, verificare visivamente:

### Segnalazione-01-Privacy
- [ ] Header colori (slim: #00402B, center: #007a52, nav: #007a52)
- [ ] Breadcrumb spacing e colori
- [ ] Title font-size 2.5rem, weight 700
- [ ] Stepper: step attivi (verde), inattivi (grigio)
- [ ] Privacy text: font-size 1rem, line-height 1.5
- [ ] Checkbox: dimensione 1.25rem, colore check #007a52
- [ ] Bottone "Avanti": bg #007a52, text white, border-radius 4px
- [ ] Sezione contatti: bg #f5f6f7, card con shadow
- [ ] Footer: bg #202a2e

### Segnalazione-02-Dati
- [ ] Form inputs: border #5c6f82, focus ring #007a52
- [ ] Select dropdown: wrapper con icona freccia
- [ ] Textarea: rows 5, resize none

### Segnalazione-03-Riepilogo
- [ ] Callout warning: bg giallo, icona corno
- [ ] Info summary: card con border-light, padding 1.5rem

### Segnalazione-04-Conferma
- [ ] Icona successo: verde grande
- [ ] Testo conferma: font-size 1.25rem
- [ ] Link area riservata: verde sottolineato

## Regole
- HTML NON si tocca (solo CSS/JS)
- Date nei file .md: MAI nel nome file
- Documentare ogni cambio nei docs del tema
- Build + copy dopo ogni modifica CSS

## See Also
- [Segnalazione CSS Diff](segnalazione-css-diff.md)
- [Design Comuni Master Plan](design-comuni/MASTER_IMPLEMENTATION_PLAN.md)
- [Sixteen Theme Index](../../docs/themes/index.md)
