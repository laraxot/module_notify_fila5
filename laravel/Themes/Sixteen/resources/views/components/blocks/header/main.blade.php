@props(['municipality' => '', 'subtitle' => '', 'search_url' => '#'])

{{-- Header Main - Bootstrap Italia Style --}}
<div class="it-header-main-wrapper">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            {{-- Left: Brand --}}
            <div class="it-brand-wrapper">
                <a href="/" class="d-flex align-items-center gap-3 text-decoration-none text-white">
                    <img src="https://picsum.photos/80/80" alt="Logo" class="rounded-circle" width="80" height="80">
                    <div class="it-brand-text">
                        <h2 class="h5 mb-0 text-white">{{ $municipality ?: 'Nome del Comune' }}</h2>
                        @if($subtitle)
                        <p class="text-white mb-0 small">{{ $subtitle }}</p>
                        @endif
                    </div>
                </a>
            </div>
            
            {{-- Right: Search Button --}}
            <div class="it-right-zone">
                <button class="search-link" data-bs-toggle="modal" data-bs-target="#searchModal">
                    <svg class="icon icon-white">
                        <use href="#it-search"></use>
                    </svg>
                    <span class="d-none d-lg-block">Cerca</span>
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Search Modal --}}
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Cerca nel sito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ $search_url }}" method="get">
                    <div class="mb-3">
                        <label for="search-input" class="form-label">Parola chiave</label>
                        <input type="text" class="form-control" id="search-input" placeholder="Cerca una parola chiave">
                    </div>
                    <button type="submit" class="btn btn-primary">Cerca</button>
                </form>
            </div>
        </div>
    </div>
</div>
