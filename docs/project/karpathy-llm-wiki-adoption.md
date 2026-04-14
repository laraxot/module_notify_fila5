# Karpathy LLM Wiki per FixCity

> Stato: proposta applicata al repository
> Aggiornato: 2026-04-14
> Ambito: documentazione di progetto, ricerca, memoria operativa agentica

## Cos'e

Il 4 aprile 2026 Andrej Karpathy ha pubblicato il gist `llm-wiki.md`, dove propone un pattern diverso dal classico RAG: invece di interrogare sempre le fonti grezze, l'agente mantiene un wiki markdown persistente che viene aggiornato a ogni nuova fonte e a ogni nuova sintesi utile.

Fonti primarie:

- Karpathy, `llm-wiki.md`: <https://gist.github.com/karpathy/442a6bf555914893e9891c11519de94f>
- Tobi Lutke, `qmd`: <https://github.com/tobi/qmd>

## Idea chiave

Il pattern ha tre layer:

1. `raw sources`
2. `wiki`
3. `schema`

Tradotto per noi:

- Le fonti restano immutabili.
- Il wiki e il layer che sintetizza, collega, deduplica e segnala contraddizioni.
- Lo schema sono le regole che guidano gli agenti quando leggono, aggiornano e interrogano il wiki.

## Perche ci serve qui

Questo repository ha gia molti ingredienti compatibili con il pattern, ma oggi sono sparsi:

- `docs/` contiene verita operative e storiche, ma con forte rumore.
- `.planning/` contiene ricerca, contesto temporaneo e artefatti di lavoro.
- `design-artifacts/` contiene specifiche di prodotto e UX.
- `bashscripts/docs/` contiene conoscenza eseguibile legata agli script.
- `.openviking`, `.supermemory` e memorie agentiche catturano contesto, ma non sempre in forma navigabile da repo.

Il valore del modello Karpathy qui non e fare "un altro sistema docs". Il valore e introdurre un layer compilato e persistente che:

- accumula sintesi invece di rifarle a ogni sessione;
- separa fonti grezze da conoscenza consolidata;
- rende piu facile per gli agenti trovare il file giusto;
- riduce duplicazioni, drift documentale e chat-history loss.

## Mapping sulla nostra struttura

### 1. Raw sources

Per FixCity, le fonti grezze canoniche dovrebbero essere queste:

- `.planning/research/` per ricerche esterne e raccolta materiale
- `.planning/external/` per acquisizioni esterne e dump temporanei
- `docs/project/visual-comparison/` per catture e confronti HTML/visuali
- `design-artifacts/` per brief, trigger map, UX scenarios e PRD
- `laravel/Modules/*/docs/` e `laravel/Themes/*/docs/` quando fanno da fonte di dominio
- `bashscripts/docs/` quando lo script e la fonte primaria della procedura

Regola operativa:

- Le raw sources non vanno riscritte per farle "piu belle".
- Se serve una sintesi, la sintesi va nel wiki layer, non nella fonte.

### 2. Wiki

Per noi il wiki layer non deve nascere fuori dal repo. Deve stare nel repo, sotto `docs/project/`, e puntare alle fonti reali.

Da oggi i primi artifact del wiki layer sono:

- [`llm-wiki-index.md`](./llm-wiki-index.md)
- [`llm-wiki-log.md`](./llm-wiki-log.md)
- questo documento di adozione

Uso previsto:

- `llm-wiki-index.md` = catalogo tematico dei nodi di conoscenza utili agli agenti
- `llm-wiki-log.md` = log cronologico append-only di ingest, query, lint, decisioni
- topic pages future = pagine stabili su argomenti ricorrenti ad alta utilita

Esempi di future topic pages ad alto ROI:

- `ticket-wizard-knowledge.md`
- `design-comuni-parity-knowledge.md`
- `filament-v5-fixcity-patterns.md`
- `agent-memory-architecture.md`
- `docs-governance-knowledge.md`

### 3. Schema

Il nostro schema esiste gia in forma distribuita:

- `AGENTS.md`
- `CLAUDE.md`
- `PROJECT.md`
- `docs/project/docs-governance.md`

Il pattern Karpathy ci suggerisce di trattarli come configurazione del maintainer agent, non come semplice documentazione umana.

Quindi gli agenti dovrebbero seguire queste regole:

1. leggere prima schema e index;
2. leggere le fonti raw solo dopo aver individuato i nodi rilevanti;
3. salvare sintesi riusabili come pagine wiki, non solo in chat;
4. appendere sempre un evento al log quando una nuova conoscenza cambia il quadro;
5. fare lint periodico su pagine orfane, duplicazioni, contraddizioni e file rumorosi.

## Workflow consigliato per noi

### Ingest

Quando entra una nuova fonte:

1. l'agente la classifica come `raw source`;
2. aggiorna o crea una pagina wiki stabile;
3. aggiunge link bidirezionali nel catalogo;
4. registra l'evento in `llm-wiki-log.md`.

### Query

Quando facciamo una domanda progettuale:

1. l'agente parte da `llm-wiki-index.md`;
2. apre le pagine wiki rilevanti;
3. scende alle raw sources solo se serve verifica;
4. se la risposta produce una sintesi riusabile, la salva nel wiki.

### Lint

Una volta che il sistema cresce, va eseguito periodicamente un passaggio di controllo:

- pagine senza backlink;
- argomenti duplicati in file diversi;
- documenti obsoleti che competono con il source of truth;
- gap informativi che richiedono nuova ricerca o web search.

## Come usarlo con gli strumenti che abbiamo gia

### Con Supermemory e OpenViking

Supermemory e OpenViking non sostituiscono il wiki. Lo completano.

- Supermemory e utile per retrieval semantico sessionale e cross-session.
- OpenViking e utile per memoria operativa e collegamenti.
- Il wiki nel repo resta l'artefatto persistente, ispezionabile, versionato e reviewabile.

Regola:

- memoria volatile o operativa in memory tools;
- conoscenza consolidata e reviewabile in markdown nel repo.

### Con NotebookLM

NotebookLM puo servire come ambiente di analisi source-grounded per corpora esterni o grossi pacchetti documentali.

Ma il risultato utile non deve restare solo nel notebook:

- la fonte o il batch resta esterno;
- la sintesi finale va riversata nel wiki del repo;
- il log deve registrare che la sintesi deriva da NotebookLM.

### Con QMD

Karpathy cita QMD come upgrade naturale quando il wiki cresce. Per noi ha senso soprattutto per due casi:

- ricerca rapida dentro `docs/`, `bashscripts/docs/`, `design-artifacts/`
- retrieval per agenti senza rileggere centinaia di file

Uso consigliato qui:

- collezione `project-docs` su `docs/`
- collezione `scripts-docs` su `bashscripts/docs/`
- collezione `design-artifacts` su `design-artifacts/`

Se adottato, QMD non sostituisce il catalogo manuale del wiki. Lo accelera.

## Decisione pratica per FixCity

L'adozione corretta non e costruire subito un mega knowledge base. E introdurre una disciplina leggera:

1. fonti grezze separate;
2. poche pagine wiki stabili e ad alto valore;
3. un catalogo centrale;
4. un log append-only;
5. lint periodico.

## Prossimi passi consigliati

1. Popolare `llm-wiki-index.md` con 10-20 nodi reali del progetto.
2. Creare 3-5 topic pages sui temi che riapriamo piu spesso.
3. Stabilire una convenzione `ingest | query | lint | decision` nel log.
4. Valutare QMD solo dopo aver reso il wiki utile a mano, non prima.
5. Promuovere nel wiki solo conoscenza riusabile, non report temporanei.

## Nota critica

Karpathy descrive un pattern, non un prodotto finito. Nel nostro caso il rischio principale non e tecnico: e creare un nuovo strato documentale che duplica `docs/` invece di compilarlo.

Per evitare questo errore:

- il wiki deve essere sottile;
- deve puntare a file canonici gia esistenti;
- deve assorbire solo sintesi ad alto riuso;
- non deve diventare un altro archivio di report usa-e-getta.
