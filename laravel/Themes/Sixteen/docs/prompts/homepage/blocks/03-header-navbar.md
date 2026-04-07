# Block 03: Header Navbar

> Navigazione principale con megamenu

---

## Reference
**URL**: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html  
**Selettore**: `#header-nav-wrapper` / `.it-header-navbar-wrapper`  
**Posizione**: Dopo header-center

---

## Struttura HTML

```html
<div class="it-header-navbar-wrapper" id="header-nav-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-expand-lg has-megamenu">
          <!-- Toggle mobile -->
          <button class="custom-navbar-toggler d-lg-none" type="button"
                  data-bs-toggle="navcollapsible" data-bs-target="#nav4">
            <span class="visually-hidden">Mostra/Nascondi la navigazione</span>
            <svg class="icon"><use href="#it-burger"></use></svg>
          </button>
          
          <!-- Menu collassabile -->
          <div class="navbar-collapsable" id="nav4">
            <div class="navbar-nav">
              <!-- Voce: Amministrazione -->
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  Amministrazione
                  <svg class="icon"><use href="#it-expand"></use></svg>
                </a>
                <div class="dropdown-menu">...</div>
              </div>
              
              <!-- Voce: Novità -->
              <!-- Voce: Servizi -->
              <!-- Voce: Documenti -->
              <!-- Voce: Assistenza -->
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>
```

---

## Menu Items (Reference)

| Voce | Link | Has Dropdown |
|------|------|--------------|
| Amministrazione | # | ✅ |
| Novità | # | ✅ |
| Servizi | # | ✅ |
| Documenti e dati | # | ✅ |
| Assistenza | # | ✅ |

---

## Elementi Chiave

| Elemento | Classe/ID | Scopo |
|----------|-----------|-------|
| Wrapper | `#header-nav-wrapper` | ID per skiplink/target |
| Navbar | `.navbar.has-megamenu` | Nav principale |
| Toggle | `.custom-navbar-toggler` | Mobile menu button |
| Collapsable | `.navbar-collapsable#nav4` | Menu collassabile |

---

## Responsive

| Breakpoint | Comportamento |
|------------|---------------|
| Desktop (lg+) | Menu orizzontale visibile |
| Mobile (<lg) | Hamburger toggle, menu nascosto |

---

## Local Implementation

**File**: `Themes/Sixteen/resources/views/layouts/app.blade.php`  
**Alpine.js**: `x-data` per toggle mobile

---

## 🔗 Link Bidirezionali

- ← [Blocks Index](./00-index.md)
- → [Header Center](./02-header-center.md)
- → [Hero Section](./04-hero-section.md)

---

**Stato**: ✅ Documentato
