# Block 04: Hero Section

> Notizia in evidenza con immagine

---

## Reference
**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html  
**Selettore**: `section#head-section`  
**Posizione**: Primo blocco dentro `<main>`

---

## Struttura HTML

```html
<section id="head-section">
  <div class="container">
    <div class="row">
      <!-- Colonna sinistra: Card notizia -->
      <div class="col-lg-6 order-2 order-lg-1">
        <div class="card mb-5">
          <div class="card-body pb-5 px-0">
            <!-- Categoria + Data -->
            <div class="category-top">
              <svg class="icon icon-sm"><use href="#it-calendar"></use></svg>
              <span class="title-xsmall-semi-bold fw-semibold">Notizie</span>
              <span class="data fw-normal">18 mag 2022</span>
            </div>
            
            <!-- Titolo -->
            <a href="#" class="text-decoration-none">
              <h3 class="card-title">Titolo notizia</h3>
            </a>
            
            <!-- Excerpt -->
            <p class="mb-4 pt-3 lora">
              <strong>Prime 4 parole</strong> resto del testo...
            </p>
            
            <!-- Tag -->
            <a class="chip chip-simple" href="#">
              <span class="chip-label">Estate in città</span>
            </a>
            
            <!-- Link tutte novità -->
            <a class="read-more pb-3" href="#">
              <span class="text">Tutte le novità</span>
              <svg class="icon"><use href="#it-arrow-right"></use></svg>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Colonna destra: Immagine -->
      <div class="col-lg-6 order-1 order-lg-2 px-0 px-lg-3">
        <img src="image.jpg" alt="descrizione" class="img-fluid">
      </div>
    </div>
  </div>
</section>
```

---

## Elementi Chiave

| Elemento | Classe/ID | Scopo |
|----------|-----------|-------|
| Sezione | `#head-section` | ID sezione hero |
| Card | `.card.mb-5` | Card notizia evidenza |
| Category | `.category-top` | Icona + categoria + data |
| Titolo | `.card-title` | H3 notizia |
| Excerpt | `.lora` | Testo con font Lora |
| Tag | `.chip.chip-simple` | Tag argomento |
| Read More | `.read-more` | Link "Tutte le novità" |

---

## Responsive

| Breakpoint | Comportamento |
|------------|---------------|
| Desktop (lg+) | 2 colonne: testo sx, immagine dx |
| Mobile (<lg) | Immagine sopra (order-1), testo sotto (order-2) |

---

## JSON Structure

```json
{
  "type": "hero-homepage",
  "data": {
    "view": "pub_theme::components.blocks.hero.homepage",
    "title": "Nome del comune",
    "news": {
      "category": "Notizie",
      "date": "18 mag 2022",
      "title": "Titolo...",
      "excerpt": "Testo...",
      "tag": "Estate in città",
      "url": "#"
    },
    "all_news_url": "#",
    "all_news_label": "Tutte le novità",
    "image": "https://picsum.photos/800/600"
  }
}
```

---

## Local Implementation

**Blade**: `Themes/Sixteen/resources/views/components/blocks/hero/homepage.blade.php`  
**JSON**: `config/local/fixcity/database/content/pages/tests.homepage.json` → `block-hero`

---

## 🔗 Link Bidirezionali

- ← [Blocks Index](./00-index.md)
- → [Header Navbar](./03-header-navbar.md)
- → [Governance Calendar](./05-governance-calendar.md)

---

**Stato**: ✅ Documentato
