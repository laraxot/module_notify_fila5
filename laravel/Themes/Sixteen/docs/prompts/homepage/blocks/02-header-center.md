# Block 02: Header Center

> Logo comune, nome, tagline e social links

---

## Reference
**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html  
**Selettore**: `.it-header-center-wrapper`  
**Posizione**: Dopo header-slim, dentro it-nav-wrapper

---

## Struttura HTML

```html
<div class="it-header-center-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="it-header-center-content-wrapper">
          <!-- Logo + Brand -->
          <div class="it-brand-wrapper">
            <a href="homepage.html">
              <svg width="82" height="82" class="icon">
                <image xlink:href="logo-comune.svg"/>
              </svg>
              <div class="it-brand-text">
                <div class="it-brand-title">Il mio Comune</div>
                <div class="it-brand-tagline d-none d-md-block">Un comune da vivere</div>
              </div>
            </a>
          </div>
          
          <!-- Social Links -->
          <div class="it-socials d-none d-lg-flex">
            <span>Seguici su</span>
            <ul>
              <li><a href="#" target="_blank">
                <svg class="icon icon-sm icon-white"><use href="#it-twitter"></use></svg>
                <span class="visually-hidden">Twitter</span>
              </a></li>
              <!-- Facebook, YouTube, Telegram, WhatsApp... -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
```

---

## Elementi Chiave

| Elemento | Classe/ID | data-element | Scopo |
|----------|-----------|--------------|-------|
| Wrapper | `.it-header-center-wrapper` | - | Container centrale |
| Brand | `.it-brand-wrapper` | - | Logo + testo |
| Logo SVG | `svg.icon` 82x82 | - | Stemma comune |
| Titolo | `.it-brand-title` | - | "Il mio Comune" |
| Tagline | `.it-brand-tagline` | - | Slogan comune |
| Social | `.it-socials` | - | Icone social |

---

## Social Icons (Reference)

| Piattaforma | Icona SVG | Visually Hidden |
|-------------|-----------|-----------------|
| Twitter | `#it-twitter` | "Twitter" |
| Facebook | `#it-facebook` | "Facebook" |
| YouTube | `#it-youtube` | "YouTube" |
| Telegram | `#it-telegram` | "Telegram" |
| WhatsApp | `#it-whatsapp` | "WhatsApp" |

---

## Responsive

| Breakpoint | Comportamento |
|------------|---------------|
| Desktop (md+) | Tagline visibile |
| Mobile (<md) | Tagline nascosta |
| Desktop (lg+) | Social links visibili |
| Mobile (<lg) | Social nascosti |

---

## Local Implementation

**File**: `Themes/Sixteen/resources/views/layouts/app.blade.php`  
**Logo**: `/themes/Sixteen/images/logo.svg`  
**SVG Sprite**: `/themes/Sixteen/design-comuni/assets/bootstrap-italia/dist/svg/sprites.svg`

---

## 🔗 Link Bidirezionali

- ← [Blocks Index](./00-index.md)
- → [Header Slim](./01-header-slim.md)
- → [Header Navbar](./03-header-navbar.md)

---

**Stato**: ✅ Documentato
