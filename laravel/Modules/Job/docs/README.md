# Modulo Job

## Overview

Il modulo **Job** gestisce i job asincroni e le code di elaborazione nell'ecosistema Laraxot PTVX.

## Funzionalità

- Job queue management
- Retry logic
- Failed job handling
- Job monitoring
- Background processing

## Modelli Principali

```php
// Job
Modules\Job\Models\Job

// Failed Job
Modules\Job\Models\FailedJob

// Job Batch
Modules\Job\Models\JobBatch
```

## Services

```php
// Job dispatcher
Modules\Job\Services\JobDispatcher

// Queue manager
Modules\Job\Services\QueueManager
```

## Struttura Progetto

```
base_fixcity_fila5/
├── public_html/              # DOCUMENT ROOT
│   └── index.php            # Entry point
├── laravel/Modules/Job/     # Questo modulo
└── database/                 # Database files
```

## Collegamenti

- [Documentazione Root](../../../../docs/README.md)
- [Xot Base](../Xot/docs/)
- [Notify Module](../Notify/docs/) - per notifiche job
- [Master Module Index](../README.md)

## Backlinks

- [Queue Config](./queue/)
- [Failed Jobs](./failed/)

<<<<<<< Updated upstream
## AI Workflows
- [AI Methodologies](./ai-methodologies.md)
||||||| Stash base
=======
## Utilizzo

```php
// Dispatch job
ProcessPodcast::dispatch($podcast);

// Dispatch with delay
ProcessPodcast::dispatch($podcast)->delay(now()->addMinutes(10));

// Chain jobs
\Illuminate\Support\Facades\Bus::chain([
    new ProcessPodcast($podcast),
    new ReleasePodcast($podcast),
])->dispatch();
```

## Queue Configuration

```php
// config/queue.php
return [
    'default' => env('QUEUE_CONNECTION', 'database'),
    
    'connections' => [
        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
        ],
    ],
];
```
>>>>>>> Stashed changes
