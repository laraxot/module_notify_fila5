# Design Comuni - Index Pagine

## 📄 Pagine Create

### ✅ Completate (2/39)

1. **Homepage** - `homepage.blade.php`
   - Route: `/it/tests/homepage`
   - Category: Generali
   - Features: Hero section, news in evidenza, card servizi, card argomenti

2. **Argomenti** - `argomenti.blade.php`
   - Route: `/it/tests/argomenti`
   - Category: Generali
   - Features: Breadcrumb, hero section, grid argomenti

### ⏳ Da Implementare (37)

#### Generali (7)
- [ ] argomento.blade.php
- [ ] domande-frequenti.blade.php
- [ ] risultati-ricerca.blade.php
- [ ] lista-risorse.blade.php
- [ ] lista-categorie.blade.php
- [ ] lista-risorse-categorie.blade.php
- [ ] mappa-sito.blade.php

#### Amministrazione (2)
- [ ] amministrazione.blade.php
- [ ] documenti-dati.blade.php

#### Novità (2)
- [ ] novita.blade.php
- [ ] novita-dettaglio.blade.php

#### Servizi (3)
- [ ] servizi.blade.php
- [ ] servizi-categoria.blade.php
- [ ] servizio-dettaglio.blade.php

#### Vivere il Comune (2)
- [ ] eventi.blade.php
- [ ] evento-dettaglio.blade.php

#### Prenotazione Appuntamento (8)
- [ ] appuntamento-01-ufficio.blade.php
- [ ] appuntamento-01-ufficio-luogo.blade.php
- [ ] appuntamento-02-data-orario.blade.php
- [ ] appuntamento-03-dettagli.blade.php
- [ ] appuntamento-04-richiedente.blade.php
- [ ] appuntamento-04-richiedente-autenticato.blade.php
- [ ] appuntamento-05-riepilogo.blade.php
- [ ] appuntamento-06-conferma.blade.php

#### Richiesta Assistenza (2)
- [ ] assistenza-01-dati.blade.php
- [ ] assistenza-02-conferma.blade.php

#### Segnalazione Disservizio (7)
- [ ] segnalazione-dettaglio.blade.php
- [ ] segnalazione-01-privacy.blade.php
- [ ] segnalazione-02-dati.blade.php
- [ ] segnalazione-03-riepilogo.blade.php
- [ ] segnalazione-04-conferma.blade.php
- [ ] segnalazione-area-personale.blade.php
- [ ] segnalazioni-elenco.blade.php

## 🔗 Test URLs

Tutte le pagine sono accessibili tramite:
```
http://fixcity.local/it/tests/{slug}
```

Esempi:
- http://fixcity.local/it/tests/homepage ✅
- http://fixcity.local/it/tests/argomenti ✅
- http://fixcity.local/it/tests/servizi ⏳
- http://fixcity.local/it/tests/appuntamento-06-conferma ⏳

## 📝 Note Implementazione

### Template Base
```php
@extends('sixteen::layouts.app')

@section('title', 'Titolo Pagina')

@section('content')
    {{-- Contenuto pagina --}}
@endsection

@push('scripts')
<script>
    // Script specifici
</script>
@endpush
```

### Componenti da Utilizzare
- `@include('sixteen::components.header-comune')`
- `@include('sixteen::components.footer-comune')`
- Breadcrumb navigation
- Card components
- Hero section

## 🚀 Prossimi Step

1. Creare pagina `servizi.blade.php`
2. Creare pagina `novita.blade.php`
3. Creare pagina `amministrazione.blade.php`
4. Implementare componenti riutilizzabili
5. Testare tutte le pagine

---

**Ultimo Update**: 2026-03-30  
**Totale**: 2/39 pagine completate (5%)
