# Homepage Parity Report

## Scope

Route analizzata: `http://127.0.0.1:8000/it/tests/homepage`  
Riferimento: `https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html`

File sorgente coinvolti:

- `resources/views/pages/tests/[slug].blade.php`
- `resources/views/components/layouts/app.blade.php`
- `resources/views/components/layouts/main.blade.php`
- `resources/views/components/sections/header/v1.blade.php`
- `resources/views/components/sections/search-modal.blade.php`
- `resources/css/app.css`
- `resources/js/app.js`

## Differenze HTML trovate

Prima del fix la homepage locale differiva in quattro punti strutturali:

1. Dentro `main` era presente un wrapper Livewire/Volt con attributi `wire:*`.
2. Il markup conteneva commenti `<!--[if BLOCK]...-->` generati da Volt.
3. Il `search-modal` era renderizzato subito dopo `header`, mentre nel riferimento è dopo `main`.
4. In fondo al `body` comparivano asset extra (`style`, `link rel="modulepreload"`) perché il JS Vite veniva emesso nel body per la route di test.

## Interventi applicati

1. Rendering Blade puro per la route `tests.view`.
2. `main` con `id="main-container"`.
3. Search modal estratto in un partial dedicato.
4. Modal spostato dopo `main` e prima del footer.
5. Bundle JS Vite spostato nell`head` per le route `tests.*`.
6. Override CSS scoped a `.dc-homepage-parity` per riallineare palette e blocchi principali.
7. JS completato per search modal, `Escape` e hamburger menu.

## Differenze visive principali

Le differenze visive più evidenti prima del fix erano:

- palette blu nella top bar e nel footer invece del verde/grigio del riferimento
- sezione feedback blu invece che verde
- gerarchia del blocco “Argomenti in evidenza” troppo fredda rispetto al riferimento
- comportamento JS incompleto del modal e del menu mobile

## Verifica consigliata

1. `npm run build`
2. `npm run copy`
3. screenshot della route locale e del riferimento
4. confronto finale di header, feedback, footer e modal di ricerca
