# Modulo Job

## Overview

Il modulo **Job** gestisce i job asincroni e le code di elaborazione.

## Active Theme

**Current Theme**: **Sixteen** (AGID/Bootstrap Italia compliant)  
**Domain**: `fixcity.local`  
**Config**: `laravel/config/localhost/xra.php` → `pub_theme`

**Theme Documentation**: [Themes Index](../../Themes/docs/README.md)  
**Theme Context**: [.planning/THEME_CONTEXT.md](../../../../.planning/THEME_CONTEXT.md)

## Funzionalità

- Job queue management
- Retry logic
- Failed job handling
- Job monitoring

## Modelli Principali

```php
// Job
Job\Models\Job

// Failed Job
Job\Models\FailedJob

// Job Batch
Job\Models\JobBatch
```

## Services

```php
// Job dispatcher
Job\Services\JobDispatcher

// Queue manager
Job\Services\QueueManager
```

## Collegamenti

- [Documentazione Root](../../../docs/JOB_MODULE.md)
- [Xot Base](../Xot/docs/)
- [Notify Module](../Notify/docs/) - per notifiche job

## Backlinks

- [Queue Config](./queue/)
- [Failed Jobs](./failed/)

## AI Workflows
- [AI Methodologies](./ai-methodologies.md)
