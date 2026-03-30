# Modulo Gdpr

## Overview

Il modulo **Gdpr** gestisce la conformità al Regolamento Generale sulla Protezione dei Dati (GDPR) nell'ecosistema Laraxot PTVX.

## Scopo

Gestisce le funzionalità specifiche del dominio GDPR:
- Consenso utente (cookie, privacy, marketing)
- Gestione diritti utente (accesso, cancellazione, portabilità)
- Registro delle attività di trattamento
- Data retention policies
- Privacy by design

## Struttura

```
laravel/Modules/Gdpr/
├── app/
│   ├── Models/
│   ├── Filament/
│   └── ...
├── docs/
├── lang/
└── resources/
```

## Dipendenze

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)

## Collegamenti

- [Documentazione Root](../../../../docs/README.md)
- [Master Module Index](../README.md)

## Backlinks

- [Moduli correlati](../README.md)

## Modelli Principali

```php
// Consent model
Modules\Gdpr\Models\Consent

// Privacy Policy model
Modules\Gdpr\Models\PrivacyPolicy

// Data Processing Register
Modules\Gdpr\Models\DataProcessingRegister
```

## Utilizzo

```php
// Record consent
Consent::record([
    'user_id' => $user->id,
    'type' => 'marketing',
    'granted' => true,
    'ip_address' => request()->ip(),
]);

// Check consent
if (Consent::hasGranted($user, 'marketing')) {
    // Send marketing communications
}

// Export user data
$export = GdprService::exportUserData($user);
```

## Compliance

- ✅ **Consenso**: Gestione granulare consensi
- ✅ **Diritti**: Esercizio diritti utente (accesso, cancellazione)
- ✅ **Registro**: Registro attività di trattamento
- ✅ **Retention**: Politiche di conservazione dati
- ✅ **Sicurezza**: Misure tecniche e organizzative
