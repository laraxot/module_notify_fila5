# Body Structure Comparison

HTML body structure comparison reports between Design Comuni reference pages and local Laravel Theme implementations.

## Comparison Runs

### Segnalazioni Elenco

| File | Description | Date |
|------|-------------|------|
| [report.md](./segnalazioni-elenco/report.md) | Structured diff output with BLOCK/FLAG/WARN severity | 2026-04-08 |
| [parity-score.md](./segnalazioni-elenco/parity-score.md) | Score card tracking parity across runs | 2026-04-08 |
| [local-body.html](./segnalazioni-elenco/local-body.html) | Cleaned local body HTML (scripts/styles stripped) | 2026-04-08 |
| [reference-body.html](./segnalazioni-elenco/reference-body.html) | Cleaned reference body HTML (scripts/styles stripped) | 2026-04-08 |
| [local-structure.json](./segnalazioni-elenco/local-structure.json) | Parsed local DOM structure | 2026-04-08 |
| [ref-structure.json](./segnalazioni-elenco/ref-structure.json) | Parsed reference DOM structure | 2026-04-08 |
| [diff_details.json](./segnalazioni-elenco/diff_details.json) | Machine-readable diff data | 2026-04-08 |

## Comparison Tools

The comparison is performed by scripts in `bashscripts/`:

- [bashscripts/html/compare-html-body.py](../../../bashscripts/html/compare-html-body.py) — Python comparison engine (stdlib + BeautifulSoup)
- [bashscripts/html/html-structure-compare.sh](../../../bashscripts/html/html-structure-compare.sh) — Legacy Playwright-based comparison
- [bashscripts/body/html-structure-compare.sh](../../../bashscripts/body/html-structure-compare.sh) — Bash orchestrator for comparison runs
- [bashscripts/html/README.md](../../../bashscripts/html/README.md) — Tool documentation and usage guide

## Related Documentation

- [Design Comuni Index](../design-comuni/README.md) — Design Comuni documentation index
- [Theme Index](../00-index.md) — Sixteen Theme documentation index
- [Segnalazioni Elenco Analysis](../prompts/segnalazione_disservizio/segnalazioni-elenco-html-parity-analysis.md) — Phase 1 parity summary
- [Segnalazioni Elenco Prompt Index](../prompts/segnalazione_disservizio/README.md) — Prompts directory

## Methodology

1. Download reference HTML from Design Comuni site
2. Capture local HTML from Laravel dev server
3. Strip `<script>` and `<style>` tags for structural comparison
4. Run Python comparison tool to generate parity score and severity breakdown
5. Review report: BLOCK (entire section missing), FLAG (structural mismatch), WARN (attribute/class difference)
6. Fix gaps to reach 90%+ parity target
7. Re-run to verify improvement
