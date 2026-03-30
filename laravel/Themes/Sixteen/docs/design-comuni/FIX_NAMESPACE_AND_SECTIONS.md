# 🐛 Fix: Namespace e Section Rendering

**Data**: 2026-03-30  
**Issue**: Namespace errato e rendering header/footer  
**Stato**: ✅ Corretto

## ❌ Errore Precedente

### Namespace Sbagliato
```blade
{{-- SBAGLIATO: x-sixteen:: non esiste --}}
<x-sixteen::blocks.navigation.header-main>

{{-- SBAGLIATO: sixtee::layouts.app --}}
@extends('sixteen::layouts.app')
```

### Header/Footer come Componenti
```blade
{{-- SBAGLIATO: Header/footer non sono componenti diretti --}}
@include('sixteen::components.header-comune')
@include('sixteen::components.footer-comune')
```

## ✅ Soluzione Corretta

### Namespace Corretto: `pub_theme::`
```blade
{{-- CORRETTO: Il namespace del tema è pub_theme:: --}}
<x-pub_theme::blocks.navigation.header-main>

{{-- CORRETTO: Layout del tema --}}
@extends('pub_theme::layouts.app')
```

### Header/Footer come Sezioni
```blade
{{-- CORRETTO: Header e footer sono sezioni --}}
<x-section slug="header" />
<x-section slug="footer" />
```

## 📝 File Corretti

### 1. homepage.blade.php
**Prima**:
```blade
@extends('sixteen::layouts.app')

@section('content')
{{-- contenuto --}}
@endsection
```

**Dopo**:
```blade
@extends('pub_theme::layouts.app')

@section('content')

{{-- Header Section --}}
<x-section slug="header" />

{{-- contenuto --}}

{{-- Footer Section --}}
<x-section slug="footer" />

@endsection
```

### 2. argomenti.blade.php
**Prima**:
```blade
@extends('sixteen::layouts.app')

@section('content')
{{-- contenuto --}}
@endsection
```

**Dopo**:
```blade
@extends('pub_theme::layouts.app')

@section('content')

{{-- Header Section --}}
<x-section slug="header" />

{{-- contenuto --}}

{{-- Footer Section --}}
<x-section slug="footer" />

@endsection
```

## 📚 Documentazione Aggiornata

### Riferimenti
1. **prompts/replikate.txt** - Conteneva già le istruzioni corrette
2. **theme.json** - Definisce il namespace `pub_theme`
3. **Providers/ThemeServiceProvider.php** - Registra i view namespace

### View Namespace Registrati
```php
// app/Providers/ThemeServiceProvider.php
'pub_theme::layouts.app',
'pub_theme::layouts.guest',
'pub_theme::layouts.guest-agid',
'pub_theme::components.layout.header',
'pub_theme::components.layout.footer',
```

## 🎯 Best Practices

### 1. Usare Sempre `pub_theme::`
```blade
✅ CORRETTO
<x-pub_theme::badge.status :status="$ticket->status" />
<x-pub_theme::alerts.alert variant="info" title="Info" />
<x-pub_theme::blocks.navigation.breadcrumb />

❌ SBAGLIATO
<x-sixteen::badge.status />
<x-theme::alerts.alert />
```

### 2. Sezioni per Header/Footer
```blade
✅ CORRETTO
<x-section slug="header" />
<x-section slug="footer" />

❌ SBAGLIATO
@include('components.header')
@include('components.footer')
```

### 3. Estendere Layout del Tema
```blade
✅ CORRETTO
@extends('pub_theme::layouts.app')
@extends('pub_theme::layouts.guest')

❌ SBAGLIATO
@extends('sixteen::layouts.app')
@extends('layouts.app')
```

## 🔍 Come Verificare

### 1. Controllare View Namespace
```bash
# Cercare utilizzi di pub_theme::
grep -r "pub_theme::" resources/views/

# Cercare utilizzi errati di sixteen::
grep -r "sixteen::" resources/views/
```

### 2. Testare Pagine
```bash
# Homepage
http://fixcity.local/it/tests/homepage

# Argomenti
http://fixcity.local/it/tests/argomenti
```

### 3. Verificare Rendering
- Header visibile correttamente
- Footer visibile correttamente
- CSS applicato
- Nessun errore "Unable to locate class or view"

## 📋 Checklist per Nuove Pagine

Quando crei nuove pagine Blade:

- [ ] Usare `@extends('pub_theme::layouts.app')`
- [ ] Aggiungere `<x-section slug="header" />` dopo `@section('content')`
- [ ] Aggiungere `<x-section slug="footer" />` prima di `@endsection`
- [ ] Usare `x-pub_theme::` per tutti i componenti
- [ ] Testare rendering pagina
- [ ] Verificare CSS applicato

## 🔗 Risorse

- **Issue GitHub**: Da creare per tracciare fix
- **File Corretti**:
  - `resources/design-comuni/pages/homepage.blade.php`
  - `resources/design-comuni/pages/argomenti.blade.php`
- **Documentazione**:
  - `docs/prompts/replikate.txt` - Istruzioni originali
  - `theme.json` - Definizione namespace
  - `app/Providers/ThemeServiceProvider.php` - Registrazione namespace

---

**Lezioni Apprese**:
1. Leggere sempre `prompts/replikate.txt` prima di creare componenti
2. Verificare namespace in `theme.json`
3. Capire differenza tra componenti e sezioni
4. Testare subito dopo aver creato le pagine
