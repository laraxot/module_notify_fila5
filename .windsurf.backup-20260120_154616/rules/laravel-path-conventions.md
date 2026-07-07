<<<<<<< HEAD
# Convenzioni dei Path in Laravel e SaluteOra

## Regole Fondamentali per i Path di Cartelle

In Laravel e SaluteOra, i nomi delle cartelle principali (come definite nella struttura standard di Laravel) **DEVONO** rispettare il caso specifico definito dalle convenzioni di Laravel.
=======
# Convenzioni dei Path in Laravel e <nome progetto>

## Regole Fondamentali per i Path di Cartelle

In Laravel e <nome progetto>, i nomi delle cartelle principali (come definite nella struttura standard di Laravel) **DEVONO** rispettare il caso specifico definito dalle convenzioni di Laravel.
>>>>>>> dev

## Cartelle Standard e loro Casing Corretto

| Nome Cartella  | Caso Corretto | Caso Errato     |
|----------------|---------------|-----------------|
| `app`          | lowercase     | `App`           |
| `bootstrap`    | lowercase     | `Bootstrap`     |
| `config`       | lowercase     | `Config`        |
| `database`     | lowercase     | `Database`      |
| `public`       | lowercase     | `Public`        |
| `resources`    | lowercase     | `Resources`     |
| `routes`       | lowercase     | `Routes`        |
| `storage`      | lowercase     | `Storage`       |
| `tests`        | lowercase     | `Tests`         |
| `vendor`       | lowercase     | `Vendor`        |

## Convenzioni per le Viste

Le viste in Laravel devono essere collocate in:

```
<<<<<<< HEAD
/var/www/html/saluteora/laravel/Modules/Notify/resources/views/
=======
/var/www/html/<nome progetto>/laravel/Modules/Notify/resources/views/
>>>>>>> dev
```

**NON** in:

```
<<<<<<< HEAD
/var/www/html/saluteora/laravel/Modules/Notify/Resources/views/
=======
/var/www/html/<nome progetto>/laravel/Modules/Notify/Resources/views/
>>>>>>> dev
```

## Importanza

1. **Compatibilità cross-platform**: Linux è case-sensitive
2. **Coerenza con il framework**: Seguire le convenzioni di Laravel
3. **Prevedibilità**: Path consistenti facilitano debug e manutenzione

## Riferimenti

<<<<<<< HEAD
- [Documentazione completa](/var/www/html/saluteora/laravel/Modules/Notify/docs/LARAVEL_PATH_CONVENTIONS.md)
=======
- [Documentazione completa](/var/www/html/<nome progetto>/laravel/Modules/Notify/docs/LARAVEL_PATH_CONVENTIONS.md)
>>>>>>> dev
