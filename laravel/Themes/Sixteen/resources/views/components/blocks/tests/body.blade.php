@props(['title' => '', 'body' => '', 'content' => '', 'description' => ''])
<x-pub_theme::components.blocks.content.body :body-title="$title" :body-text="$body ?: $content ?: $description" />
