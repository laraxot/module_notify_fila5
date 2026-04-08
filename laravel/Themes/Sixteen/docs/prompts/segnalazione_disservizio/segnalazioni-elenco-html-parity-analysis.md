# Fase 1: HTML Body Structure Parity

- Data: 2026-04-08
- Pagina: `segnalazioni-elenco`
- Stato: `in corso`
- Tool canonico: [`bashscripts/html/compare-html-body.py`](../../../../../../bashscripts/html/compare-html-body.py)
- Wrapper bash: [`bashscripts/html/html-structure-compare.sh`](../../../../../../bashscripts/html/html-structure-compare.sh)
- Output canonico: [`laravel/Themes/Sixteen/docs/body-structure-comparison/segnalazioni-elenco/`](../../body-structure-comparison/segnalazioni-elenco/)

## Correzioni di governance recepite

- La Blade target resta [`resources/views/pages/tests/[slug].blade.php`](../../../../resources/views/pages/tests/[slug].blade.php).
- Gli output del confronto NON vengono salvati dentro `bashscripts` (agnostico).
- `local_segnalazioni.html` e questa analisi stanno sotto `docs/prompts/segnalazione_disservizio/`.
- La locazione canonica del comparer Python è `bashscripts/html/compare-html-body.py`.
- La locazione canonica del wrapper bash è `bashscripts/html/html-structure-compare.sh` (NON `body/` o root).
- Le chiavi di traduzione seguono il pattern `fixcity::segnalazione.<collezione>.<chiave>.<tipo>` (es: `fixcity::segnalazione.heading.title.label`).
- Forme scorrette eliminate: `SEGNALAZIONE::SEGNALAZIONE.ELENCO.TITLE` (namespace inventato), `fixcity::segnalazione.heading.title_label` (underscore invece di dot).

## Misurazione corrente

Esecuzione del 2026-04-08 10:51:39:
- Parity score: `28.9%`
- Elementi identici: `224`
- Elementi mancanti: `6`
- Elementi con differenze: `34`
- Elementi extra locali: `5`
- Nodi reference: consultare `reference-structure.json`
- Nodi local: consultare `local-structure.json`

Il precedente claim di `90%` non è più attendibile: il comparer corretto, elemento-per-elemento e con body incluso, misura una distanza strutturale ancora significativa.

## Dove sono i gap residui

Dal report canonico [`report.md`](../../body-structure-comparison/segnalazioni-elenco/report.md):
- blocchi mancanti sotto `main`
- mismatch di wrapper attorno breadcrumb/heading
- divergenze nel ramo filtri/colonne principali
- alcuni mismatch attributi/classi in header/footer
- il collo di bottiglia principale resta il contenuto del `main`

## Prossimo passo corretto

1. Usare il report canonico [`report.md`](../../body-structure-comparison/segnalazioni-elenco/report.md).
2. Correggere solo la struttura HTML/Blade/JSON necessaria per i blocchi mancanti nel `main`.
3. Rieseguire il comparer nello stesso output dir fino a superare la soglia del `90%`.
4. Commit e push dopo ogni correzione strutturale significativa.

## Script locations (audit)

| Script | Path canonico | Notes |
|--------|---------------|-------|
| Python comparer | `bashscripts/html/compare-html-body.py` | ✅ Core engine |
| Bash wrapper | `bashscripts/html/html-structure-compare.sh` | ✅ Orchestrator |
| Compare body (alt) | `bashscripts/compare-html/compare-body.sh` | ✅ Legacy fetcher |
| Fetch HTML | `bashscripts/fetch-html-comparison.sh` | ✅ Batch fetcher |
| This analysis | `docs/prompts/segnalazione_disservizio/segnalazioni-elenco-html-parity-analysis.md` | ✅ Theme-specific |

## Related

- [Report completo](../../body-structure-comparison/segnalazioni-elenco/report.md)
- [Reference HTML](../../body-structure-comparison/segnalazioni-elenco/reference-body.html)
- [Local HTML](../../body-structure-comparison/segnalazioni-elenco/local-body.html)
- [Reference structure JSON](../../body-structure-comparison/segnalazioni-elenco/reference-structure.json)
- [Local structure JSON](../../body-structure-comparison/segnalazioni-elenco/local-structure.json)
