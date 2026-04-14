# Geo Module — Documentation Index

## Quick Reference

| Topic | File | Status |
|-------|------|--------|
| **AddressInput Component** | [address-input-component.md](./address-input-component.md) | ✅ Active |
| **Location Spinner UX** | [location-spinner-ux.md](./location-spinner-ux.md) | ✅ Active |
| AddressField Component (legacy) | [address-field-component.md](./address-field-component.md) | ⚠️ Legacy |
| AddressResource | [address-resource.md](./filament/address-resource.md) | ✅ Active |
| Module Boundary Philosophy | [../Fixcity/docs/MODULE-BOUNDARY-PHILOSOPHY.md](../Fixcity/docs/MODULE-BOUNDARY-PHILOSOPHY.md) | ✅ Active |
| README / Overview | [README.md](./README.md) | ✅ Active |

## Filament Components

### Forms
- **AddressInput** — Single address input with geolocation → [address-input-component.md](./address-input-component.md)
- **AddressField** (Forms/Components) — Full address section with cascading selects
- **AddressesField** — Repeater for multiple addresses

### Resources
- **AddressResource** — CRUD for addresses → `./filament/address-resource.md`
- **LocationResource** — CRUD for locations

### Widgets
- **LocationWidget** — Map display widget
- **LocationMapTableWidget** — Table with map integration

## Architecture

- [README.md](./README.md) — Module overview
- [architectural-philosophy.md](./architectural-philosophy.md) — Architecture patterns
- [00-index.md](./00-index.md) — Legacy index

## Actions (Geocoding)

| Action | File |
|--------|------|
| GetCoordinatesFromAddressAction | `app/Actions/GetCoordinatesByAddressAction.php` |
| GetAddressFromNominatimAction | `app/Actions/Nominatim/GetAddressFromNominatimAction.php` |
| GetAddressFromGoogleMapsAction | `app/Actions/GoogleMaps/GetAddressFromGoogleMapsAction.php` |
| GetAddressFromMapboxAction | `app/Actions/Mapbox/GetAddressFromMapboxAction.php` |
| CalculateDistanceAction | `app/Actions/CalculateDistanceAction.php` |

## Models

- **Address** — `app/Models/Address.php`
- **Location** — `app/Models/Location.php`
- **Locality** — `app/Models/Locality.php`
- **Province** — `app/Models/Province.php`
- **Region** — `app/Models/Region.php`

## Translations

- Italian: `lang/it/address.php`
- English: `lang/en/address.php`

---

## DEDUPLICATION NOTICE

This module has **455+ .md files** in docs/. Many are duplicates, backups, or obsolete analyses.

### Categories of duplicates to clean up:

| Pattern | Count | Action |
|---------|-------|--------|
| `*sumy.md`, `*-summary.md`, `*summary.md` | ~20 | Merge into canonical doc, delete rest |
| `*backup.md`, `*-backup.md`, `*_BACKUP.md` | ~15 | Delete (git history preserves them) |
| `*--*.md`, `*.md` (empty name) | ~5 | Delete |
| Multiple `address-resource-*.md` | ~30 | Consolidate into one |
| Multiple `address-implementation*.md` | ~15 | Consolidate into one |
| Multiple `comune-sushi*.md` | ~25 | Consolidate into one |
| Multiple `comprehensive-guide*.md` | ~10 | Keep latest, delete rest |
| Multiple `address-translation*.md` | ~10 | Keep one |

### Plan:
1. Identify canonical docs for each topic
2. Merge unique content from duplicates
3. Delete all duplicates and backups
4. Update this index

**Target**: Reduce from ~455 files to ~30 files.
