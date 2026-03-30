# 🦶 Footer Analysis & Implementation Plan

**Data**: 2026-03-30  
**Pagina**: Argomenti (`/it/tests/argomenti`)  
**Riferimento**: https://italia.github.io/design-comuni-pagine-statiche/sito/argomenti.html  
**Componente**: `<x-section slug="footer" />`  
**Stato**: 🔴 Critical Differences

---

## 🎯 Footer Structure (Upstream)

### Complete HTML Structure

```html
<footer class="it-footer">
  
  <!-- Section 1: Quick Links (4 columns) -->
  <div class="py-8 border-t border-gray-200">
    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        
        <!-- Column 1: CONTATTA IL COMUNE -->
        <div>
          <h2 class="text-sm font-bold uppercase mb-4">CONTATTA IL COMUNE</h2>
          <ul class="space-y-2">
            <li><a href="#">Leggi le domande frequenti</a></li>
            <li><a href="#">Richiedi assistenza</a></li>
            <li><a href="#">Chiama il numero verde 05 0505</a></li>
            <li><a href="#">Prenota appuntamento</a></li>
          </ul>
        </div>
        
        <!-- Column 2: PROBLEMI IN CITTÀ -->
        <div>
          <h2 class="text-sm font-bold uppercase mb-4">PROBLEMI IN CITTÀ</h2>
          <ul class="space-y-2">
            <li><a href="#">Segnala disservizio</a></li>
          </ul>
        </div>
        
        <!-- Column 3: CERCA -->
        <div>
          <h2 class="text-sm font-bold uppercase mb-4">CERCA</h2>
          <form>
            <label for="footer-search" class="sr-only">Cerca nel sito</label>
            <input type="text" id="footer-search" placeholder="Cerca nel sito" class="w-full px-3 py-2 border rounded">
            <button type="submit" class="mt-2 btn btn-primary">Cerca</button>
          </form>
        </div>
        
        <!-- Column 4: FORSE STAVI CERCANDO -->
        <div>
          <h2 class="text-sm font-bold uppercase mb-4">FORSE STAVI CERCANDO</h2>
          <ul class="space-y-2">
            <li><a href="#">Rilascio Carta Identità Elettronica (CIE)</a></li>
            <li><a href="#">Cambio di residenza</a></li>
            <li><a href="#">Tributi online</a></li>
            <li><a href="#">Prenotazione appuntamenti</a></li>
            <li><a href="#">Rilascio tessera elettorale</a></li>
            <li><a href="#">Voucher connettività</a></li>
          </ul>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Section 2: Main Footer (6 columns) -->
  <div class="py-12 bg-primary-900 text-white">
    <div class="container">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8">
        
        <!-- Column 1: NOME DEL COMUNE -->
        <div class="lg:col-span-1">
          <h2 class="text-lg font-bold mb-4">NOME DEL COMUNE</h2>
        </div>
        
        <!-- Column 2: AMMINISTRAZIONE -->
        <div>
          <h3 class="text-sm font-bold uppercase mb-4">AMMINISTRAZIONE</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-white/80 hover:text-white">Organi di governo</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Aree amministrative</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Uffici</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Enti e fondazioni</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Politici</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Personale amministrativo</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Documenti e dati</a></li>
          </ul>
        </div>
        
        <!-- Column 3: CATEGORIE DI SERVIZIO -->
        <div>
          <h3 class="text-sm font-bold uppercase mb-4">CATEGORIE DI SERVIZIO</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-white/80 hover:text-white">Anagrafe e stato civile</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Cultura e tempo libero</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Vita lavorativa</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Imprese e commercio</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Appalti pubblici</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Catasto e urbanistica</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Turismo</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Mobilità e trasporti</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Educazione e formazione</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Giustizia e sicurezza pubblica</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Tributi, finanze e contravvenzioni</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Ambiente</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Salute, benessere e assistenza</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Autorizzazioni</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Agricoltura e pesca</a></li>
          </ul>
        </div>
        
        <!-- Column 4: NOVITÀ -->
        <div>
          <h3 class="text-sm font-bold uppercase mb-4">NOVITÀ</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-white/80 hover:text-white">Notizie</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Comunicati</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Avvisi</a></li>
          </ul>
        </div>
        
        <!-- Column 5: VIVERE IL COMUNE -->
        <div>
          <h3 class="text-sm font-bold uppercase mb-4">VIVERE IL COMUNE</h3>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-white/80 hover:text-white">Luoghi</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Eventi</a></li>
          </ul>
        </div>
        
        <!-- Column 6: CONTATTI -->
        <div>
          <h3 class="text-sm font-bold uppercase mb-4">CONTATTI</h3>
          <address class="not-italic text-sm space-y-2">
            <div>Comune di Nome Comune</div>
            <div>Via Roma 123 - 00100 Comune</div>
            <div>Codice fiscale / P. IVA: 00123456789</div>
          </address>
          <div class="mt-4 text-sm space-y-1">
            <div>Ufficio Relazioni con il Pubblico</div>
            <div>Numero verde: 800 016 123</div>
            <div>SMS e WhatsApp: +39 320 1234567</div>
            <div>Posta Elettronica Certificata</div>
            <div>Centralino unico: 012 3456</div>
          </div>
          <ul class="mt-4 space-y-2 text-sm">
            <li><a href="#" class="text-white/80 hover:text-white">Leggi le FAQ</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Prenotazione appuntamento</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Segnalazione disservizio</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Richiesta d'assistenza</a></li>
          </ul>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Section 3: Social & Legal (2 columns) -->
  <div class="py-8 bg-primary-950">
    <div class="container">
      <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        
        <!-- Social Icons -->
        <div>
          <h3 class="text-sm font-bold uppercase mb-4">SEGUICI SU</h3>
          <ul class="flex gap-4">
            <li>
              <a href="#" aria-label="Twitter" class="text-white/80 hover:text-white">
                <svg class="w-6 h-6"><use href="#it-twitter"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="Facebook" class="text-white/80 hover:text-white">
                <svg class="w-6 h-6"><use href="#it-facebook"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="YouTube" class="text-white/80 hover:text-white">
                <svg class="w-6 h-6"><use href="#it-youtube"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="Telegram" class="text-white/80 hover:text-white">
                <svg class="w-6 h-6"><use href="#it-telegram"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="Whatsapp" class="text-white/80 hover:text-white">
                <svg class="w-6 h-6"><use href="#it-whatsapp"></use></svg>
              </a>
            </li>
            <li>
              <a href="#" aria-label="RSS" class="text-white/80 hover:text-white">
                <svg class="w-6 h-6"><use href="#it-rss"></use></svg>
              </a>
            </li>
          </ul>
        </div>
        
        <!-- Legal Links -->
        <div>
          <ul class="flex flex-wrap gap-4 text-sm">
            <li><a href="#" class="text-white/80 hover:text-white">Amministrazione trasparente</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Informativa privacy</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Note legali</a></li>
            <li><a href="#" class="text-white/80 hover:text-white">Dichiarazione di accessibilità</a></li>
          </ul>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Section 4: Copyright -->
  <div class="py-4 bg-primary-950 border-t border-primary-800">
    <div class="container">
      <div class="text-center text-sm text-white/60">
        <p>© 2024 Comune di Nome Comune. Tutti i diritti riservati.</p>
      </div>
    </div>
  </div>
  
</footer>
```

---

## 🔍 FixCity Current Implementation

### Existing Files

**File**: `laravel/Themes/Sixteen/resources/views/sections/footer.blade.php`

```blade
@props(['data' => [], 'tpl' => 'full'])

@if($tpl === 'slim')
    @include('sections.footer-slim', ['data' => $data])
@else
    @include('sections.footer-full', ['data' => $data])
@endif
```

**File**: `laravel/Themes/Sixteen/resources/views/sections/footer-slim.blade.php`

```blade
<footer class="it-footer it-footer-slim" id="footer">
    <div class="it-footer-bottom">
        <div class="container">
            {{-- Logo + Bottom Links --}}
        </div>
    </div>
</footer>
```

**Problemi Identificati**:

1. **❌ Missing Top Section**: Quick links (4 columns) non implementati
2. **❌ Missing Main Section**: 6 columns con struttura diversa
3. **❌ Missing Social Section**: Social icons con SVG sprites
4. **❌ Missing Legal Section**: Legal links separati
5. **❌ Wrong CSS Classes**: Bootstrap Italia classes non usate correttamente
6. **❌ Missing Search Form**: Footer search form assente

---

## 🛠️ Implementation Plan

### Phase 1: Create Footer Component

**File**: `laravel/Themes/Sixteen/resources/views/components/sections/footer.blade.php`

```blade
@props(['data' => [], 'tpl' => 'full'])

{{--
    Footer Section Component
    Usage: <x-section slug="footer" :data="$footerData" tpl="full|slim" />
    Templates:
    - 'full' (default): Complete footer with all sections
    - 'slim': Minimal footer with logo and legal links only
--}}

@if($tpl === 'slim')
    @include('sections.footer-slim', ['data' => $data])
@else
    @include('sections.footer-full', ['data' => $data])
@endif
```

### Phase 2: Create Full Footer Template

**File**: `laravel/Themes/Sixteen/resources/views/sections/footer-full.blade.php`

```blade
@props(['data' => []])

<footer class="it-footer" id="footer">
    
    {{-- Section 1: Quick Links (4 columns) --}}
    <div class="py-8 border-t border-gray-200">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                {{-- Column 1: CONTATTA IL COMUNE --}}
                <div>
                    <h2 class="text-sm font-bold uppercase mb-4">
                        {{ $data['quick_links_title_1'] ?? 'CONTATTA IL COMUNE' }}
                    </h2>
                    <ul class="space-y-2">
                        @foreach($data['quick_links_1'] ?? [
                            ['label' => 'Leggi le domande frequenti', 'url' => '/it/tests/domande-frequenti'],
                            ['label' => 'Richiedi assistenza', 'url' => '/it/tests/assistenza-01-dati'],
                            ['label' => 'Chiama il numero verde 05 0505', 'url' => 'tel:050505'],
                            ['label' => 'Prenota appuntamento', 'url' => '/it/tests/appuntamento-01-ufficio'],
                        ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-sm text-gray-600 hover:text-primary-600 transition-colors">
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Column 2: PROBLEMI IN CITTÀ --}}
                <div>
                    <h2 class="text-sm font-bold uppercase mb-4">
                        {{ $data['quick_links_title_2'] ?? 'PROBLEMI IN CITTÀ' }}
                    </h2>
                    <ul class="space-y-2">
                        @foreach($data['quick_links_2'] ?? [
                            ['label' => 'Segnala disservizio', 'url' => '/it/tests/segnalazione-dettaglio'],
                        ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-sm text-gray-600 hover:text-primary-600 transition-colors">
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Column 3: CERCA --}}
                <div>
                    <h2 class="text-sm font-bold uppercase mb-4">
                        {{ $data['quick_links_title_3'] ?? 'CERCA' }}
                    </h2>
                    <form action="{{ $data['search_action'] ?? '/it/tests/risultati-ricerca' }}" method="get">
                        <label for="footer-search" class="sr-only">Cerca nel sito</label>
                        <input 
                            type="text" 
                            id="footer-search" 
                            name="q"
                            placeholder="Cerca nel sito" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                        >
                        <button type="submit" class="mt-2 btn btn-primary w-full">
                            <svg class="icon icon-sm me-2"><use href="#it-search"></use></svg>
                            Cerca
                        </button>
                    </form>
                </div>
                
                {{-- Column 4: FORSE STAVI CERCANDO --}}
                <div>
                    <h2 class="text-sm font-bold uppercase mb-4">
                        {{ $data['quick_links_title_4'] ?? 'FORSE STAVI CERCANDO' }}
                    </h2>
                    <ul class="space-y-2">
                        @foreach($data['quick_links_4'] ?? [
                            ['label' => 'Rilascio Carta Identità Elettronica (CIE)', 'url' => '/it/tests/servizio-dettaglio'],
                            ['label' => 'Cambio di residenza', 'url' => '/it/tests/servizi'],
                            ['label' => 'Tributi online', 'url' => '/it/tests/servizi'],
                            ['label' => 'Prenotazione appuntamenti', 'url' => '/it/tests/appuntamento-01-ufficio'],
                            ['label' => 'Rilascio tessera elettorale', 'url' => '/it/tests/servizi'],
                            ['label' => 'Voucher connettività', 'url' => '/it/tests/servizi'],
                        ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-sm text-gray-600 hover:text-primary-600 transition-colors">
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>

    {{-- Section 2: Main Footer (6 columns) --}}
    <div class="py-12 bg-primary-900 text-white">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8">
                
                {{-- Column 1: NOME DEL COMUNE --}}
                <div class="lg:col-span-1">
                    <h2 class="text-lg font-bold mb-4">
                        {{ $data['site_name'] ?? 'NOME DEL COMUNE' }}
                    </h2>
                </div>
                
                {{-- Column 2: AMMINISTRAZIONE --}}
                <div>
                    <h3 class="text-sm font-bold uppercase mb-4">AMMINISTRAZIONE</h3>
                    <ul class="space-y-2 text-sm">
                        @foreach($data['footer_links_amministrazione'] ?? [
                            'Organi di governo',
                            'Aree amministrative',
                            'Uffici',
                            'Enti e fondazioni',
                            'Politici',
                            'Personale amministrativo',
                            'Documenti e dati',
                        ] as $label)
                        <li>
                            <a href="/it/tests/amministrazione" class="text-white/80 hover:text-white transition-colors">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Column 3: CATEGORIE DI SERVIZIO --}}
                <div>
                    <h3 class="text-sm font-bold uppercase mb-4">CATEGORIE DI SERVIZIO</h3>
                    <ul class="space-y-2 text-sm">
                        @foreach($data['footer_links_servizi'] ?? [
                            'Anagrafe e stato civile',
                            'Cultura e tempo libero',
                            'Vita lavorativa',
                            'Imprese e commercio',
                            'Appalti pubblici',
                            'Catasto e urbanistica',
                            'Turismo',
                            'Mobilità e trasporti',
                            'Educazione e formazione',
                            'Giustizia e sicurezza pubblica',
                            'Tributi, finanze e contravvenzioni',
                            'Ambiente',
                            'Salute, benessere e assistenza',
                            'Autorizzazioni',
                            'Agricoltura e pesca',
                        ] as $label)
                        <li>
                            <a href="/it/tests/servizi" class="text-white/80 hover:text-white transition-colors">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Column 4: NOVITÀ --}}
                <div>
                    <h3 class="text-sm font-bold uppercase mb-4">NOVITÀ</h3>
                    <ul class="space-y-2 text-sm">
                        @foreach($data['footer_links_novita'] ?? [
                            'Notizie',
                            'Comunicati',
                            'Avvisi',
                        ] as $label)
                        <li>
                            <a href="/it/tests/novita" class="text-white/80 hover:text-white transition-colors">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Column 5: VIVERE IL COMUNE --}}
                <div>
                    <h3 class="text-sm font-bold uppercase mb-4">VIVERE IL COMUNE</h3>
                    <ul class="space-y-2 text-sm">
                        @foreach($data['footer_links_vivere'] ?? [
                            'Luoghi',
                            'Eventi',
                        ] as $label)
                        <li>
                            <a href="/it/tests/eventi" class="text-white/80 hover:text-white transition-colors">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Column 6: CONTATTI --}}
                <div>
                    <h3 class="text-sm font-bold uppercase mb-4">CONTATTI</h3>
                    <address class="not-italic text-sm space-y-2">
                        <div>{{ $data['address_name'] ?? 'Comune di Nome Comune' }}</div>
                        <div>{{ $data['address_street'] ?? 'Via Roma 123 - 00100 Comune' }}</div>
                        <div>{{ $data['address_vat'] ?? 'Codice fiscale / P. IVA: 00123456789' }}</div>
                    </address>
                    <div class="mt-4 text-sm space-y-1">
                        <div>{{ $data['contact_urp'] ?? 'Ufficio Relazioni con il Pubblico' }}</div>
                        <div>{{ $data['contact_phone'] ?? 'Numero verde: 800 016 123' }}</div>
                        <div>{{ $data['contact_whatsapp'] ?? 'SMS e WhatsApp: +39 320 1234567' }}</div>
                        <div>{{ $data['contact_pec'] ?? 'Posta Elettronica Certificata' }}</div>
                        <div>{{ $data['contact_centralino'] ?? 'Centralino unico: 012 3456' }}</div>
                    </div>
                    <ul class="mt-4 space-y-2 text-sm">
                        @foreach($data['footer_contact_links'] ?? [
                            ['label' => 'Leggi le FAQ', 'url' => '/it/tests/domande-frequenti'],
                            ['label' => 'Prenotazione appuntamento', 'url' => '/it/tests/appuntamento-01-ufficio'],
                            ['label' => 'Segnalazione disservizio', 'url' => '/it/tests/segnalazione-dettaglio'],
                            ['label' => 'Richiesta d\'assistenza', 'url' => '/it/tests/assistenza-01-dati'],
                        ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-white/80 hover:text-white transition-colors">
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>

    {{-- Section 3: Social & Legal --}}
    <div class="py-8 bg-primary-950">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                
                {{-- Social Icons --}}
                <div>
                    <h3 class="text-sm font-bold uppercase mb-4">SEGUICI SU</h3>
                    <ul class="flex gap-4">
                        @foreach($data['social_links'] ?? [
                            ['name' => 'Twitter', 'icon' => 'it-twitter', 'url' => '#'],
                            ['name' => 'Facebook', 'icon' => 'it-facebook', 'url' => '#'],
                            ['name' => 'YouTube', 'icon' => 'it-youtube', 'url' => '#'],
                            ['name' => 'Telegram', 'icon' => 'it-telegram', 'url' => '#'],
                            ['name' => 'Whatsapp', 'icon' => 'it-whatsapp', 'url' => '#'],
                            ['name' => 'RSS', 'icon' => 'it-rss', 'url' => '#'],
                        ] as $social)
                        <li>
                            <a 
                                href="{{ $social['url'] }}" 
                                aria-label="{{ $social['name'] }}"
                                class="text-white/80 hover:text-white transition-colors"
                            >
                                <svg class="w-6 h-6">
                                    <use href="#{{ $social['icon'] }}"></use>
                                </svg>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                {{-- Legal Links --}}
                <div>
                    <ul class="flex flex-wrap gap-4 text-sm">
                        @foreach($data['legal_links'] ?? [
                            ['label' => 'Amministrazione trasparente', 'url' => '#'],
                            ['label' => 'Informativa privacy', 'url' => '/privacy'],
                            ['label' => 'Note legali', 'url' => '/note-legali'],
                            ['label' => 'Dichiarazione di accessibilità', 'url' => '/accessibilita'],
                        ] as $link)
                        <li>
                            <a href="{{ $link['url'] }}" class="text-white/80 hover:text-white transition-colors">
                                {{ $link['label'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
        </div>
    </div>

    {{-- Section 4: Copyright --}}
    <div class="py-4 bg-primary-950 border-t border-primary-800">
        <div class="container">
            <div class="text-center text-sm text-white/60">
                <p>© {{ date('Y') }} {{ $data['site_name'] ?? 'Comune di Nome Comune' }}. Tutti i diritti riservati.</p>
            </div>
        </div>
    </div>
    
</footer>
```

### Phase 3: Update Layout

**File**: `laravel/Themes/Sixteen/resources/views/layouts/app.blade.php`

**Change**:
```blade
{{-- BEFORE --}}
<footer>
    {{-- Existing footer --}}
</footer>

{{-- AFTER --}}
<x-section slug="footer" :data="$footerData" tpl="full" />
```

### Phase 4: Build & Verify

```bash
# 1. Enter theme directory
cd laravel/Themes/Sixteen

# 2. Build assets
npm run build

# 3. Copy to public_html
npm run copy

# 4. Clear Laravel cache
cd ../../../laravel
php artisan view:clear
php artisan cache:clear

# 5. Test at http://fixcity.local/it/tests/argomenti
```

---

## 📋 Usage Examples

### Full Footer (Default)

```blade
<x-section slug="footer" :data="$footerData" tpl="full" />
```

### Slim Footer

```blade
<x-section slug="footer" :data="$footerData" tpl="slim" />
```

### In Page Template

```blade
{{-- pages/tests/[slug].blade.php --}}
<x-layouts.app>
    @volt('tests.view')
    <div>
        <x-header />
        
        <main id="main-content">
            <x-page side="content" :slug="$pageSlug" :data="$data" />
        </main>
        
        <x-section slug="footer" :data="$footerData" tpl="full" />
    </div>
    @endvolt
</x-layouts.app>
```

---

## 📊 Success Metrics

| Metric | Target | Current | Status |
|--------|--------|---------|--------|
| Quick Links Section | 4 columns | ❌ | 🔴 |
| Main Footer Section | 6 columns | ❌ | 🔴 |
| Social Icons | 6 icons | ❌ | 🔴 |
| Legal Links | 4 links | ❌ | 🔴 |
| Search Form | Present | ❌ | 🔴 |
| HTML Match | 95%+ | 0% | 🔴 |

---

## 🤖 Multi-Agent Coordination

**OpenViking Context**:
```bash
openviking add-memory "Footer component: <x-section slug=\"footer\" tpl=\"full|slim\" />. 4 sections: quick links, main footer, social/legal, copyright."
```

**GSD Phase**: `.planning/phases/10-footer-implementation/`

**Agents**:
- **Amelia (Dev)**: Implementation
- **Sally (UX)**: Visual compliance
- **gsd-verifier**: HTML match validation

---

**Next Step**: Execute GSD Phase 10  
**ETA**: 2 ore  
**Blockers**: Nessuno
