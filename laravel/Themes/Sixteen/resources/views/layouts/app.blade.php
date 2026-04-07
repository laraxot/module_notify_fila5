<x-layouts.main>
    <div class="skiplink">
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al
            footer</a>
    </div><!-- /skiplink -->

    <x-section slug="header" />

<<<<<<< HEAD
    <main>
=======
    <main id="main-container">
>>>>>>> origin/dev
        {{ $slot }}
    </main>

    <x-section slug="footer" tpl="full" />
</x-layouts.main>
