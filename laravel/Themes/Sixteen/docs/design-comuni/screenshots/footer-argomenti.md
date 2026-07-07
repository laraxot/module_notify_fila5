# Footer Argomenti

## Reference

- Source page: `https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html`
- Reference screenshot: `footer-argomenti-reference.png`
- Active section file: `laravel/Themes/Sixteen/resources/views/components/sections/footer/v1.blade.php`
- Section invocation contract: `<x-section slug="footer" />`

## What Was Wrong

The active footer section was not the Design Comuni footer. It used a custom informational structure, extra non-reference utilities, and icon markup different from the official prototype.

## What Was Corrected

- Replaced the active `footer/v1` section with the Design Comuni footer DOM structure from `cmp-footer.hbs`.
- Kept the footer as a section, not a page include.
- Used local theme-published assets under `themes/Sixteen/design-comuni/assets`.
- Switched social and institutional icons to `<use xlink:href="...#icon">` against the local Bootstrap Italia sprite, matching the prototype structure.
- Removed extra wrapper utilities that were not present in the reference footer DOM.
- Preserved a future path for a slim variant through `tpl="slim"`, without mixing it into `v1`.

## CSS And Script Notes

- Footer CSS was already present in `laravel/Themes/Sixteen/resources/css/app.css` and mirrors the relevant footer rules from `laravel/Themes/Sixteen/Main_files/five/src/style-apply.css`.
- No footer-specific JS was needed for parity on this page.
- Theme pipeline used:
  - `npm run build`
  - `npm run copy`

## Remaining Blocker

Local visual verification is still blocked by the frontoffice runtime:

- `playwright screenshot --timeout 60000 http://fixcity.local/it/tests/argomenti ...` still times out waiting for `load`
- this is consistent with the existing Laravel cache/bootstrap issue already observed on this tenant

## How To Finish Verification

1. Remove the runtime timeout on `http://fixcity.local/it/tests/argomenti`.
2. Capture a local screenshot of the full page and, if needed, a footer-only crop.
3. Compare local footer against `footer-argomenti-reference.png`.
4. If a slim footer is required by another page, implement it as `resources/views/components/sections/footer/slim.blade.php` and call it with `<x-section slug="footer" tpl="slim" />`.
