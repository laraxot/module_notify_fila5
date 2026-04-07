# Block 06: Other Topics Chips

## Description

Horizontal chip list showing additional topics.

## HTML Structure (Reference)

```html
<div class="row pt-30">
  <div class="col-lg-10 col-xl-6 offset-lg-1 offset-xl-2">
    <div class="row d-lg-inline-flex">
      <div class="col-lg-3">
        <h3 class="text-uppercase title-xsmall-bold text-secondary">Altri argomenti</h3>
      </div>
      <div class="col-lg-9">
        <ul class="d-flex flex-wrap gap-1">
          <li><a class="chip chip-simple"><span class="chip-label">Associazioni</span></a></li>
          <li><a class="chip chip-simple"><span class="chip-label">Concorsi</span></a></li>
          <li><a class="chip chip-simple"><span class="chip-label">Energie rinnovabili</span></a></li>
          <!-- More chips -->
        </ul>
      </div>
    </div>
  </div>
  <!-- Show all button -->
  <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2 text-center">
    <a class="btn btn-primary mt-40">Mostra tutti</a>
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
- `{{ __('namespace::file.topics.other_title') }}` - "Altri argomenti"
- `{{ __('namespace::file.actions.show_all') }}` - "Mostra tutti"
- Each chip label must use translation key from Lang module

## CSS Required

- Chip styling (chip-simple, chip-label)
- Flexbox gap styling
- Button styling (btn-primary)
- Responsive spacing (mt-40)

## Agent Notes

This block uses chips extensively - ensure consistent chip styling across the site.
