{{-- Search Bar & Feedback Form - Design Comuni Style --}}
@props([
    'search_placeholder' => 'Cerca una parola chiave',
    'feedback_title' => 'Quanto sono chiare le informazioni presenti in questo sito?',
])

<section class="py-8">
    <div class="container">
        <div class="row g-4">
            {{-- Search Bar --}}
            <div class="col-12 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">Cerca nel sito</h3>
                        <form action="#" method="get" class="search-form">
                            <div class="form-group mb-3">
                                <label for="site-search" class="visually-hidden">{{ $search_placeholder }}</label>
                                <input 
                                    type="text" 
                                    id="site-search" 
                                    class="form-control" 
                                    placeholder="{{ $search_placeholder }}"
                                    name="q"
                                />
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <x-filament::icon icon="heroicon-o-magnifying-glass" class="w-5 h-5 me-2" />
                                Invio
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            {{-- Feedback Form --}}
            <div class="col-12 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h5 mb-3">Valuta la pagina</h3>
                        <form class="feedback-form">
                            {{-- Star Rating --}}
                            <div class="mb-4">
                                <label class="form-label">{{ $feedback_title }}</label>
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                    <input 
                                        type="radio" 
                                        name="rating" 
                                        value="{{ $i }}" 
                                        id="star{{ $i }}" 
                                        class="rating-input"
                                    />
                                    <label for="star{{ $i }}" class="rating-label">★</label>
                                    @endfor
                                </div>
                            </div>
                            
                            {{-- Aspects Preferred --}}
                            <div class="mb-3">
                                <label class="form-label">Quali aspetti di questo sito pensi di utilizzare più frequentemente?</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            
                            {{-- Difficulties Encountered --}}
                            <div class="mb-3">
                                <label class="form-label">Quali difficoltà hai incontrato oggi nel completare le attività su questo sito?</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            
                            {{-- Submit --}}
                            <button type="submit" class="btn btn-primary">
                                Invia feedback
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
