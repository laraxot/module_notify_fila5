# Block 02: Main Header with Navigation

## Description

Main header area with logo, brand text, social links, search, and main/secondary navigation menus.

## HTML Structure (Reference)

```html
<div class="it-nav-wrapper">
  <div class="it-header-center-wrapper">
    <!-- Logo and brand text -->
    <!-- Social links (desktop) -->
    <!-- Search button -->
  </div>
  <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
    <!-- Hamburger menu button -->
    <!-- Collapsible navbar with:
         - Logo hamburger (mobile)
         - Main navigation (Amministrazione, Novità, Servizi, Vivere il Comune)
         - Secondary navigation (Iscrizioni, Estate in città, Polizia locale, Tutti gli argomenti)
         - Social links (mobile)
    -->
  </div>
</div>
```

## HTML Structure (Local)

```html
<div class="it-nav-wrapper">
  <div class="it-header-center-wrapper">
    <!-- Same structure -->
  </div>
  <div class="it-header-navbar-wrapper" id="header-nav-wrapper">
    <!-- Same structure -->
  </div>
</div>
```

## Similarity: 100%

## Differences

| Aspect | Reference | Local |
|--------|-----------|-------|
| CSS Framework | Bootstrap Italia | Tailwind CSS |
| JavaScript | Bootstrap JS | Alpine.js |

## CSS Required

- Navbar styling and breakpoints
- Hamburger menu icon
- Navigation link styling (active states)
- Social icons styling
- Search button styling
- Mobile responsive behavior

## Agent Notes

Focus on CSS alignment with reference. The HTML structure is identical.
