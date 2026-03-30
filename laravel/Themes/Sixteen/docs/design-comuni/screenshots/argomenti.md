# Argomenti - Analisi Visiva e Strutturale

## Artifact
- Screenshot locale atteso: `argomenti-local.png`
- Screenshot reference: `argomenti-reference.png`
- Data verifica: 2026-03-30

## Esito sintetico
No. `http://fixcity.local/it/tests/argomenti` non e ancora allineata a `https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html`.

Il problema pero non e solo grafico. La pagina era modellata con un blocco semanticamente sbagliato e con errori runtime secondari che nascondevano la diagnosi reale.

## Errore strutturale identificato
Errore osservato:

```text
Unable to locate a class or view for component [pub_theme::components.blocks.tests.argomenti.topics-grid]
```

Questo errore nasconde due problemi distinti:
1. `tests.argomenti` non e un tipo di blocco valido secondo il contratto `pub_theme::components.blocks.<tipo blocco>.<blade del blocco>`
2. il JSON `tests.argomenti.json` era ancora modellato con `type = page_block`, cioe un pattern legacy di bootstrap e non una composizione semantica reale

## Correzione applicata
Ho riallineato la pagina a blocchi semantici reali:
- `hero.main`
- `topics.grid`
- `cta.banner`
- `tests.source-link`

Questo evita di ricreare il falso namespace `tests.argomenti.*` e sposta il corpo pagina su un blocco riusabile `topics.grid` coerente con Tailwind, Flowbite, Tailwind UI Blocks e DaisyUI come sorgenti di ispirazione.

## Errore runtime secondario corretto
Nel footer del tema c'era anche un componente Heroicon inesistente:

```text
heroicon-o-facebook
```

Questo errore sporca il render del frontoffice e rende meno affidabile ogni verifica visuale. E stato sostituito con un SVG inline, cosi il footer non rompe piu la pagina durante il rendering.

## Gap ancora aperto rispetto alla reference
La reference ufficiale include piu sezioni di quante oggi ne replichi FixCity:
- header istituzionale molto piu vicino al design system PA
- area introduttiva con copy e spaziature piu raffinate
- sezione in evidenza con card visuali
- griglia ampia di argomenti
- banner feedback verde
- box contatti e footer completi

La correzione attuale risolve il contratto dei blocchi e mette una base semantica corretta, ma non chiude ancora il gap di fedelta visiva.

## Come proseguire correttamente
1. verificare che `/it/tests/argomenti` risponda senza timeout dopo il riallineamento dei blocchi
2. rigenerare lo screenshot locale
3. introdurre blocchi semantici aggiuntivi per `featured cards`, `feedback banner`, `contact box`
4. rifinire tipografia, ritmo verticale e cromie per avvicinarsi alla reference ufficiale

## Regola fissata
Per le pagine Design Comuni:
- `tests.*` puo esistere come famiglia di blocchi helper o infrastrutturali
- il corpo pagina va espresso con tipi di blocco reali, ad esempio `hero`, `topics`, `cta`, `cards`, `links`, `stats`
- non si devono creare pseudo-tipi come `tests.argomenti`
