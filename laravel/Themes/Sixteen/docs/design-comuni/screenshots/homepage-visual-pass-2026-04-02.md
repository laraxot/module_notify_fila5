# Homepage Visual Pass 2026-04-02

Report strutturale correlato: [../homepage-structure-diff-2026-04-02.md](../homepage-structure-diff-2026-04-02.md)

Screenshot salvati:
- `reference-homepage-2026-04-02.png`
- `reference-homepage-full-2026-04-02.png`
- `fixcity-homepage-after-2026-04-02.png`
- `fixcity-homepage-after-full-2026-04-02.png`
- `fixcity-homepage-pass2-2026-04-02.png`
- `fixcity-homepage-pass2-full-2026-04-02.png`

## Osservazioni principali

1. Header e navbar sono molto vicini alla reference per colori, allineamento e gerarchia.
2. Il secondo pass hero ha ridotto il gap di spacing nella prima viewport; il blocco testo parte piu' in alto ed e' piu' vicino alla reference.
3. Le card di governance e il ritmo verticale delle sezioni centrali sono leggibili, ma restano ancora leggermente piu' compatte del riferimento.
4. Evidence section e useful-links sono coerenti, ma alcuni spacing e altezze card non sono ancora chiusi.
5. Il confronto pixel-perfect resta falsato dai placeholder `picsum.photos`, che cambiano immagine a ogni caricamento; la normalizzazione JS riduce ma non elimina del tutto questo rumore.

## Interventi applicati nei pass correnti

### CSS

In `resources/css/app.css` sono stati aggiunti override scoped a `.dc-homepage-parity` per:
- altezze header/navbar
- spaziatura hero
- typography hero
- immagine hero
- min-height e padding card governance
- padding evidence section
- spacing useful-links, rating, contatti, footer
- refinement ulteriore della hero nel pass2

### JS

In `resources/js/app.js` e' stata aggiunta una normalizzazione leggera dei placeholder immagini sulla homepage di test per ridurre la casualita' visiva nelle verifiche.

## Limiti residui

1. L'hero non e' ancora pixel-identica alla reference.
2. Le tre card governance sono ancora da affinare in altezza e ritmo interno.
3. Il blocco useful-links -> rating -> contacts ha ancora un delta verticale percepibile rispetto alla reference.
4. La presenza nel DOM della `.cmp-search` dentro `#head-section` resta una differenza strutturale secondaria, oggi mascherata via CSS.

## Comandi eseguiti

```bash
cd laravel/Themes/Sixteen
npm run build
npm run copy
```

Poi e' stato necessario copiare esplicitamente i bundle finali in `public_html/themes/Sixteen` per riallineare gli asset realmente serviti da `127.0.0.1:8000`.
