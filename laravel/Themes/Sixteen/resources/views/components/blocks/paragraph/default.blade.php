@props([
    'content' => '',
    'class' => ''
])

<div class="paragraph py-6 {{ $class }}">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto prose prose-lg">
            {!! $content !!}
        </div>
    </div>
</div>
