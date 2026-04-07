# Block 08: Useful Links

## Description

Section with search input and list of useful links.

## HTML Structure (Reference)

```html
<section class="useful-links-section">
  <div class="section section-muted p-0 py-5">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-6">
          <!-- Search input -->
          <div class="cmp-input-search">
            <div class="form-group autocomplete-wrapper mb-2 mb-lg-4">
              <div class="input-group">
                <label for="autocomplete">Cerca una parola chiave</label>
                <input type="search" class="autocomplete form-control" placeholder="Cerca una parola chiave">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">Invio</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Links list -->
          <div class="link-list-wrapper">
            <div class="link-list-heading">Link utili</div>
            <ul class="link-list">
              <li><a class="list-item">CIE</a></li>
              <li><a class="list-item">Cambio residenza</a></li>
              <!-- More links -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
```

## HTML Structure (Local)

```html
<!-- Same structure -->
```

## Similarity: 100%

## i18n Notes

⚠️ **MULTILINGUAL SITE**:
- `{{ __('namespace::file.search.placeholder') }}` - "Cerca una parola chiave"
- `{{ __('namespace::file.links.useful_title') }}` - "Link utili"
- Each link text must use translation keys:
  - `{{ __('namespace::file.links.cie') }}`
  - `{{ __('namespace::file.links.residence') }}`
  - etc.

## CSS Required

- Input group styling
- Autocomplete styling
- Link list styling (link-list-wrapper, link-list)
- List item styling with hover states

## Agent Notes

This section is static content - ensure all text is from translation files, not hardcoded.
