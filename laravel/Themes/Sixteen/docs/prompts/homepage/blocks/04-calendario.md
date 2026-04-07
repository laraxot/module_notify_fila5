# Block 04: Events Calendar Section

## Description

Section showing government officials (Sindaco, Giunta, Consiglio) and events calendar carousel.

## HTML Structure (Reference)

```html
<section id="calendario">
  <div class="section section-muted pb-90 pb-lg-50 px-lg-5 pt-0">
    <div class="container">
      <!-- Government officials cards (3 cards) -->
      <div class="row mb-2">
        <div class="card-wrapper">
          <!-- Card 1: Sindaco -->
          <div class="card card-teaser card-teaser-image card-flex">
            <div class="card-image-wrapper">
              <div class="card-body">...</div>
              <div class="card-image">...</div>
            </div>
            <a class="read-more">Vai alla pagina</a>
          </div>
          <!-- Card 2: Giunta -->
          <div class="card card-teaser">...</div>
          <!-- Card 3: Consiglio -->
          <div class="card card-teaser">...</div>
        </div>
      </div>
      <!-- Events title -->
      <div class="row row-title">
        <h2>Eventi</h2>
      </div>
      <!-- Calendar carousel -->
      <div class="row row-calendar">
        <div class="it-carousel-wrapper it-calendar-wrapper splide">
          <div class="it-header-block">
            <h3>Settembre 2022</h3>
          </div>
          <div class="splide__track">
            <ul class="splide__list">
              <!-- Multiple slides -->
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
<section id="calendario">
  <!-- Same structure -->
</section>
```

## Similarity: 100%

## i18n Notes

⚠️ **MULTILINGUAL SITE**: All text must use translation keys:
- `{{ __('namespace::file.government.sindaco') }}`
- `{{ __('namespace::file.government.giunta') }}`
- `{{ __('namespace::file.government.consiglio') }}`
- `{{ __('namespace::file.calendar.events') }}`
- `{{ __('namespace::file.actions.read_more') }}`

## CSS Required

- Card teaser styling (shadow, border)
- Card image styling (rounded)
- Carousel/splide styling
- Event date styling
- Read more link positioning

## Agent Notes

This block requires both CSS fixes and potentially adding translations. Coordinate with i18n agent.
