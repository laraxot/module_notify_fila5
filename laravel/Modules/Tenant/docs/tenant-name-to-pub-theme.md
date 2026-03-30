# Dal tenant al `pub_theme`

La risoluzione del tema pubblico e dinamica. Il tema non va registrato in `AppServiceProvider`: viene ricavato dal tenant e dalla sua configurazione `xra.php`.

## Algoritmo reale

1. Leggere `APP_URL` da `laravel/.env`.
2. Estrarre solo l'host.
3. Rimuovere `http://` o `https://`.
4. Rimuovere l'eventuale prefisso `www.`.
5. Fare `explode('.')` sull'host.
6. Invertire l'array.
7. Unire con `'/'`.

Esempio:

```text
APP_URL=http://fixcity.local
host -> fixcity.local
parts -> ["fixcity", "local"]
reverse -> ["local", "fixcity"]
config name -> local/fixcity
```

## Conseguenza

Il file di configurazione tenant-aware diventa:

```text
laravel/config/local/fixcity/xra.php
```

Dentro quel file la chiave:

```php
'pub_theme' => 'Sixteen'
```

identifica il tema pubblico attivo, quindi il percorso del tema e:

```text
laravel/Themes/Sixteen
```

## Catena completa

1. `APP_URL`
2. nome tenant normalizzato
3. `config/<tenant>/xra.php`
4. `pub_theme`
5. registrazione runtime del tema da parte dell'infrastruttura Xot

## Regole

- Non hardcodare `ThemeServiceProvider` in `laravel/app/Providers/AppServiceProvider.php`.
- Il tema e un vestito configurabile, non una dipendenza fissa dell'applicazione.
- La sorgente di verita del tema pubblico e `config/<tenant>/xra.php`.

## Riferimenti

- [configuration](configuration.md)
- [AGNOSTIC_DOCUMENTATION_RULE](../../docs/AGNOSTIC_DOCUMENTATION_RULE.md)
