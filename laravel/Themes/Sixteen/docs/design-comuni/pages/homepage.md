# homepage - Visual Comparison Report

**Date:** 2026-04-07
**Reference:** https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html
**Local:** http://127.0.0.1:8000/it/tests/homepage

## Screenshots

| Viewport | Reference | Local | Comparison |
|----------|-----------|-------|------------|
| Desktop (1920x1080) | [originale](../screenshots/homepage/originale-desktop.png) | [replica](../screenshots/homepage/replica-desktop.png) | [confronto](../screenshots/homepage/confronto-desktop.png) |
| Tablet (768x1024) | [originale](../screenshots/homepage/originale-tablet.png) | [replica](../screenshots/homepage/replica-tablet.png) | [confronto](../screenshots/homepage/confronto-tablet.png) |
| Mobile (375x812) | [originale](../screenshots/homepage/originale-mobile.png) | [replica](../screenshots/homepage/replica-mobile.png) | [confronto](../screenshots/homepage/confronto-mobile.png) |

## DOM Structure Differences

Total differences found: 131
Significant structural differences: 88

### Top 20 Differences

| # | Type | Path | Detail |
|---|------|------|--------|
| 1 | tag-mismatch | `body > header[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[1] > svg[0]` | ref=span, local=svg |
| 2 | tag-mismatch | `body > header[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[1] > svg[0] > use[0]` | ref=svg, local=use |
| 3 | missing | `body > header[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[1] > missing[1]` | Missing in local |
| 4 | tag-mismatch | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0]` | ref=div, local=button |
| 5 | tag-mismatch | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0] > svg[0]` | ref=a, local=svg |
| 6 | tag-mismatch | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0] > svg[0] > use[0]` | ref=svg, local=use |
| 7 | missing | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0] > svg[0] > missing[1]` | Missing in local |
| 8 | tag-mismatch | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[0]` | ref=div, local=a |
| 9 | tag-mismatch | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[0] > svg[0]` | ref=span, local=svg |
| 10 | tag-mismatch | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[0] > div[1]` | ref=ul, local=div |
| 11 | missing | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > missing[1]` | Missing in local |
| 12 | extra | `body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[2]` | Extra in local |
| 13 | tag-mismatch | `body > header[1] > div[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0]` | ref=button, local=div |
| 14 | tag-mismatch | `body > header[1] > div[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[0]` | ref=svg, local=div |
| 15 | missing | `body > header[1] > div[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[0] > missing[0]` | Missing in local |
| 16 | extra | `body > header[1] > div[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1]` | Extra in local |
| 17 | extra | `body > header[1] > div[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[2]` | Extra in local |
| 18 | missing | `body > header[1] > div[1] > div[1] > div[0] > div[0] > div[0] > div[0] > missing[1]` | Missing in local |
| 19 | tag-mismatch | `body > main[2] > section[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[4]` | ref=a, local=div |
| 20 | tag-mismatch | `body > main[2] > section[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[4] > a[0]` | ref=span, local=a |

## Action Items

1. [ ] Fix: tag-mismatch at body > header[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[1] > svg[0]
2. [ ] Fix: tag-mismatch at body > header[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[1] > svg[0] > use[0]
3. [ ] Fix: missing at body > header[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[1] > missing[1]
4. [ ] Fix: tag-mismatch at body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0]
5. [ ] Fix: tag-mismatch at body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0] > svg[0]
6. [ ] Fix: tag-mismatch at body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0] > svg[0] > use[0]
7. [ ] Fix: missing at body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > button[0] > svg[0] > missing[1]
8. [ ] Fix: tag-mismatch at body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[0]
9. [ ] Fix: tag-mismatch at body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[0] > svg[0]
10. [ ] Fix: tag-mismatch at body > header[1] > div[1] > div[0] > div[0] > div[0] > div[0] > div[0] > div[1] > a[0] > div[1]

## Related
- [Homepage HTML Comparison](../homepage-html-comparison.md)
- [Design Comuni Index](../README.md)
