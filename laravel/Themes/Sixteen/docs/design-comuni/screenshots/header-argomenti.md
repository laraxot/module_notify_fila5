# Header Argomenti - Analisi e Correzione

Data: 2026-03-30  
Riferimento: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html  
Target locale: http://fixcity.local/it/tests/argomenti

## Screenshot

- Reference screenshot: `header-argomenti-reference.png`
- Local screenshot: non disponibile, il runtime locale non completa il caricamento della pagina entro 60s

## Stato reale

L'header attivo del tema era diverso dal `cmp-header` ufficiale in quattro aree strutturali:

1. Slim bar non fedele: includeva `dark-mode-switcher` e una utility zone diversa dal prototipo.
2. Center bar incompleta: set social sbagliato e search area non allineata.
3. Navbar secondaria incompleta: mancava il trattamento evidenziato di `Tutti gli argomenti` con freccia.
4. Densità visiva non coerente: spaziature, pills e gerarchia dei tre livelli non seguivano il design reference.

## Correzione applicata

File corretto:
`laravel/Themes/Sixteen/resources/views/components/sections/header/v1.blade.php`

La section `header` ora resta chiamata correttamente tramite `<x-section slug="header" />`, ma la view attiva è stata riallineata al reference con un'implementazione Tailwind a tre bande:

1. Slim band:
   - link regione
   - badge lingua `ITA`
   - accesso area personale come pill compatta
2. Center band:
   - logo + titolo + tagline
   - 6 social coerenti con Design Comuni: Twitter, Facebook, YouTube, Telegram, Whatsapp, RSS
   - trigger search dedicato
3. Nav band:
   - menu principale a 4 voci
   - menu secondario a 4 voci
   - `Tutti gli argomenti` con chevron
   - menu mobile coerente con gli stessi item

## Perché questa è la direzione corretta

- L'header è una `section`, non una pagina e non un blocco CMS.
- Il progetto non deve caricare Bootstrap Italia nel frontoffice finale; va replicata la resa con Tailwind e asset del tema.
- Il file giusto da toccare è la section attiva del tema, non view legacy o componenti bootstrap-like non usati dal layout.

## Build del tema

Durante la compilazione è emerso un guasto reale del tema:

- errore iniziale: `Could not resolve entry module "alpinejs"`
- causa: il tema usa plugin Alpine in `resources/js/custom.js`, ma `alpinejs` non era presente nelle dipendenze runtime del tema

Correzione applicata:

```bash
cd laravel/Themes/Sixteen
npm install alpinejs
npm run build
npm run copy
```

## Perché servono sia `build` che `copy`

- `npm run build` genera `public/manifest.json`, CSS e JS compilati nella cartella del tema.
- `npm run copy` pubblica quei file in `public_html/themes/Sixteen/`, cioè la destinazione realmente letta dal frontoffice Laravel.

Se si fa solo `build`, il browser continua a servire asset vecchi o mancanti.
Se si fa solo `copy`, si pubblica materiale non aggiornato.

## Stato runtime locale

Dopo la correzione header e la pubblicazione asset:

- `npm run build`: completato con successo
- `npm run copy`: completato con successo
- `curl -m 20 -I http://fixcity.local/it/tests/argomenti`: timeout
- `playwright screenshot --timeout 60000 http://fixcity.local/it/tests/argomenti ...`: timeout durante `load`

Quindi il delta header è stato corretto nel tema, ma la verifica visuale locale è ancora bloccata da un problema runtime a monte della pagina.

## Prossimo fix necessario

1. isolare il blocco runtime di `fixcity.local`
2. ottenere uno screenshot locale affidabile
3. confrontare reference e locale a parità di viewport
4. rifinire colori, spessori e allineamenti al pixel se necessario
