# Argomenti - Verifica Frontoffice

## Scopo
Questa nota collega la verifica frontoffice del modulo CMS all'implementazione visuale del tema attivo.

## Artifact
- Analisi tema: `../../../../Themes/Sixteen/docs/design-comuni/screenshots/argomenti.md`
- Screenshot reference: `../../../../Themes/Sixteen/docs/design-comuni/screenshots/argomenti-reference.png`
- Screenshot locale: `../../../../Themes/Sixteen/docs/design-comuni/screenshots/argomenti-local.png`

## Diagnosi sintetica
La pagina `/it/tests/argomenti` non va considerata corretta solo perche esistono route e JSON.

Il punto chiave emerso e questo:
- il contenuto CMS deve usare blocchi semantici compatibili con `pub_theme::components.blocks.<tipo blocco>.<blade del blocco>`
- il pattern `tests.argomenti.*` viola il contratto dei blocchi
- la replica Design Comuni va quindi trattata come composizione multi-blocco Builder-friendly, non come template ad hoc nascosto in `tests.*`

## Azione applicata
Il JSON `tests.argomenti.json` e stato riallineato a una composizione con blocchi `hero`, `topics`, `cta` e `tests.source-link`.
