# Argomenti Body/Header Parity Rule

## Contratto

Per `http://fixcity.local/it/tests/argomenti` il `body`, esclusi gli script, deve convergere verso l'HTML di riferimento di `https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html`.

La stessa regola vale per tutte le altre pagine replicate da Design Comuni.

## Baseline Salvata

- screenshot ufficiale: `argomenti-reference-current.png`
- body ufficiale senza script: `argomenti-reference-body.html`
- header ufficiale: `argomenti-reference-header.html`
- source locale attuale della section: `argomenti-local-header-section-source.blade.php`

## Osservazioni Iniziali

- l'header locale corrente contiene elementi non presenti nel riferimento o non allineati: `dark-mode-switcher`, social nel masthead, menu utente articolato, etichette placeholder come `Nome della Regione`
- il riferimento Design Comuni usa una gerarchia header molto precisa: slim header, brand area istituzionale, action/search, primary navigation e megamenu con struttura AGID coerente
- il logo del tenant genera ancora errore di pubblicazione asset verso `public_html/assets/fixcity/images/logo.svg` per permessi, quindi anche l'aderenza visiva del brand è ancora incompleta

## Correzione Richiesta

1. rifare `x-section slug="header"` come section AGID-first, non come header generico del tema
2. tenere la struttura del body/header conforme al riferimento e spostare eventuali extra di progetto fuori dall'header canonico
3. usare il tema e Vite per stile/comportamento, non Bootstrap runtime
4. compilare con `npm run build` e pubblicare con `npm run copy`
5. documentare sempre sorgente di riferimento, differenze residue e fix applicati

## Prossimo Step Operativo

- estrarre il blocco header dal riferimento e mapparlo in componenti/slot Tailwind del tema
- semplificare la section `header/v1.blade.php` verso la struttura AGID reale
- risolvere il logo asset path/permessi per allineare il brand block

## Fix Applicato Alla Section Header

- `Themes/Sixteen/resources/views/components/sections/header/v1.blade.php` è stata riallineata verso la gerarchia del riferimento AGID:
  - slim header con Regione + lingua + area personale
  - brand area con logo e testo istituzionale
  - social e search nella right zone desktop
  - primaria e secondaria navigation nel wrapper navbar
  - blocco social anche nel menu mobile
- il logo del brand nell'header ora usa `asset('themes/Sixteen/images/logo.svg')`, evitando la dipendenza diretta dal copy runtime di `fixcity::images/logo.svg`

## Script Tema Studiati

Dal `package.json` del tema:

- `npm run build` compila gli asset Vite del tema
- `npm run copy` pubblica `Themes/Sixteen/public/*` in `public_html/themes/Sixteen/`
- `npm run copy:filament` pubblica anche `resources/dist/*` oltre agli asset public

Uso operativo:

1. modifiche Blade pure: non richiedono build
2. modifiche CSS/JS sotto `Themes/Sixteen/resources/*`: richiedono `npm run build`
3. per rendere disponibili gli asset compilati al vhost: `npm run copy`
