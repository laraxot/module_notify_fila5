# Footer Argomenti Parity

## Obiettivo

Replicare il footer di riferimento di `https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html` dentro `http://fixcity.local/it/tests/argomenti` usando la section canonica `<x-section slug="footer" />`.

Per varianti future piu compatte il contratto resta:

- footer standard: `<x-section slug="footer" />`
- footer slim: `<x-section slug="footer" tpl="slim" />`

## Baseline Studiata

Reference strutturale usata:

- `Themes/Sixteen/resources/views/pages/prova01.blade.php` righe footer AGID reference
- `Themes/Sixteen/Main_files/five/src/style-apply.css` regole `.it-footer*`
- `Themes/Sixteen/docs/design-comuni/screenshots/argomenti-reference-body.html` come body di riferimento salvato

## Problema Trovato

La section precedente `components/sections/footer/v1.blade.php` era un footer custom da consulente, con tassonomia, testi e struttura non compatibili con Design Comuni.

Questa implementazione era sbagliata per tre motivi:

1. non rispettava la gerarchia AGID del footer del reference
2. non usava la grammatica visuale `.it-footer`, `.it-footer-main`, `.footer-items-wrapper`, `.footer-bottom`
3. impediva la convergenza del `body` locale verso l'HTML di riferimento

## Correzione Applicata

La nuova section `components/sections/footer/v1.blade.php` adesso replica la struttura reference:

- riga iniziale con logo UE + brand comune
- colonna `Amministrazione`
- colonna doppia `Categorie di servizio`
- colonna `Novita` + `Vivere il comune`
- area `Contatti` con link servizio e legali
- colonna `Seguici su`
- bottom row con `Media policy` e `Mappa del sito`

## Asset Allineati

Per il footer reference serve il logo UE invertito. Era presente solo in `Main_files`.

Asset riallineato:

- sorgente: `Themes/Sixteen/Main_files/five/assets/images/logo-eu-inverted.svg`
- destinazione tema: `Themes/Sixteen/public/images/logo-eu-inverted.svg`

Questo consente la pubblicazione corretta tramite `npm run copy` in `public_html/themes/Sixteen/`.

## Script Compresi

Dal `package.json` del tema:

- `npm run build`: compila asset Vite del tema
- `npm run copy`: pubblica `public/*` dentro `public_html/themes/Sixteen/`

Uso corretto per il footer:

1. modifica Blade/CSS/JS nel tema
2. `npm run build`
3. `npm run copy`

## Differenze Residue

Dopo il fix footer, il body locale di `argomenti` non e ancora completamente allineato al reference per motivi che stanno fuori dal solo footer:

- richieste legacy a `/css/app.css` e `/js/app.js`
- richieste legacy a `/profile`, `/tickets`, `/settings`
- cookie-consent ancora in 404

Questi segnali indicano markup/body legacy ancora presente in altri blocchi della pagina.

## Prossimo Step Corretto

1. fare dump del body locale finale post-render
2. isolare i blocchi che generano asset e link legacy
3. migrare quei blocchi a markup CMS/Tailwind coerente con il reference
4. salvare screenshot comparativi locali/reference anche per il footer una volta stabilizzato il dump del body locale

## Evidenze Salvate

- screenshot reference footer/full page: `screenshots/argomenti-reference-footer-full.png`
- screenshot locale dopo riallineamento header/footer: `screenshots/argomenti-local-after-header-fix.png`
