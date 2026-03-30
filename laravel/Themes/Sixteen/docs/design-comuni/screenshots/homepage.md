# Homepage parity analysis

## Reference
- Source page: `https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html`
- Reference screenshot: `homepage-reference-full.png`

## What was corrected
- Restored `Themes/Sixteen/resources/views/pages/tests/homepage.blade.php` to the standard Folio + Volt thin wrapper that delegates to `<x-page side="content" :slug="$pageSlug" :data="$data" />`.
- Replaced the old placeholder tenant JSON with semantic CMS blocks in `config/local/fixcity/database/content/pages/tests.homepage.json`.
- Added homepage block views in `pub_theme::components.blocks.homepage.*`:
  - `head-section`
  - `calendario`
  - `evidence`
  - `useful-links`
  - `rating-contacts`
- Removed invalid Vite references to non-installed entry modules from `Themes/Sixteen/vite.config.js` and rebuilt/published the theme assets.
- Aligned Composer dependency constraints to Laravel 12 / Filament 5 by moving merged `orchestra/testbench` requirements to `^10.0`.

## Remaining blocker
- Local frontoffice runtime still does not answer within 20 seconds on `http://fixcity.local/it/tests/homepage`.
- `curl -m 20 -I http://fixcity.local/it/tests/homepage` still times out with 0 bytes received.
- Because of this, no reliable local screenshot was produced yet and visual parity cannot be validated end-to-end.

## Why the page is still not visually verified
- The homepage structure is now driven by the correct JSON and theme blocks.
- The Vite manifest issue is fixed and assets are published.
- The residual failure is not the homepage mapping anymore; it is a deeper local bootstrap/runtime problem that prevents the response from completing.

## Next correction pass
- Trace the local request lifecycle until the timeout source is found.
- Once the endpoint responds, capture `homepage-local-full.png` and compare it against `homepage-reference-full.png`.
- Then tighten any residual DOM/class mismatches section by section, starting from header/body wrappers and then the event/evidence areas.

## Governance note
- Theme selection must remain configuration-driven through `pub_theme`; no hardcoded `ThemeServiceProvider` registration belongs in `AppServiceProvider`.
- Theme assets and Vite config must stay minimal and only reference packages actually installed by the active theme.
