# Footer Argomenti Parity

## Regola

Per la replica Design Comuni il footer pubblico deve passare dalla section canonica del tema:

- standard: `<x-section slug="footer" />`
- variante slim futura: `<x-section slug="footer" tpl="slim" />`

## Decisione

Per `tests/argomenti` il footer non va gestito come blocco pagina-specifico. Va gestito come section di layout del tema e deve seguire la struttura AGID del reference.

## Motivo

Il footer e una regione strutturale condivisa del sito, non contenuto editoriale di singola pagina. Tenerlo come section permette:

- riuso cross-page
- convergenza verso il reference HTML
- introduzione futura di varianti `tpl` senza duplicare pagine

## Stato

`Themes/Sixteen/resources/views/components/sections/footer/v1.blade.php` e stata riallineata al footer AGID del reference `argomenti`.

## Residuo

Le differenze ancora aperte su `argomenti` non dipendono piu dal footer ma da altri blocchi/body legacy che generano asset e link relativi non coerenti.

## Evidenze

- screenshot reference: `../../../Themes/Sixteen/docs/design-comuni/screenshots/argomenti-reference-footer-full.png`
- screenshot locale: `../../../Themes/Sixteen/docs/design-comuni/screenshots/argomenti-local-after-header-fix.png`
