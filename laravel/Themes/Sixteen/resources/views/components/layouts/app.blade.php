@props(['title' => ''])

<x-layouts.main>
    <div class="skiplink">
<<<<<<< HEAD
        <a class="visually-hidden-focusable" href="#main-container">Vai ai contenuti</a>
        <a class="visually-hidden-focusable" href="#footer">Vai al footer</a>
=======
        <a class="visually-hidden-focusable" href="#main-container">{{ __('pub_theme::ui.skip_to_content') }}</a>
        <a class="visually-hidden-focusable" href="#footer">{{ __('pub_theme::ui.skip_to_footer') }}</a>
>>>>>>> origin/dev
    </div><!-- /skiplink -->

    <x-section slug="header" />

    <main
        @if (request()->routeIs('tests.*'))
            data-page="{{ request()->route('slug') }}"
        @endif
    >
<<<<<<< HEAD
        <div class="container" id="main-container">
            {{ $slot }}
        </div>
=======
        {{ $slot }}
>>>>>>> origin/dev
    </main>

    @include('pub_theme::components.sections.search-modal')

    <x-section slug="footer" tpl="full" />
</x-layouts.main>
