# CSS/JS Pass 2026-04-04

## Scope

Pass operativo focalizzato su:
- `lista-risorse`
- `mappa-sito`

Vincoli rispettati in questo pass:
- nessun uso runtime di Bootstrap Italia
- fix applicati solo in `resources/css` e `resources/js` del tema Sixteen
- confronto eseguito contro la reference ufficiale Design Comuni

## File toccati

- `../../resources/css/app.css`
- `../../resources/css/page-parity.css`
- `../../resources/js/app.js`

## Evidenza visiva

### Lista risorse

- Locale prima: [screenshots/lista-risorse/local.png](./screenshots/lista-risorse/local.png)
- Reference: [screenshots/lista-risorse/reference.png](./screenshots/lista-risorse/reference.png)
- Locale dopo: [screenshots/lista-risorse/local-after.png](./screenshots/lista-risorse/local-after.png)

### Mappa sito

- Locale prima: [screenshots/mappa-sito/local.png](./screenshots/mappa-sito/local.png)
- Reference: [screenshots/mappa-sito/reference.png](./screenshots/mappa-sito/reference.png)
- Locale dopo: [screenshots/mappa-sito/local-after.png](./screenshots/mappa-sito/local-after.png)

## Cosa ha migliorato davvero il pass CSS/JS

### lista-risorse

Miglioramenti osservabili nel confronto screenshot:
- hero title e sommario piu vicini alla reference per scala e larghezza
- sezione `Notizie in evidenza` con card piu leggibili e immagini finalmente visibili
- sezione `Esplora tutte le novita` riportata a blocco grigio full-width, con griglia a 3 colonne desktop invece del layout troppo sparso precedente
- card news riallineate per bordo, ombra, immagine e gerarchia tipografica
- paginazione centrata e meno pesante
- banda feedback resa piu simile come struttura generale

Tecnica usata:
- classi `body.page-tests-*` aggiunte da JS in base allo slug
- annotazione DOM specifica per `lista-risorse`
- override CSS isolati in `page-parity.css`
- normalizzazione immagini teaser via JS con asset reference

### mappa-sito

Miglioramento marginale.

Il titolo e alcuni ritocchi tipografici possono essere gestiti via CSS, ma il rendering locale resta strutturalmente diverso dalla reference: il locale mostra card grandi a griglia, la reference mostra una lunga gerarchia testuale di link. Questo non e un problema di styling ma di markup/contenuto prodotto da Blade/JSON.

## Limiti emersi

### lista-risorse

Anche dopo il pass CSS/JS restano gap che non posso chiudere in modo serio senza tornare su Blade/JSON:
- blocco feedback e contatti non perfettamente equivalente alla reference
- il flusso dei blocchi inferiori non coincide ancora al 100%
- alcune immagini sono state riallineate via JS per parity visiva, ma la sorgente corretta dovrebbe vivere nel JSON

### mappa-sito

Il collo di bottiglia e strutturale:
- la reference e una sitemap testuale lunga
- il locale e una pagina a card
- qui il CSS/JS non basta per arrivare vicino al 90%

## Decisione operativa

Regola confermata dal pass:
- quando la struttura del `body` non e gia almeno vicina, il CSS/JS puo migliorare molto la percezione ma non puo chiudere il gap finale
- `lista-risorse` e una buona candidata per continuare con parity visiva incrementale
- `mappa-sito` deve prima rientrare in un pass Blade/JSON

## Prossimi passi consigliati

1. Continuare il cluster CSS/JS sulle pagine con struttura gia ragionevolmente vicina, iniziando da `lista-risorse`, `argomenti`, `domande-frequenti` e `homepage`.
2. Tenere fuori dal pass solo-CSS le pagine come `mappa-sito` che hanno drift di markup troppo alto.
3. Portare le immagini corrette dentro i JSON, rimuovendo la dipendenza dal fallback JS.
4. Aggiungere un secondo pass su `lista-risorse` per rifinire feedback/contatti dopo confronto screenshot piu fine.

## Link bidirezionali

- Indice Design Comuni: [00-index.md](./00-index.md)
- Piano master: [MASTER_IMPLEMENTATION_PLAN.md](./MASTER_IMPLEMENTATION_PLAN.md)
- Report batch body parity: [BATCH_BODY_PARITY_REPORT.md](./BATCH_BODY_PARITY_REPORT.md)
