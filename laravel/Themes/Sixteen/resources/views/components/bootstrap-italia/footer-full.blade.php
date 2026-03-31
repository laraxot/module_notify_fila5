{{-- Footer - Pure Tailwind CSS (Design Comuni Style) --}}
{{-- Reference: https://italia.github.io/design-comuni-pagine-statiche/sito/homepage.html --}}
{{-- NO Bootstrap Italia classes - ALL Tailwind CSS --}}

@props([
    'title' => 'Nome del Comune',
    'address' => 'Via Roma 123 - 00100 Comune',
    'fiscalCode' => '00123456789',
    'phone' => '012 3456',
    'greenNumber' => '800 016 123',
    'whatsapp' => '+39 320 1234567',
    'email' => 'urp@comune.it',
])

<footer>
    {{-- Main Footer - Dark Blue #003D73 --}}
    <div class="bg-[#003D73] text-white py-12">
        <div class="container mx-auto px-4">
            {{-- Logo Row --}}
            <div class="mb-8">
                <img src="{{ asset('themes/sixteen/bootstrap-italia/dist/images/logo-eu-inverted.svg') }}" 
                     alt="logo Unione Europea" 
                     class="h-12 mb-4" />
                <a href="#" class="inline-flex items-center gap-3 no-underline">
                    <svg class="w-16 h-16 text-white" aria-hidden="true">
                        <use href="{{ asset('themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-pa') }}"></use>
                    </svg>
                    <div>
                        <h2 class="text-2xl font-bold m-0">{{ $title }}</h2>
                    </div>
                </a>
            </div>
            
            {{-- Links Row --}}
            <div class="grid md:grid-cols-12 gap-8">
                {{-- Amministrazione --}}
                <div class="md:col-span-3">
                    <h4 class="text-white text-base font-bold uppercase mb-4">Amministrazione</h4>
                    <ul class="list-none p-0 m-0 space-y-2">
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Organi di governo</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Aree amministrative</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Uffici</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Enti e fondazioni</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Politici</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Personale amministrativo</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Documenti e dati</a></li>
                    </ul>
                </div>

                {{-- Categorie di servizio --}}
                <div class="md:col-span-6">
                    <h4 class="text-white text-base font-bold uppercase mb-4">Categorie di servizio</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <ul class="list-none p-0 m-0 space-y-2">
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Anagrafe e stato civile</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Cultura e tempo libero</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Vita lavorativa</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Imprese e commercio</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Appalti pubblici</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Catasto e urbanistica</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Turismo</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Mobilità e trasporti</a></li>
                            </ul>
                        </div>
                        <div>
                            <ul class="list-none p-0 m-0 space-y-2">
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Educazione e formazione</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Giustizia e sicurezza pubblica</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Tributi, finanze e contravvenzioni</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Ambiente</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Salute, benessere e assistenza</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Autorizzazioni</a></li>
                                <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Agricoltura e pesca</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Novità + Vivere --}}
                <div class="md:col-span-3">
                    <h4 class="text-white text-base font-bold uppercase mb-4">Novità</h4>
                    <ul class="list-none p-0 m-0 space-y-2 mb-6">
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Notizie</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Comunicati</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Avvisi</a></li>
                    </ul>
                    <h4 class="text-white text-base font-bold uppercase mb-4">Vivere il comune</h4>
                    <ul class="list-none p-0 m-0 space-y-2">
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Luoghi</a></li>
                        <li><a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Eventi</a></li>
                    </ul>
                </div>
            </div>
            
            {{-- Contatti --}}
            <div class="mt-8 pt-8 border-t border-white/20">
                <h4 class="text-white text-base font-bold uppercase mb-4">Contatti</h4>
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <p class="text-white text-sm opacity-80 leading-relaxed">
                            {{ $title }}<br>
                            {{ $address }}<br>
                            Codice fiscale / P. IVA: {{ $fiscalCode }}<br><br>
                            <a href="#" class="text-white no-underline text-sm opacity-80 hover:opacity-100 hover:no-underline">Ufficio Relazioni con il Pubblico</a><br>
                            Numero verde: {{ $greenNumber }}<br>
                            SMS e WhatsApp: {{ $whatsapp }}<br>
                            Posta Elettronica Certificata<br>
                            Centralino unico: {{ $phone }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Footer Secondary - Black #000000 --}}
    <div class="bg-[#000000] border-t border-[#333] py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                {{-- Legal Links --}}
                <div class="flex flex-wrap gap-4 text-sm">
                    <a href="#" class="text-white/60 no-underline hover:text-white hover:no-underline">Amministrazione trasparente</a>
                    <a href="#" class="text-white/60 no-underline hover:text-white hover:no-underline">Informativa privacy</a>
                    <a href="#" class="text-white/60 no-underline hover:text-white hover:no-underline">Note legali</a>
                    <a href="#" class="text-white/60 no-underline hover:text-white hover:no-underline">Dichiarazione di accessibilità</a>
                </div>
                
                {{-- Social --}}
                <div class="flex items-center gap-2">
                    <span class="text-white text-sm font-semibold">SEGUICI SU</span>
                    <a href="#" class="inline-flex items-center no-underline">
                        <svg class="w-5 h-5 text-white" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-twitter"></use>
                        </svg>
                        <span class="visually-hidden">Twitter</span>
                    </a>
                    <a href="#" class="inline-flex items-center no-underline">
                        <svg class="w-5 h-5 text-white" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-facebook"></use>
                        </svg>
                        <span class="visually-hidden">Facebook</span>
                    </a>
                    <a href="#" class="inline-flex items-center no-underline">
                        <svg class="w-5 h-5 text-white" aria-hidden="true">
                            <use href="/themes/sixteen/bootstrap-italia/dist/svg/sprites.svg#it-youtube"></use>
                        </svg>
                        <span class="visually-hidden">YouTube</span>
                    </a>
                </div>
            </div>
            
            {{-- Bottom Bar --}}
            <div class="mt-4 pt-4 border-t border-[#333] text-center">
                <ul class="list-none p-0 m-0 flex justify-center gap-4 text-sm">
                    <li><a href="#" class="text-white/60 no-underline hover:text-white hover:no-underline">Media policy</a></li>
                    <li><a href="#" class="text-white/60 no-underline hover:text-white hover:no-underline">Mappa del sito</a></li>
                </ul>
                <p class="text-white/60 text-sm mt-4 mb-0">
                    &copy; {{ date('Y') }} {{ $title }} - Tutti i diritti riservati<br>
                    P.IVA: {{ $fiscalCode }} - Codice Fiscale: {{ $fiscalCode }}
                </p>
            </div>
        </div>
    </div>
</footer>
