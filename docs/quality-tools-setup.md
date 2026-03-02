# Setup strumenti qualità codice

## Regola phpstan.neon

**NON modificare mai** `laravel/phpstan.neon`. Le correzioni vanno fatte solo nel codice sorgente.

## Strumenti richiesti

### PHPStan
- Config: `laravel/phpstan.neon` (immutabile)
- Comando: `cd laravel && ./vendor/bin/phpstan analyse Modules`

### PHPMD (PHP Mess Detector)
- **Installazione .phar**: `wget -c https://phpmd.org/static/latest/phpmd.phar -O laravel/tools/phpmd.phar`
- Oppure via Composer: `phpmd/phpmd` in require-dev
- Comando: `php phpmd.phar Modules text cleancode,codesize,controversial,design,naming,unusedcode`

### PHP Insights
- Installazione: `composer require nunomaduro/phpinsights --dev`
- Comando: `./vendor/bin/phpinsights analyse Modules --no-interaction`

## Collegamenti
- [phpstan-level-10-rules](phpstan-level-10-rules.md)
- [Error Resolution Process](../.cursor/rules/error-resolution-process.mdc)
