# Piano di Pulizia e Standardizzazione delle Traduzioni

Questo documento descrive il piano di pulizia e standardizzazione delle traduzioni italiane nel modulo Notify.

> Nota (verificato 2026-09-17): il testo originale faceva riferimento al path
> `/var/www/html/Quaeris/laravel/Modules/Notify/lang/it`, che appartiene a un altro progetto
> Laraxot (Quaeris), non a questo monorepo. Il path corretto qui e' `laravel/Modules/Notify/lang/it/`.
> I nomi file "errati" elencati sotto (`send_s_m_s.php` ecc.) non esistono piu' in questo modulo;
> restano pero' doppioni non risolti come `send_whats_app.php` accanto a `send_whatsapp.php` e
> `send_netfun_sms.php` accanto a `send_netfun_sms_corrected.php` — vedi finding dedicato.

## Analisi della Situazione Attuale

Dall'analisi dei file di traduzione nella cartella `lang/it/`, sono stati identificati i seguenti problemi (alcuni gia' risolti, vedi nota sopra):

### 1. File con Nomi Errati
- `send_s_m_s.php` invece di `send_sms.php`
- `send_a_w_s_email.php` invece di `send_aws_email.php`
- `send_whats_app.php` invece di `send_whatsapp.php`
- `send_netfun_s_m_s.php` invece di `send_netfun_sms.php`

### 2. File Duplicati
- Esistono sia `send_s_m_s.php` che `send_sms.php`
- Esistono sia `send_a_w_s_email.php` che `send_aws_email.php`
- Esistono sia `send_netfun_s_m_s.php` che `send_netfun_sms.php`

### 3. File Senza Nome
- `.php` (file senza nome)

### 4. Struttura Non Standardizzata
- Alcuni file utilizzano array piatti
- Altri utilizzano strutture nidificate
- Manca la dichiarazione `declare(strict_types=1);` in molti file

### 5. Directory Non Necessarie
- `backup`, `corrected`, `temp` (directory temporanee)

## Piano di Azione

### Fase 1: Backup dei File Esistenti
- Creare un backup completo di tutti i file di traduzione prima di procedere con le modifiche

### Fase 2: Rimozione dei File Errati e Duplicati
- Rimuovere i file con nomi errati dopo aver verificato che il contenuto sia stato migrato nei file con nomi corretti
- Rimuovere il file senza nome `.php`

### Fase 3: Standardizzazione della Struttura dei File
- Aggiungere `declare(strict_types=1);` a tutti i file
- Convertire tutti gli array piatti in strutture nidificate
- Assicurarsi che tutti i file seguano lo stesso formato

### Fase 4: Pulizia delle Directory Temporanee
- Rimuovere le directory temporanee `backup`, `corrected` e `temp` dopo aver verificato che non contengano informazioni importanti

### Fase 5: Verifica della Coerenza con i File Inglesi
- Assicurarsi che per ogni file italiano esista un corrispondente file inglese
- Verificare che le chiavi di traduzione siano coerenti tra le versioni italiana e inglese

## Struttura Standard per i File di Traduzione

```php
<?php

declare(strict_types=1);

return [
    'resource' => [
        'name' => 'Nome Risorsa',
        'plural' => 'Nome Risorsa (plurale)',
    ],
    'navigation' => [
        'name' => 'Nome nel Menu',
        'plural' => 'Nome Plurale',
        'group' => [
            'name' => 'Nome Gruppo',
            'description' => 'Descrizione del gruppo',
        ],
        'label' => 'Etichetta Menu',
        'icon' => 'icona-risorsa',
        'sort' => 50,
    ],
    'fields' => [
        'field_name' => [
            'label' => 'Etichetta Campo',
            'placeholder' => 'Placeholder Campo',
            'helper_text' => 'Testo di aiuto',
        ],
        // Altri campi...
    ],
    'actions' => [
        'send' => 'Invia',
        'cancel' => 'Annulla',
        // Altre azioni...
    ],
    'messages' => [
        'success' => 'Operazione completata con successo',
        'error' => 'Si è verificato un errore',
        // Altri messaggi...
    ],
];
```

## Implementazione

L'implementazione di questo piano garantirà che le traduzioni nel modulo Notify seguano gli standard definiti, migliorando la manutenibilità e la coerenza del codice.
