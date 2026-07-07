@props(['title' => '', 'items' => [], 'topics' => []])
@php($featuredTopics = $items ?: $topics)
<x-pub_theme::components.blocks.topics.grid :title="$title" :topics="$featuredTopics" />
