# Work Plan: Design Comuni Replication - FixCity

## 📋 Project Overview

**Goal**: Replicate 38 static pages from Italian "Design Comuni" template (https://github.com/italia/design-comuni-pagine-statiche) into FixCity using Tailwind CSS + Blade components.

**Namespace**: `pub_theme` (NOT `sixteen`)  
**Header/Footer Pattern**: `<x-section slug="header" />` and `<x-section slug="footer" />`  
**Components**: `<x-pub_theme::blocks./*>` 

## ✅ Architecture Confirmed

- **Theme**: Sixteen (namespace: `pub_theme`)
- **CSS**: Tailwind CSS (NOT Bootstrap)
- **Routing**: Folio at `resources/views/pages/it/tests/`
- **Components**: 
  - Header/Footer: `<x-section slug="header"/>`, `<x-section slug="footer"/>`
  - Other blocks: `<x-pub_theme::blocks.navigation.header-main>`
  - Design Comuni shell: `<x-pub_theme::design-comuni.page-shell>`
  - Page hero: `<x-pub_theme::design-comuni.page-hero>`

## 📊 Pages to Create (38 total)

### Phase 1: General Pages (9)
1. Homepage → `/it/tests/homepage`
2. Argomenti → `/it/tests/argomenti` ✅ (already done)
3. Argomento → `/it/tests/argomento`
4. FAQ → `/it/tests/domande-frequenti`
5. Search → `/it/tests/risultati-ricerca`
6. Resources List → `/it/tests/lista-risorse`
7. Categories List → `/it/tests/lista-categorie`
8. Sitemap → `/it/tests/mappa-sito`

### Phase 2: Services (13)
9-16. Prenotazione Appuntamento (8 steps)
17-18. Richiesta Assistenza (2 steps)
19-25. Segnalazione Disservizio (5 steps)

### Phase 3: Content Pages (9)
26-27. Amministrazione (2)
28-29. Novità (2)
30-32. Servizi (3)
33-34. Eventi (2)

### Phase 4: Additional (8)
35-42. Remaining service detail pages

## 🎯 Implementation Strategy

### 1. Study Existing Components
- `page-shell.blade.php` - Main wrapper with header/footer
- `page-hero.blade.php` - Hero section
- `page-index.blade.php` - Index/list layout

### 2. Create Page Template Pattern
```blade
<x-pub_theme::design-comuni.page-shell
    :title="$title"
    :breadcrumbs="$breadcrumbs"
>
    <x-pub_theme::blocks.navigation.breadcrumb ... />
    
    <!-- Page content here -->
    
</x-pub_theme::design-comuni.page-shell>
```

### 3. Convert HTML to Blade
- Use HTML files as REFERENCE only
- Create Tailwind classes matching Design Comuni look
- Extract reusable components as needed

## 🚀 Next Steps

1. Create GitHub Issues for tracking
2. Create GitHub Discussions for coordination
3. Start Phase 1: General Pages
4. Create reusable components as needed

## 📝 Notes
- Use existing `argomenti.blade.php` as template
- **CORREZIONE**: HTML files are in `laravel/Themes/Sixteen/Main_files/five/` (NOT in `resources/design-comuni/dist/sito/`)
- Components are in `laravel/Themes/Sixteen/resources/views/components/design-comuni/`
