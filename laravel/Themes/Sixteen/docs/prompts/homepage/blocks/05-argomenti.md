# Block 05: Featured Topics (Argomenti in evidenza)

## Description

Section with featured topic cards on a colored background.

## HTML Structure (Reference)

```html
<section class="evidence-section">
  <div class="section py-5 pb-lg-80 px-lg-5 position-relative" 
       style="background-image: url(../assets/images/evidenza-header.png)">
    <div class="container">
      <div class="row">
        <h2 class="text-white">Argomenti in evidenza</h2>
      </div>
      <div>
        <div class="card-wrapper card-teaser-block-3">
          <!-- Topic Card 1: Trasporto pubblico -->
          <div class="card card-teaser">
            <div class="card-body">
              <h3 class="card-title">Trasporto pubblico</h3>
              <p class="card-text">Description</p>
              <!-- Nested card with external link -->
              <a class="card card-teaser card-bg-blue">...</a>
            </div>
            <a class="read-more">Esplora argomento</a>
          </div>
          <!-- Topic Card 2: Animale domestico -->
          <div class="card card-teaser">...</div>
          <!-- Topic Card 3: Sport -->
          <div class="card card-teaser">...</div>
        </div>
      </div>
    </div>
  </div>
</section>
```

## HTML Structure (Local)

```html
<section class="evidence-section">
  <!-- Same structure -->
</section>
```

## Similarity: 100%

## i18n Notes

⚠️ **MULTILINGUAL SITE**:
- `{{ __('namespace::file.topics.featured_title') }}`
- `{{ __('namespace::file.topics.explore') }}`
- Use translation keys for all topic names and descriptions

## CSS Required

- Background image styling
- Card overlay colors (card-bg-blue, etc.)
- Nested card styling
- Read more positioning

## Agent Notes

This section has nested cards - ensure CSS handles the hierarchy correctly.
