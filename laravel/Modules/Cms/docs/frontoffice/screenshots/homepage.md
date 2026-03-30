# Homepage parity analysis

## Reference
- Source page: `https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html`
- Reference screenshot: `homepage-reference-full.png`

## CMS-driven corrections applied
- `tests.homepage` now resolves through the standard Folio + Volt thin page wrapper.
- `config/local/fixcity/database/content/pages/tests.homepage.json` was rewritten from generic placeholder blocks to semantic homepage blocks.
- The homepage body is now decomposed into builder-compatible blocks instead of a page-specific Blade dump.

## Homepage block map
- `pub_theme::components.blocks.homepage.head-section`
- `pub_theme::components.blocks.homepage.calendario`
- `pub_theme::components.blocks.homepage.evidence`
- `pub_theme::components.blocks.homepage.useful-links`
- `pub_theme::components.blocks.homepage.rating-contacts`

## Why this is the correct architecture
- The frontoffice must render from tenant JSON, not from ad hoc page markup.
- The block views stay in the active theme under `pub_theme`, while the page route remains a thin wrapper.
- This keeps the page editable through the CMS / builder model and avoids hardcoded one-off page implementations.

## Remaining blocker
- Local runtime still times out before sending a response for `/it/tests/homepage`.
- Because the request never completes, visual comparison against the reference is still blocked even though the CMS/page/theme structure has been corrected.

## Next step
- Fix the local timeout first.
- Then capture the local homepage screenshot, compare it with the stored reference screenshot, and iterate on remaining body/visual mismatches.
