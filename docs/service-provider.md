---
title: "Service Provider del Modulo Notify"
type: concept
tags: [service, provider]
created: 2026-07-14
updated: 2026-07-14
qmd: "service-provider service provider del modulo notify"
issues: ["https://github.com/provtv/base_ptv_fila5/issues/124"]
discussions: ["https://github.com/provtv/base_ptv_fila5/discussions/1"]
related:
  - "./-repos.md"
  - "./-todo.md"
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./AGENTS.md"
  - "./ANALISI-COMPLETA-.deprecated.md.md"
  - "./CHANGELOG.md"
related:
  - "./00-index-1.md"
  - "./00-index-2.md"
  - "./00-index.md"
  - "./ANALISI-COMPLETA-2025-10-01.md"
  - "./COMPLETAMENTO-PROGETTO-2025-10-01.md"
  - "./DOCUMENTATION_IMPROVEMENT_SUMMARY_2026-03-13.md"
  - "./GITHUB_ISSUES_RECOMMENDATIONS_2026-03-02.md"
  - "./IMPLEMENTATION_SUMMARY_2025-01-27.md"
---

# Service Provider del Modulo Notify

Il `NotifyServiceProvider` estende `XotBaseServiceProvider` e gestisce il bootstrap dei componenti del modulo e la registrazione dei binding.

## Linee Guida

- Dichiarare `public string $name = 'Notify';` immediatamente dopo `class NotifyServiceProvider`.
- Evitare docblock sopra la proprietà `$name`.
- Non sovrascrivere `boot()` a meno di necessità di personalizzazioni; in tal caso, chiamare sempre `parent::boot()` all'inizio.
- Se si sovrascrive `register()`, chiamare `parent::register()` per ereditare la logica base.
- Il metodo `provides()` può essere definito per esporre i binding creati.

## Esempio di Implementazione

```php
<?php

declare(strict_types=1);

namespace Modules\Notify\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class NotifyServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Notify';

    public function register(): void
    {
        parent::register();

        $this->app->singleton('notify.manager', function ($app) {
            return new \Modules\Notify\Services\NotificationManager();
        });
    }

    public function provides(): array
    {
        return ['notify.manager'];
    }
}
```

Per maggiori dettagli sul provider base, consulta `modules/xot/project_docs/providers/xotbaseserviceprovider.md`.
Per maggiori dettagli sul provider base, consulta `modules/xot/docs/providers/xotbaseserviceprovider.md`.
