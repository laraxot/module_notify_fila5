# Modulo Rating

## Overview

Il modulo **Rating** fa parte dell'ecosistema Laraxot PTVX e gestisce i sistemi di valutazione e recensione per entità del dominio.

## Scopo

Questo modulo gestisce:
- Valutazioni (rating) a stelle o numeriche
- Recensioni utente con moderazione
- Calcolo medie e statistiche
- Integrazione con entità valutabili (prodotti, servizi, etc.)

## Struttura

```
laravel/Modules/Rating/
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
- [User Module](../User/docs/) - Autenticazione
- [Tenant Module](../Tenant/docs/) - Multi-tenancy

## Collegamenti

- [Documentazione Root](../../../../docs/README.md)
- [Regole Architecture](../Xot/docs/architecture/)
- [Master Module Index](../README.md)

## Backlinks

- [Indice Moduli](../README.md)

## Modelli Principali

```php
// Rating model
Modules\Rating\Models\Rating

// Review model
Modules\Rating\Models\Review
```

## Utilizzo

```php
// Create rating
$rating = Rating::create([
    'rating' => 5,
    'comment' => 'Excellent!',
    'user_id' => $user->id,
    'rateable_type' => Product::class,
    'rateable_id' => $product->id,
]);

// Get average
$average = Rating::getAverageFor($product);
```
