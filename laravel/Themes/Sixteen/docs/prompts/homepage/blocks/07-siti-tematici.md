# Block 07: Thematic Sites (Siti tematici)

## Description

Section with cards linking to thematic websites.

## HTML Structure (Reference)

```html
<div class="row pt-5">
  <h2>Siti tematici</h2>
</div>
<div class="pt-4 pt-lg-30">
  <div class="card-wrapper card-teaser-block-3 pb-0">
    <!-- Site 1: Mobilità -->
    <a class="card card-teaser card-bg-blue rounded mt-0 p-3">
      <div class="avatar size-lg me-3">
        <img src="..." alt="...">
      </div>
      <div class="card-body">
        <h3 class="card-title text-white">Mobilità in Comune</h3>
        <p class="card-text text-white">Description</p>
      </div>
    </a>
    <!-- Site 2: Turismo -->
    <a class="card card-teaser card-bg-warning rounded mt-0 p-3">...</a>
    <!-- Site 3: Musei Civici -->
    <a class="card card-teaser card-bg-dark rounded p-3 mt-0">...</a>
  </div>
</div>
```

## HTML Structure (Local)

```html
<!-- Same structure -->
```

## Similarity: 100%

## i18n Notes

⚠️ **MULTILINGUAL SITE**:
- `{{ __('namespace::file.sites.title') }}` - "Siti tematici"
- Each site name and description must use translation keys
- Example: `{{ __('namespace::file.sites.mobilita.title') }}`

## CSS Required

- Card background colors (card-bg-blue, card-bg-warning, card-bg-dark)
- Avatar sizing (size-lg)
- Text color overrides for dark backgrounds

## Agent Notes

Different background colors per card - ensure CSS is specific enough.
