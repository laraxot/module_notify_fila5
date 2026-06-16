# Design Comuni Pagine Statiche - FixCity Integration

## 📋 Panoramica

Questo documento descrive l'integrazione del design system **Bootstrap Italia** nel tema **Sixteen** di FixCity.

**Fonte Originale**: [Italia Design Comuni](https://italia.github.io/design-comuni-pagine-statiche/)  
**Versione**: 2.4.0  
**Stato**: ✅ In Corso

## 🎯 Obiettivi

1. **Replicare tutte le pagine statiche** del progetto design-comuni-pagine-statiche
2. **Creare componenti Blade riutilizzabili** (header, footer, cards, navigation)
3. **Utilizzare Tailwind CSS + Vite** invece di Bootstrap CSS
4. **Mantenere conformità** alle linee guida AGID per i siti dei Comuni italiani
5. **Documentare tutti i componenti** seguendo DRY + KISS

## 📁 Struttura Pagine

### Total: 39 pagine principali + 46 pagine servizi

#### 1. GENERALI (9 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Homepage | `homepage` | `/it/tests/homepage` | ✅ Creato |
| Argomenti | `argomenti` | `/it/tests/argomenti` | ✅ Creato |
| Argomento | `argomento` | `/it/tests/argomento` | ⏳ Da fare |
| FAQ | `domande-frequenti` | `/it/tests/domande-frequenti` | ⏳ Da fare |
| Ricerca | `risultati-ricerca` | `/it/tests/risultati-ricerca` | ⏳ Da fare |
| Lista risorse | `lista-risorse` | `/it/tests/lista-risorse` | ⏳ Da fare |
| Lista categorie | `lista-categorie` | `/it/tests/lista-categorie` | ⏳ Da fare |
| Mappa sito | `mappa-sito` | `/it/tests/mappa-sito` | ⏳ Da fare |

#### 2. AMMINISTRAZIONE (2 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Amministrazione | `amministrazione` | `/it/tests/amministrazione` | ⏳ Da fare |
| Documenti e dati | `documenti-dati` | `/it/tests/documenti-dati` | ⏳ Da fare |

#### 3. NOVITÀ (2 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Novità | `novita` | `/it/tests/novita` | ⏳ Da fare |
| Dettaglio notizia | `novita-dettaglio` | `/it/tests/novita-dettaglio` | ⏳ Da fare |

#### 4. SERVIZI (3 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Servizi | `servizi` | `/it/tests/servizi` | ⏳ Da fare |
| Categoria servizio | `servizi-categoria` | `/it/tests/servizi-categoria` | ⏳ Da fare |
| Dettaglio servizio | `servizio-dettaglio` | `/it/tests/servizio-dettaglio` | ⏳ Da fare |

#### 5. VIVERE IL COMUNE (2 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Eventi | `eventi` | `/it/tests/eventi` | ⏳ Da fare |
| Dettaglio evento | `evento-dettaglio` | `/it/tests/evento-dettaglio` | ⏳ Da fare |

#### 6. PRENOTAZIONE APPUNTAMENTO (8 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Step 1a | `appuntamento-01-ufficio` | `/it/tests/appuntamento-01-ufficio` | ⏳ Da fare |
| Step 1b | `appuntamento-01-ufficio-luogo` | `/it/tests/appuntamento-01-ufficio-luogo` | ⏳ Da fare |
| Step 2 | `appuntamento-02-data-orario` | `/it/tests/appuntamento-02-data-orario` | ⏳ Da fare |
| Step 3 | `appuntamento-03-dettagli` | `/it/tests/appuntamento-03-dettagli` | ⏳ Da fare |
| Step 4a | `appuntamento-04-richiedente` | `/it/tests/appuntamento-04-richiedente` | ⏳ Da fare |
| Step 4b | `appuntamento-04-richiedente-autenticato` | `/it/tests/appuntamento-04-richiedente-autenticato` | ⏳ Da fare |
| Step 5 | `appuntamento-05-riepilogo` | `/it/tests/appuntamento-05-riepilogo` | ⏳ Da fare |
| Step 6 | `appuntamento-06-conferma` | `/it/tests/appuntamento-06-conferma` | ⏳ Da fare |

#### 7. RICHIESTA ASSISTENZA (2 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Step 1 | `assistenza-01-dati` | `/it/tests/assistenza-01-dati` | ⏳ Da fare |
| Step 2 | `assistenza-02-conferma` | `/it/tests/assistenza-02-conferma` | ⏳ Da fare |

#### 8. SEGNALAZIONE DISSERVIZIO (7 pagine)
| Pagina | Slug | Route | Stato |
|--------|------|-------|-------|
| Dettaglio | `segnalazione-dettaglio` | `/it/tests/segnalazione-dettaglio` | ⏳ Da fare |
| Step 1 | `segnalazione-01-privacy` | `/it/tests/segnalazione-01-privacy` | ⏳ Da fare |
| Step 2 | `segnalazione-02-dati` | `/it/tests/segnalazione-02-dati` | ⏳ Da fare |
| Step 3 | `segnalazione-03-riepilogo` | `/it/tests/segnalazione-03-riepilogo` | ⏳ Da fare |
| Step 4 | `segnalazione-04-conferma` | `/it/tests/segnalazione-04-conferma` | ⏳ Da fare |
| Area personale | `segnalazione-area-personale` | `/it/tests/segnalazione-area-personale` | ⏳ Da fare |
| Elenco | `segnalazioni-elenco` | `/it/tests/segnalazioni-elenco` | ⏳ Da fare |

## 🧩 Componenti Blade

### Componenti Esistenti
```
Themes/Sixteen/components/
├── header-comune.blade.php          # Header istituzionale
├── footer-comune.blade.php          # Footer istituzionale
└── ...
```

### Componenti da Creare
```
Themes/Sixteen/resources/views/components/design-comuni/
├── header/
│   ├── slim.blade.php               # Header slim (regione, lingua, login)
│   ├── center.blade.php             # Header center (brand, social, search)
│   └── navbar.blade.php             # Header navbar (menu navigazione)
├── footer/
│   ├── main.blade.php               # Footer principale
│   ├── secondary.blade.php          # Footer secondario
│   └── social.blade.php             # Social links
├── navigation/
│   ├── breadcrumb.blade.php         # Breadcrumb
│   ├── pagination.blade.php         # Pagination
│   └── sidebar.blade.php            # Sidebar navigation
├── cards/
│   ├── news-card.blade.php          # Card notizia
│   ├── service-card.blade.php       # Card servizio
│   ├── event-card.blade.php         # Card evento
│   └── topic-card.blade.php         # Card argomento
├── hero/
│   ├── default.blade.php            # Hero default
│   └── with-image.blade.php         # Hero con immagine
└── forms/
    ├── step-wizard.blade.php        # Wizard multi-step
    ├── form-field.blade.php         # Campo form
    └── validation.blade.php         # Messaggi validazione
```

## 🎨 Design System

### Bootstrap Italia → Tailwind CSS

Il progetto originale utilizza **Bootstrap Italia**. Noi convertiamo a **Tailwind CSS** mantenendo:

#### Colori
```css
/* Variabili CSS originali */
--bs-primary: #007a52;      /* → bg-primary, text-primary */
--bs-primary-dark: #00614a; /* → bg-primary-dark */
--bs-secondary: #5d7083;    /* → bg-secondary */
--bs-success: #008055;      /* → bg-success */
```

#### Typography
```
Font: "Titillium Web", sans-serif
Scale:
  - title-xxxlarge: 3rem (48px)
  - title-xxlarge: 2.5rem (40px)
  - title-xlarge: 2rem (32px)
  - title-large: 1.75rem (28px)
  - title-medium: 1.5rem (24px)
  - title-small: 1.25rem (20px)
```

#### Spacing
```
Base: 4px (0.25rem)
Scale: 0.25, 0.5, 0.75, 1, 1.25, 1.5, 2, 2.5, 3, 4
```

## 📂 Directory Structure

```
Themes/Sixteen/
├── resources/
│   ├── design-comuni/
│   │   ├── pages/                    # Pagine Blade
│   │   │   ├── homepage.blade.php    ✅
│   │   │   ├── argomenti.blade.php   ✅
│   │   │   └── ...
│   │   └── manifest.php              # Manifest pagine
│   ├── views/
│   │   ├── pages/
│   │   │   └── tests/
│   │   │       ├── [slug].blade.php  # Route dinamica
│   │   │       └── index.blade.php   # Index test pages
│   │   └── components/
│   │       └── design-comuni/        # Componenti
│   └── css/
│       └── design-comuni.css         # CSS custom
├── Main_files/
│   └── five/
│       ├── docs/                     # Documentazione conversione
│       └── src/
│           └── style.css             # CSS nativo conversione
└── docs/
    └── design-comuni/
        └── README.md                 # Questo file
```

## 🚀 Route Setup

### Folio Routes (File-based)
```
resources/views/pages/it/tests/
├── [slug].blade.php         # Dynamic route: /it/tests/{slug}
└── index.blade.php          # Index: /it/tests
```

### Route Naming Convention
```php
route('comune.homepage')              // Homepage
route('comune.argomenti')             // Lista argomenti
route('comune.argomento', $slug)      // Singolo argomento
route('comune.servizi')               // Lista servizi
route('comune.servizio-dettaglio', $slug)
route('comune.novita')                // Lista novità
route('comune.novita-dettaglio', $slug)
// ... etc
```

## 📝 Manifest Pagine

Il file `manifest.php` contiene il metadata di tutte le pagine:

```php
return [
    'argomenti' => [
        'title' => 'Argomenti',
        'category' => 'Generali',
        'source' => 'https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html',
        'route' => '/it/tests/argomenti',
        'status' => 'completed',
    ],
    // ...
];
```

## 🔧 Setup e Installazione

### Prerequisiti
- Node.js >= 18.0.0
- npm o pnpm
- Laravel 12+
- Tailwind CSS 4+

### Installazione Assets
```bash
# Copia assets Bootstrap Italia (se necessario)
cp -r /tmp/design-comuni-pagine-statiche/dist/assets \
      laravel/public/design-comuni/assets

# Installa dipendenze
cd Themes/Sixteen
npm install

# Build assets
npm run build
```

### Configurazione Tema
```php
// config/themes.php
'sixteen' => [
    'name' => 'Sixteen',
    'parent' => null,
    'assets_path' => 'public/themes/sixteen',
    'views_path' => 'resources/themes/sixteen/views',
],
```

## 📊 Stato Avanzamento

### Completato ✅
- [x] Analisi repository originale
- [x] Studio struttura HTML/CSS
- [x] Creazione directory structure
- [x] Creazione manifest.php
- [x] Homepage blade.php
- [x] Argomenti blade.php
- [x] Route dinamica [slug].blade.php
- [x] Documentazione README.md

### In Corso 🔄
- [ ] Componenti Blade riutilizzabili
- [ ] Conversione CSS a Tailwind
- [ ] Pagine restanti (37 da fare)

### Da Fare ⏳
- [ ] Test accessibilità WCAG 2.1
- [ ] Integrazione con backend FixCity
- [ ] Documentazione completa componenti
- [ ] Test responsive su tutti i device

## 🎯 Best Practices

### DRY (Don't Repeat Yourself)
- ✅ Componenti riutilizzabili per header/footer
- ✅ Layout base estendibile
- ✅ Variabili CSS per colori e spacing

### KISS (Keep It Simple, Stupid)
- ✅ Route naming semplice e intuitivo
- ✅ Componenti Blade con poche responsabilità
- ✅ CSS organizzato per sezioni

### Accessibilità
- ✅ Breadcrumb navigation
- ✅ ARIA labels
- ✅ Skip links
- ✅ Focus states
- ✅ Color contrast

## 📚 Riferimenti

- [Design Comuni Static Pages](https://italia.github.io/design-comuni-pagine-statiche/)
- [Bootstrap Italia Documentation](https://italia.github.io/bootstrap-italia/)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [AGID Linee Guida](https://docs.italia.it/italia/designers-italia/)

## 🤝 Contributing

Per aggiungere nuove pagine:

1. Copiare template da `homepage.blade.php`
2. Adattare contenuto dalla pagina HTML originale
3. Aggiornare `manifest.php`
4. Testare route `/it/tests/{slug}`
5. Documentare in questo file

## 📞 Support

Per domande o problemi:
- GitHub Issues: [laraxot/base_fixcity_fila5](https://github.com/laraxot/base_fixcity_fila5/issues)
- Documentazione: `Themes/Sixteen/docs/`

---

**Ultimo Aggiornamento**: 2026-03-30  
**Versione**: 1.0.0  
**Stato**: In Sviluppo
