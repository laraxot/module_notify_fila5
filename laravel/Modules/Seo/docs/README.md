# Seo Module

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 4.x](https://img.shields.io/badge/Filament-4.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Translation Ready](https://img.shields.io/badge/Translation-IT%20%7C%20EN-green.svg)](https://laravel.com/docs/localization)

## Overview

The **Seo Module** provides a comprehensive search engine optimization toolkit for Laravel applications, integrating advanced metadata management, sitemaps, structured data, and AI-powered content analysis.

## Features

### Completed
- **Meta Tag Management**: Dynamic control over title, description, keywords, canonical URLs, and robots tags.
- **Sitemap Generation**: Automatic XML sitemap creation with multi-sitemap support and search engine pinging.
- **OpenGraph & Twitter Cards**: Dedicated support for social media previews and image optimization.
- **Schema.org Integration**: JSON-LD structured data for Local Business, Articles, Products, and more.
- **SEO Analytics**: Real-time content analysis and performance tracking.
- **Filament Integration**: Seamless management via the Filament admin panel.

### In Progress / Planned
- **AI-Powered Optimization**: Content quality scoring and readability suggestions.
- **Keyword Tracking**: Rank tracking, history, and competition analysis.
- **Competitor Analysis**: Gap identification and market comparison.
- **Reporting**: Automated PDF SEO reports.

## Installation

```bash
composer require laraxot/module-seo
php artisan module:enable Seo
php artisan migrate
```

## Meta Tags Management

```php
// Set meta tags
SEO::setTitle('Page Title');
SEO::setDescription('SEO optimized description');
SEO::setKeywords(['keyword1', 'keyword2']);
SEO::setCanonical(url()->current());

// Open Graph
SEO::setOpenGraph([
    'title' => 'Social Title',
    'description' => 'Social description',
    'image' => asset('images/og-image.jpg'),
]);
```

## Sitemap Generation

```php
// Generate sitemap
php artisan seo:sitemap:generate

// Dynamic sitemap
Sitemap::addUrl('/page', [
    'lastmod' => now(),
    'changefreq' => 'weekly',
    'priority' => 0.8,
]);
```

## Structured Data

```php
// Schema.org markup
SEO::addStructuredData([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => 'Article Title',
    'datePublished' => '2025-01-01',
    'author' => [
        '@type' => 'Person',
        'name' => 'Author Name',
    ],
]);
```

## Quality Status

### Compliance
- **PHPStan**: Level 10
- **Filament**: Compatible 4.x
- **Translations**: IT/EN complete
- **SEO Score**: 95/100

## Documentation

### Architecture
- [Module Structure](structure.md)
- [Best Practices](best-practices.md)

### Components
- [Meta Tags](meta-tags.md)
- [Sitemap](sitemap.md)
- [Structured Data](structured-data.md)

### Development
- [Configuration](configuration.md)
- [Testing](testing.md)

## Quick Start

### Installation
```bash
# Enable module
php artisan module:enable Seo

# Run migrations
php artisan migrate

# Publish config
php artisan vendor:publish --tag=seo-config

# Generate initial sitemap
php artisan seo:sitemap:generate
```

### Configuration
```php
// config/seo.php
return [
    'meta' => [
        'default_title' => 'Site Title',
        'title_separator' => ' | ',
        'default_description' => 'Default site description',
    ],

    'sitemap' => [
        'enabled' => true,
        'cache_duration' => 3600,
        'path' => 'sitemap.xml',
    ],

    'structured_data' => [
        'enabled' => true,
        'organization' => [
            'name' => 'Organization Name',
            'url' => 'https://example.com',
        ],
    ],
];
```

## Filament Components

### SEO Resource
```php
// Filament Resource for SEO management
class SeoResource extends XotBaseResource
{
    protected static ?string $model = SeoMeta::class;

    public static function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label(__('seo::fields.title.label'))
                ->maxLength(60)
                ->required(),
            Forms\Components\Textarea::make('description')
                ->label(__('seo::fields.description.label'))
                ->maxLength(160)
                ->required(),
            Forms\Components\TagsInput::make('keywords')
                ->label(__('seo::fields.keywords.label')),
        ];
    }
}
```

## Best Practices

### Meta Tags Optimization
```php
// CORRECT - Optimized meta tags
SEO::setTitle('Descriptive Title < 60 chars');
SEO::setDescription('Attractive, informative description between 120-160 chars');
SEO::setKeywords(['relevant', 'keywords']);
```

### Sitemap Management
```php
// CORRECT - Auto-update sitemap
Event::listen(PageCreated::class, function ($event) {
    Artisan::call('seo:sitemap:generate');
});
```

### Structured Data
```php
// CORRECT - Complete, valid Schema.org
SEO::addStructuredData([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'Business Name',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Via Roma 123',
        'addressLocality' => 'Milano',
        'postalCode' => '20100',
        'addressCountry' => 'IT',
    ],
]);
```

## Troubleshooting

### Sitemap Not Generating
```bash
# Check permissions
chmod 755 public_html/
chmod 644 public_html/sitemap.xml

# Regenerate sitemap
php artisan seo:sitemap:generate --force
```

### Invalid Structured Data
```bash
# Validate with Google
# https://search.google.com/test/rich-results

# Local test
php artisan seo:validate-schema
```

## Contributing

### Contribution Checklist
- [ ] Code passes PHPStan Level 10
- [ ] SEO tests added
- [ ] Documentation updated
- [ ] Translations complete (IT/EN)
- [ ] Schema.org validated

## Roadmap

### Q1 2025
- [ ] **Advanced Analytics** - Google Analytics 4 integration
- [ ] **Performance Monitoring** - Core Web Vitals tracking
- [ ] **AI Meta Generation** - Automatic meta tag generation

### Q2 2025
- [ ] **Video SEO** - Video schema markup
- [ ] **Local SEO** - Local search optimization
- [ ] **International SEO** - Hreflang and geo-targeting

## Support

- **Email**: seo@laraxot.com
- **Issues**: [GitHub Issues](https://github.com/laraxot/seo-module/issues)
- **Docs**: [Complete Documentation](https://docs.laraxot.com/seo)

---

**Last Updated**: October 14, 2025
**Version**: 1.0.0
**PHPStan Level**: 10
**Translation**: IT/EN ✅
**SEO Score**: 95/100
