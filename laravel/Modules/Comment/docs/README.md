# Comment Module - Sistema di Commenti

[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 4.x](https://img.shields.io/badge/Filament-4.x-blue.svg)](https://filamentphp.com/)
[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Translation Ready](https://img.shields.io/badge/Translation-IT%20%7C%20EN-green.svg)](https://laravel.com/docs/localization)

## Overview

Il modulo **Comment** fornisce funzionalità di commento per l'applicazione, inclusi:

- 💬 **Sistema Commenti** - Commenti strutturati e threading
- 👥 **Moderazione** - Strumenti di moderazione e approvazione
- 🔔 **Notifiche** - Notifiche per risposte e menzioni
- 🎨 **Interfaccia Filament** - Gestione admin moderna
- 🌐 **Multi-lingua** - Traduzioni IT/EN complete

## Comment Management

```php
// Creazione commento
$comment = Comment::create([
    'user_id' => $user->id,
    'commentable_type' => Post::class,
    'commentable_id' => $post->id,
    'content' => 'Ottimo articolo!',
    'status' => CommentStatusEnum::APPROVED,
]);

// Threading - risposta a commento
$reply = Comment::create([
    'user_id' => $user->id,
    'parent_id' => $comment->id,
    'content' => 'Grazie del feedback!',
]);
```

## Moderation

```php
// Approvazione commenti
$comment->approve();

// Rifiuto commenti
$comment->reject($reason);

// Segnalazione spam
$comment->markAsSpam();
```

## Quality Status

### Compliance
- **PHPStan**: Level 10
- **Filament**: Compatible 4.x
- **Traduzioni**: IT/EN complete
- **Test Coverage**: In development

## Documentation

### Architecture
- [Struttura](structure.md)
- [Conflitti Risolti](struttura-e-conflitti.md)

### Filament Integration
- [MCP Server](mcp-server-recommended.md)
- [Roadmap 2025](roadmap-2025.md)

### Development
- [PHPStan Fixes](phpstan-fixes.md)
- [File Naming](file-naming-rules.md)

## Quick Start

### Installation
```bash
# Abilitare il modulo
php artisan module:enable Comment

# Eseguire le migrazioni
php artisan migrate

# Pubblicare le configurazioni
php artisan vendor:publish --tag=comment-config
```

### Configuration
```php
// config/comment.php
return [
    'moderation' => [
        'enabled' => true,
        'auto_approve_verified_users' => true,
    ],

    'threading' => [
        'enabled' => true,
        'max_depth' => 5,
    ],

    'notifications' => [
        'enabled' => true,
        'channels' => ['mail', 'database'],
    ],
];
```

## Contributing

### Contribution Checklist
- [ ] Codice passa PHPStan Level 10
- [ ] Test unitari aggiunti
- [ ] Documentazione aggiornata
- [ ] Traduzioni complete (IT/EN)

## Roadmap

### Q1 2025
- [ ] **PHPStan Level 10** - Compliance completa
- [ ] **Advanced Moderation** - Tools avanzati moderazione
- [ ] **Rich Text Support** - Supporto markdown/HTML

### Q2 2025
- [ ] **AI Moderation** - Moderazione automatica AI
- [ ] **Reactions** - Sistema reazioni (like, emoji)
- [ ] **Media Attachments** - Allegati immagini/video

## Support

- **Email**: comment@laraxot.com
- **Issues**: [GitHub Issues](https://github.com/laraxot/comment-module/issues)
- **Docs**: [Documentazione Completa](https://docs.laraxot.com/comment)

---

**Last Updated**: October 14, 2025
**Version**: 1.0.0
**PHPStan Level**: 10
**Translation**: IT/EN ✅
**Status**: Active Development
