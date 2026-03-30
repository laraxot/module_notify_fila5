# Geo Module Documentation

## Overview

Handles geographic data and maps integration for the Laraxot PTVX ecosystem.

## Features

- Geographic data management
- Map integration (Google Maps, OpenStreetMap)
- Location-based services
- Address management
- Coordinate systems

## Structure

```
laravel/Modules/Geo/
├── app/
│   ├── Models/
│   ├── Filament/
│   └── ...
├── docs/
├── lang/
└── resources/
```

## Models

```php
// Address model
Modules\Geo\Models\Address

// Location model
Modules\Geo\Models\Location

// Map model
Modules\Geo\Models\Map
```

## Dependencies

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)

## Links

- [Static Map Implementation](static-map-clickable-implementation.md)
- [Italian Address Structure](models/address-italian-structure.md)
- [Master Module Index](../README.md)

## Usage

```php
// Create address
$address = Address::create([
    'street' => 'Via Roma 123',
    'city' => 'Milano',
    'province' => 'MI',
    'postal_code' => '20100',
    'country' => 'IT',
    'latitude' => 45.4642,
    'longitude' => 9.1900,
]);

// Get coordinates
$coordinates = $address->getCoordinates();
```
