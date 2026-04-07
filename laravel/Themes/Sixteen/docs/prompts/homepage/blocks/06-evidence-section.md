# Block 06: Evidence Section

> Argomenti in evidenza + Siti tematici

---

## Reference
**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html  
**Selettore**: `section.evidence-section`  
**Posizione**: Dopo governance calendar

---

## Struttura HTML

```html
<section class="evidence-section">
  <div class="section py-5 pb-lg-80 px-lg-5 position-relative" style="background-image: url(...)">
    <div class="container">
      <!-- Titolo -->
      <div class="row">
        <h2 class="text-white">Argomenti in evidenza</h2>
      </div>
      
      <!-- Cards argomenti -->
      <div>
        <div class="card-wrapper card-teaser-wrapper card-teaser-wrapper-equal card-teaser-block-3">
          <!-- Card 1: Trasporto pubblico -->
          <div class="card card-teaser no-after rounded shadow-sm border border-light">
            <div class="card-body pb-5">
              <h3 class="card-title">Trasporto pubblico</h3>
              <p class="card-text pb-3">Descrizione...</p>
              
              <!-- External site box -->
              <p class="mb-10 text-paragraph-small-semi">Visita il sito:</p>
              <a href="#" class="card card-teaser card-bg-dark no-after rounded mt-0 p-3">
                <div class="avatar size-lg me-3"><img src="..."></div>
                <div class="card-body">
                  <h4 class="card-title text-white mb-1">Mobilità in Comune</h4>
                  <p class="card-text text-sans-serif text-white">Descrizione...</p>
                </div>
              </a>
            </div>
            <a class="read-more pt-0" href="#">
              <span class="text">Esplora argomento</span>
              <svg class="icon ms-0"><use href="#it-arrow-right"></use></svg>
            </a>
          </div>
          
          <!-- Card 2: Animale domestico (con links) -->
          <div class="card card-teaser no-after rounded shadow-sm border border-light">
            <div class="card-body pb-5">
              <h3 class="card-title">Animale domestico</h3>
              <p class="card-text pb-3">Descrizione...</p>
              
              <div class="link-list-wrapper mt-4">
                <ul class="link-list">
                  <li><a class="list-item active icon-left mb-2" href="#">
                    <span class="list-item-title-icon-wrapper">
                      <span class="text-success">Link 1</span>
                    </span>
                  </a></li>
                  <!-- Altri links... -->
                </ul>
              </div>
            </div>
            <a class="read-more pt-0" href="#">...</a>
          </div>
          
          <!-- Card 3: Sport -->
          <div class="card card-teaser no-after rounded shadow-sm border border-light">...</div>
        </div>
      </div>
      
      <!-- Altri argomenti -->
      <div class="row pt-30">
        <div class="col-lg-10 col-xl-6 offset-lg-1 offset-xl-2">
          <div class="row d-lg-inline-flex">
            <div class="col-lg-3">
              <h3 class="text-uppercase mb-3 title-xsmall-bold text text-secondary">Altri argomenti</h3>
            </div>
            <div class="col-lg-9">
              <ul class="d-flex flex-wrap gap-1">
                <li><a class="chip chip-simple" href="#"><span class="chip-label">Associazioni</span></a></li>
                <!-- Altri chips... -->
              </ul>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row text-center mt-4">
        <a href="#" class="all-news-link">Mostra tutti</a>
      </div>
    </div>
    
    <!-- Siti Tematici -->
    <div class="container">
      <div class="row pt-5">
        <h3 class="text-white text-uppercase mb-3 title-xsmall-bold text">Siti tematici</h3>
      </div>
      <div class="row">
        <div class="col-12 col-lg-4">
          <a href="#" class="card card-teaser card-bg-dark no-after rounded mt-0 p-3">
            <div class="avatar size-lg me-3"><img src="..."></div>
            <div class="card-body">
              <h3 class="card-title text-white sito-tematico">Musei Civici</h3>
              <p class="card-text text-sans-serif text-white">Descrizione...</p>
            </div>
          </a>
        </div>
        <!-- Altri siti (warning, primary...) -->
      </div>
    </div>
  </div>
</section>
```

---

## Elementi Chiave

| Elemento | Classe | Scopo |
|----------|--------|-------|
| Sezione | `.evidence-section` | Container con bg image |
| Card argomento | `.card-teaser` | Card principale |
| External site | `.card-bg-dark` | Box sito esterno |
| Link list | `.link-list-wrapper` | Lista link correlati |
| Link item | `.list-item.active.icon-left` | Singolo link |
| Chips | `.d-flex.flex-wrap.gap-1` | Pills altri argomenti |
| Siti tematici | `.card-bg-dark/warning/primary` | Cards colorate |

---

## JSON Structure

```json
{
  "type": "topics-highlight",
  "data": {
    "view": "pub_theme::components.blocks.topics.highlight",
    "title": "Argomenti in evidenza",
    "background_image": "/themes/Sixteen/.../evidenza-header.png",
    "items": [
      {
        "title": "Trasporto pubblico",
        "description": "...",
        "url": "#",
        "external_site": {
          "url": "#", "image": "...", "title": "...", "description": "..."
        }
      },
      {
        "title": "Animale domestico",
        "description": "...",
        "url": "#",
        "links": [
          {"label": "...", "url": "#"}
        ]
      }
    ],
    "other_topics": ["Associazioni", "Concorsi", ...],
    "show_all_url": "#",
    "show_all_label": "Mostra tutti",
    "thematic_sites": [
      {"title": "Musei Civici", "description": "...", "url": "#", "image": "...", "color": "dark"}
    ]
  }
}
```

---

## Local Implementation

**Blade**: `Themes/Sixteen/resources/views/components/blocks/topics/highlight.blade.php`

---

## 🔗 Link Bidirezionali

- ← [Blocks Index](./00-index.md)
- → [Governance Calendar](./05-governance-calendar.md)
- → [Useful Links](./07-useful-links.md)

---

**Stato**: ✅ Documentato
