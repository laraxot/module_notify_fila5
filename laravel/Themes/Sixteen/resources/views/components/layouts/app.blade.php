@props(['title' => ''])

<x-layouts.main>
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
    </div><!-- /skiplink -->

    <!-- Header with Alpine.js interactivity -->
    <header class="it-header-wrapper">
        <!-- Header Navbar - Navigation with Alpine -->
        <div class="it-header-navbar-wrapper" id="header-nav-wrapper" x-data="mobileMenu()" @keydown.escape="close()">
            <div class="container">
                <div class="navbar navbar-expand-lg">
                    <button 
                        class="navbar-toggler md:hidden" 
                        type="button" 
                        @click="toggle()"
                        :aria-expanded="isOpen"
                        aria-controls="nav4" 
                        aria-label="Mostra/Nascondi la navigazione" 
                        data-bs-target="#nav4" 
                        data-bs-toggle="collapse"
                    >
                        <svg class="icon text-white"><use xlink:href="#it-burger"></use></svg>
                    </button>
                    <div 
                        class="collapse navbar-collapse transition-all duration-300" 
                        id="nav4"
                        x-show="isOpen || !isMobile()"
                        @click.outside="close()"
                    >
                        <div class="menu-wrapper">
                            <nav aria-label="Principale">
                                <ul class="navbar-nav" data-element="main-navigation">
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Amministrazione</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Novità</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Servizi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Vivere il Comune</a></li>
                                </ul>
                            </nav>
                            <nav aria-label="Secondaria">
                                <ul class="navbar-nav navbar-secondary">
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Iscrizioni</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Estate in città</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Polizia locale</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#" @click="closeOnItemClick()">Tutti gli argomenti</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="main-container">
        {{ $slot }}
    </main>

    @include('pub_theme::components.sections.search-modal')

    <x-section slug="footer" tpl="full" />
    
</x-layouts.main>
