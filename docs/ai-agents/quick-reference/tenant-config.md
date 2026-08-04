# Quick Reference - Tenant Config

## Verifiche base

```php
config('app.url');
app(\Modules\Tenant\Actions\GetTenantNameAction::class)->execute();
<<<<<<< HEAD
config('it.this-project.manager.morph_map');
=======
config('it.quaeris.manager.morph_map');
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
\Illuminate\Database\Eloquent\Relations\Relation::morphMap();
```

## Problema tipico

- Il worker usa config vecchia/cached o tenant path inatteso.

## Azioni

1. verificare tenant risolto
2. verificare chiavi config effettivamente caricate
3. riallineare provider/morph map
4. restart queue worker
