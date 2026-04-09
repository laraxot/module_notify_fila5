# segnalazione-02-dati

Cartella di lavoro per la fase HTML parity di `segnalazione-02-dati`.

## Obiettivo
- Raggiungere almeno il `90%` di parity strutturale HTML rispetto alla reference Design Comuni.
- Usare solo la blade dinamica [`/var/www/_bases/base_fixcity_fila5/laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php`](/var/www/_bases/base_fixcity_fila5/laravel/Themes/Sixteen/resources/views/pages/tests/[slug].blade.php).
- Salvare gli artifact di confronto in `body-structure-comparison/`.

## Comando

```bash
bashscripts/html/html-structure-compare.sh \
  "https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-02-dati.html" \
  "http://127.0.0.1:8000/it/tests/segnalazione-02-dati" \
  "segnalazione-02-dati" \
  "laravel/Themes/Sixteen/docs/prompts/segnalazione-02-dati/body-structure-comparison" \
  90
```

## Output
- `body-structure-comparison/report.md`
- `body-structure-comparison/summary.json`
- `body-structure-comparison/diff.txt`
- `body-structure-comparison/reference-body.html`
- `body-structure-comparison/local-body.html`
