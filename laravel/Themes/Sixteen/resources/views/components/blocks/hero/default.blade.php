@props(['data' => []])

@php
    $title = $data['title'] ?? 'NOME DEL COMUNE';
    $subtitle = $data['subtitle'] ?? null;
    $content = $data['content'] ?? null;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="cmp-hero">
                <section class="it-hero-wrapper bg-white align-items-start">
                    <div class="it-hero-text-wrapper pt-0 ps-0 pb-4 pb-lg-60">
                        <h1 class="text-black" data-element="page-name">{{ $title }}</h1>
                        <div class="hero-text">
                            @if($subtitle)
                                <p>{{ $subtitle }}</p>
                            @endif
                            @if($content)
                                {!! $content !!}
                            @endif
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
