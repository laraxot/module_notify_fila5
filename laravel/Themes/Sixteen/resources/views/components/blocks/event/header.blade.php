@props(['title' => '', 'subtitle' => '', 'description' => '', 'date' => '', 'category' => '', 'location' => ''])
<x-pub_theme::components.blocks.news.header :title="$title" :subtitle="$subtitle" :description="$description" :date="$date" :category="$category ?: $location" />
