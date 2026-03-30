# Theme Provider Hardcode Ban

## Rule

Non registrare provider di un tema concreto nel provider applicativo generale.

Esempio sbagliato:

```php
$this->app->register(\Themes\Sixteen\Providers\ThemeServiceProvider::class);
```

## Rationale

Il tema e configurabile e sostituibile. L'applicazione non deve accoppiarsi a `Themes\\Sixteen`.

La dipendenza corretta del front office e il namespace `pub_theme`, mentre la risoluzione del tema reale appartiene al sistema temi e alla configurazione.

## Consequences

- `AppServiceProvider` deve restare neutro rispetto al tema
- i blocchi e le section usano `pub_theme::...`
- il root `laravel/composer.json` deve restare minimale
- il merge dei composer dei moduli e dei temi passa da `wikimedia/composer-merge-plugin`
