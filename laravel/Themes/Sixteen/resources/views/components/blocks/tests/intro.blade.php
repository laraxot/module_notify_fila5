@props(['title' => '', 'subtitle' => '', 'description' => '', 'content' => ''])
<x-pub_theme::components.blocks.hero.default :title="$title" :subtitle="$subtitle" :content="$description ?: $content" />
