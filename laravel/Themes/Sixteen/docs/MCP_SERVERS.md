# MCP Servers - Theme Context

**Theme**: Sixteen (Active)  
**Last Updated**: 2026-04-09

## Overview

MCP servers support theme development workflows including visual parity verification, CSS/JS builds, and screenshot comparison.

## Master Documentation

See [Project MCP Servers](../../../docs/MCP_SERVERS.md) for complete server list, configuration, and usage examples.

## Theme-Specific MCP Usage

### puppeteer
- **Primary Use**: Visual parity verification
- **Reference URLs**: `https://italia.github.io/design-comuni-pagine-statiche/sito/<page>.html`
- **Local URLs**: `http://127.0.0.1:8000/it/tests/<page>`
- **Screenshots**: Saved to `docs/prompts/<page>/css-js-phase/`

### filesystem
- **Scope**: `Themes/Sixteen/` directory
- **Use**: Explore theme structure, find CSS/JS files
- **Key Paths**:
  - `resources/css/app.css` - CSS entry point
  - `resources/js/app.js` - JS entry point
  - `tailwind.config.js` - Tailwind configuration
  - `vite.config.js` - Build configuration

### sqlite
- **Use**: Query CMS content blocks for theme pages
- **Example**: `SELECT content_blocks FROM cms_pages WHERE slug = 'tests.segnalazione-01-privacy'`

### fetch
- **Use**: Fetch reference HTML/CSS for parity comparison
- **Example**: `curl https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazione-01-privacy.html`

### memory
- **Use**: Store theme conventions, CSS patterns, build process knowledge
- **Example**: "Theme build requires npm run build && npm run copy from Themes/Sixteen/"

### context7
- **Use**: Look up TailwindCSS, Alpine.js, Vite documentation
- **Example**: "Tailwind CSS v4 @apply syntax"

---

## Theme Build Commands

```bash
cd laravel/Themes/Sixteen
npm run build   # Compile CSS/JS
npm run copy    # Copy to public_html/themes/Sixteen/
```

---

*Cross-reference: [Project MCP Servers](../../../docs/MCP_SERVERS.md)*
