# 🎫 Modulo Fixcity - Sistema di Gestione Ticket

[![PHPStan Level 10](https://img.shields.io/badge/PHPStan-Level%2010-brightgreen.svg)](https://phpstan.org/)
[![Laravel 12.x](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com/)
[![Filament 5.x](https://img.shields.io/badge/Filament-5.x-blue.svg)](https://filamentphp.com/)
[![Translation Ready](https://img.shields.io/badge/Translation-IT%20%7C%20EN-green.svg)](https://laravel.com/docs/localization)

> **🚀 Modulo Fixcity**: Sistema completo per la gestione di ticket, segnalazioni e supporto tecnico con interfaccia Filament avanzata.

## 📋 Panoramica

Il modulo **Fixcity** è il sistema di ticketing dell'applicazione, fornendo:

- 🎫 **Gestione Ticket Completa** - Creazione, assegnazione e tracking ticket
- 👥 **Gestione Utenti e Ruoli** - Sistema di autorizzazione granulare
- 📊 **Dashboard e Reporting** - Statistiche e metriche avanzate
- 🔔 **Sistema Notifiche** - Notifiche real-time per aggiornamenti
- 🎨 **Interfaccia Filament** - UI moderna e responsive
- 🌐 **Multi-lingua** - Traduzioni complete IT/EN
- 🧙 **Wizard Frontoffice** - Creazione guidata unificata per i cittadini

## 🧙 Wizard Unificato (Segnalazione Crea)

Il modulo include un wizard unificato per la creazione di segnalazioni lato cittadino, che unifica le fasi di privacy, inserimento dati e riepilogo in un'unica esperienza fluida.

- **URL**: `/it/tests/segnalazione-crea`
- **Widget**: `CreateTicketWizardWidget`
- **Layout**: Design Comuni Italia (Bootstrap Italia replicated)

Per dettagli sull'architettura del wizard consulta: [Ticket Wizard Frontoffice](ticket-wizard-frontoffice.md)

## ⚡ Funzionalità Core

### 🎫 **Ticket Management**
```php
// Creazione ticket con informazioni complete
$ticket = Ticket::create([
    'name' => 'Problema sistema',
    'content' => 'Descrizione dettagliata del problema',
    'priority' => TicketPriorityEnum::HIGH,
    'status' => TicketStatusEnum::OPEN,
    'type' => TicketTypeEnum::TECHNICAL,
    'owner_id' => $user->id,
]);
```

## 🎯 Stato Qualità

- **PHPStan**: Level 10 Compliance ✅
- **Test Coverage**: 85%+ ✅
- **Architettura**: Modular Monolith con Laraxot Base ✅

## 🚀 Quick Start

```bash
# Abilitare il modulo
php artisan module:enable Fixcity

# Eseguire le migrazioni
php artisan migrate

# Popolare dati di test
php artisan db:seed --class=FixcitySeeder
```

## 📚 Documentazione Completa

### 🏗️ **Architettura**
- [Struttura Modulo](structure.md) - Panoramica architettura
- [Modelli e Relazioni](models.md) - Documentazione modelli
- [Enum e Stati](enums.md) - Gestione stati e tipi

### 🎨 **Filament Integration**
- [Resources](resources.md) - Gestione risorse Filament
- [Pages](pages.md) - Pagine personalizzate
- [Widgets](widgets.md) - Widget dashboard
- [Ticket Wizard Frontoffice](ticket-wizard-frontoffice.md) - Wizard creazione ticket frontoffice

## 📞 Support & Maintainers

- **🏢 Team**: Laraxot Development Team
- **📧 Email**: fixcity@laraxot.com

---

**🔄 Ultimo aggiornamento**: 9 Aprile 2026
**📦 Versione**: 2.0.0
**🐛 PHPStan Level**: 10 ✅
**🌐 Translation Standards**: IT/EN complete ✅
**✨ Filament 5.x**: Integrato e funzionante ✅
