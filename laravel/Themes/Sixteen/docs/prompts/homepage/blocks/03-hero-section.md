# Block 03: Hero Section

## Description

Hero section with news card (featured article) and search form.

## HTML Structure (Reference)

```html
<section id="head-section">
  <h2 class="visually-hidden">Contenuti in evidenza</h2>
  <div class="container">
    <div class="row align-items-center min-vh-lg-50">
      <div class="col-lg-6 order-2 order-lg-1">
        <!-- News card -->
        <div class="card mb-5">
          <div class="card-body pb-5 px-0">
            <div class="category-top">
              <span>Notizie</span>
              <span class="data">18 mag 2022</span>
            </div>
            <h3 class="card-title">Title</h3>
            <p>Description</p>
            <a class="chip chip-simple"><span class="chip-label">Category</span></a>
            <a class="read-more">Read more link</a>
          </div>
        </div>
        <!-- Search form -->
        <div class="cmp-search">
          <form>
            <div class="form-group autocomplete-wrapper">
              <div class="input-group">
                <label for="search2">Search</label>
                <input type="search" id="search2" placeholder="Cerca nel sito">
                <button type="submit">Cerca</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2">
        <img src="..." class="img-fluid">
      </div>
    </div>
  </div>
</section>
```

## HTML Structure (Local)

```html
<section id="head-section">
  <h2 class="visually-hidden">Contenuti in evidenza</h2>
  <div class="container">
    <div class="row align-items-center min-vh-lg-50">
      <!-- Same structure -->
    </div>
  </div>
</section>
```

## Similarity: 100%

## i18n Notes

⚠️ **MULTILINGUAL SITE**: All text must use translation keys, NOT hardcoded Italian:
- Use `{{ __('namespace::file.section') }}` for all user-facing text
- No hardcoded "Notizie", "Cerca nel sito", etc.

## CSS Required

- Card styling with shadows and borders
- Category top styling (icon + category + date)
- Typography for title and description
- Chip styling
- Read more link styling
- Search input styling
- Button styling

## Agent Notes

When implementing CSS fixes, use translation keys for any new text content.
