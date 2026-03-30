# Design Comuni: JSON Multi-Block Governance

## Regola
Le pagine `tests.*` che replicano Design Comuni non devono essere modellate come un singolo blocco salvo eccezioni davvero minime.

## Perche
Il frontoffice FixCity usa `Folio + Volt + x-page`, ma il contenuto viene governato dal CMS attraverso `content_blocks`, `sidebar_blocks` e `footer_blocks`.
In amministrazione questi blocchi vengono editati con `PageContentBuilder::make('content_blocks')`, quindi la pagina deve essere pensata come sequenza ordinabile di blocchi e non come template monolitico.

## Contratto type/view
Il `type` del blocco deve essere coerente con il namespace della `data.view`.
La regola pratica e:
- prendere il primo segmento dopo `pub_theme::components.blocks.`
- usare quel segmento come `type`

Esempi corretti:
- `data.view = pub_theme::components.blocks.tests.intro` -> `type = tests`
- `data.view = pub_theme::components.blocks.tests.argomenti` -> `type = tests`
- `data.view = pub_theme::components.blocks.hero.default` -> `type = hero`
- `data.view = pub_theme::components.blocks.cta.default` -> `type = cta`

Questo serve a mantenere riconoscibilita, riuso e coerenza per editor, sviluppatori e agenti AI che lavorano in parallelo.

## Implicazioni pratiche
- uno slug CMS identifica la pagina
- i JSON tenant contengono piu blocchi ordinati
- ogni blocco ha una responsabilita chiara
- i blocchi devono essere riusabili fra piu pagine quando possibile
- il file Folio non decide la composizione visuale della pagina

## Pattern minimo consigliato
Per una pagina test Design Comuni il minimo sensato e normalmente:
1. blocco `intro`
2. blocco `main`
3. blocco `governance-note` o contenuto editoriale secondario
4. blocco `source-link`

## Eccezioni
Una singola pagina puo avere un solo blocco solo quando il blocco stesso e gia un contenitore composito intenzionale e la redazione non ha bisogno di manipolarne parti separate. Deve restare un'eccezione, non la base del sistema.

## DRY + KISS
- DRY: blocchi piccoli, riusabili e parametrizzati
- KISS: pochi blocchi ben definiti, niente HTML giganteschi dentro un solo `data.view`
- Builder-friendly: la redazione deve poter riordinare e sostituire blocchi senza riscrivere la pagina
