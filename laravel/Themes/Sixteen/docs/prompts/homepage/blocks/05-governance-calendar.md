# Block 05: Governance Calendar

> Cards organi di governo + calendario eventi

---

## Reference
**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html  
**Selettore**: `section#calendario`  
**Posizione**: Dopo hero section

---

## Struttura HTML

```html
<section id="calendario">
  <div class="section section-muted pb-90 pb-lg-50 px-lg-5 pt-0">
    <div class="container">
      <!-- Governance Cards -->
      <div class="row mb-2">
        <div class="card-wrapper px-0 card-overlapping card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
          <!-- Card 1: Sindaco (con immagine) -->
          <div class="card card-teaser card-teaser-image card-flex no-after rounded shadow-sm border border-light mb-0">
            <div class="card-image-wrapper with-read-more">
              <div class="card-body p-3 pb-5">
                <div class="category-top">
                  <span class="title-xsmall-semi-bold fw-semibold">Organi di governo</span>
                </div>
                <h3 class="card-title text-paragraph-medium u-grey-light">Mario Rossi</h3>
                <p class="text-paragraph-card u-grey-light m-0">Il Sindaco della città</p>
              </div>
              <div class="card-image card-image-rounded pb-5">
                <img src="..." alt="Immagine di esempio">
              </div>
            </div>
            <a class="read-more ps-3" href="#">
              <span class="text">Vai alla pagina</span>
              <svg class="icon"><use href="#it-arrow-right"></use></svg>
            </a>
          </div>
          
          <!-- Card 2: Giunta -->
          <div class="card card-teaser no-after rounded shadow-sm mb-0 border border-light">
            <div class="card-body pb-5">
              <div class="category-top">...</div>
              <h3 class="card-title">La giunta comunale</h3>
              <p class="text-paragraph-card u-grey-light m-0">Descrizione...</p>
            </div>
            <a class="read-more" href="#">...</a>
          </div>
          
          <!-- Card 3: Consiglio -->
          <div class="card card-teaser no-after rounded shadow-sm mb-0 border border-light">
            ...
          </div>
        </div>
      </div>
      
      <!-- Calendario Eventi -->
      <div class="row row-title pt-5 pt-lg-60 pb-3">
        <div class="col-12 d-lg-flex justify-content-between">
          <h2>Eventi</h2>
        </div>
      </div>
      
      <div class="row row-calendar">
        <div class="it-carousel-wrapper it-carousel-landscape-abstract-four-cols it-calendar-wrapper splide" data-bs-carousel-splide>
          <div class="it-header-block">
            <div class="it-header-block-title">
              <h3 class="mb-0 text-center home-carousel-title">Settembre 2022</h3>
            </div>
          </div>
          <div class="splide__track">
            <ul class="splide__list it-carousel-all">
              <li class="splide__slide">
                <div class="it-single-slide-wrapper h-100">
                  <div class="card-wrapper h-100">
                    <div class="card card-bg">
                      <div class="card-body">
                        <h4 class="card-title pb-4 mb-10 text-secondary">
                          15<span>lun</span>
                        </h4>
                        <p class="card-text px-2 pb-10 mb-10">
                          <a href="#">Saldo TASI</a>
                        </p>
                        <p class="card-text px-2 pb-10 mb-10 d-flex">
                          <img src="..." alt="..." class="me-3 rounded">
                          <a href="#">Concerto gratuito...</a>
                        </p>
                        ...
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Altri slide... -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
```

---

## Elementi Chiave

| Elemento | Classe/ID | Scopo |
|----------|-----------|-------|
| Sezione | `#calendario` | ID sezione |
| Card Wrapper | `.card-teaser-wrapper-equal` | Container cards |
| Card Sindaco | `.card-teaser-image.card-flex` | Card con immagine |
| Card standard | `.card-teaser` | Cards senza immagine |
| Carousel | `.it-carousel-wrapper.splide` | Carousel eventi |
| Slide | `.splide__slide` | Singolo giorno |
| Giorno | `.card-title.text-secondary` | Numero + giorno |
| Evento | `.card-text` | Link evento |
| Evento con img | `.card-text.d-flex` | Evento con immagine |

---

## JSON Structure

```json
{
  "type": "governance-calendario",
  "data": {
    "view": "pub_theme::components.blocks.governance.cards",
    "cards": [
      {
        "category": "Organi di governo",
        "title": "Mario Rossi",
        "role": "Il Sindaco della città",
        "image": "https://picsum.photos/150/200",
        "url": "#"
      },
      {...}
    ],
    "month": "Settembre 2022",
    "slides": [
      {
        "day": "15",
        "weekday": "lun",
        "events": [
          {"title": "Saldo TASI", "url": "#"},
          {"title": "Concerto...", "url": "#", "image": "https://picsum.photos/200"}
        ]
      }
    ]
  }
}
```

---

## Local Implementation

**Blade**: `Themes/Sixteen/resources/views/components/blocks/governance/cards.blade.php`

---

## 🔗 Link Bidirezionali

- ← [Blocks Index](./00-index.md)
- → [Hero Section](./04-hero-section.md)
- → [Evidence Section](./06-evidence-section.md)

---

**Stato**: ✅ Documentato
