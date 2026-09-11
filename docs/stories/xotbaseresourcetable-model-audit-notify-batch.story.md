# Story: XotBaseResourceTable $model audit — Notify batch

**Fase BMAD**: Qualita del codice (contratto esplicito `$model` su `XotBaseResourceTable`) + verifica
schema + micro-miglioria UX tabelle. Nessuna modifica di logica applicativa, nessuna migrazione DB
eseguita.

**Contesto**: audit trasversale al monorepo per aggiungere `protected static string $model = X::class;` a
ogni classe `*Table extends XotBaseResourceTable` (oggi il contratto e' implicito), verificare le chiavi
di `getTableColumns()` contro lo schema DB reale, e applicare migliorie UX additive a basso rischio.
Batch assegnato: modulo `Notify`, 6 file.

## File in scope

- `app/Filament/Resources/ContactResource/Tables/ContactsTable.php`
- `app/Filament/Resources/MailTemplateResource/Tables/MailTemplatesTable.php`
- `app/Filament/Resources/NotificationLogResource/Tables/NotificationLogsTable.php`
- `app/Filament/Resources/NotificationResource/Tables/NotificationsTable.php`
- `app/Filament/Resources/NotificationTemplateResource/Tables/NotificationTemplatesTable.php`
- `app/Filament/Resources/NotifyThemeResource/Tables/NotifyThemesTable.php`

## Task 1 — `protected static string $model`

Gia' presente, all'inizio di questo batch, su 5 dei 6 file (probabile passaggio precedente dello stesso
audit, coerente col `git status` iniziale che mostrava questi 5 come "modified"). Verificato per ciascuno
contro la Resource sorella autorevole (stessa cartella, senza `/Tables/`):

| Table file | Model dichiarato | Resource sorella (autorevole) | Match |
|---|---|---|---|
| ContactResource/Tables/ContactsTable.php | `Modules\Notify\Models\Contact` | `app/Filament/Resources/ContactResource.php:12` | si |
| MailTemplateResource/Tables/MailTemplatesTable.php | `Modules\Notify\Models\MailTemplate` | `app/Filament/Resources/MailTemplateResource.php:12` | si |
| NotificationResource/Tables/NotificationsTable.php | `Modules\Notify\Models\Notification` | `app/Filament/Resources/NotificationResource.php:12` | si |
| NotificationTemplateResource/Tables/NotificationTemplatesTable.php | `Modules\Notify\Models\NotificationTemplate` | `app/Filament/Resources/NotificationTemplateResource.php:14` | si |
| NotifyThemeResource/Tables/NotifyThemesTable.php | `Modules\Notify\Models\NotifyTheme` | `app/Filament/Resources/NotifyThemeResource.php:12` | si |

Il sesto file, `NotificationLogResource/Tables/NotificationLogsTable.php`, **non aveva `$model`** e non ha
una Resource sorella live da cui copiare: `app/Filament/Resources/NotificationLogResource.php` **non
esiste** — esistono solo `app/Filament/Resources/NotificationLogResource.test` e
`notificationlogresource.test` (estensione `.test`, non `.php`: file orfani/mai rinominati, non caricati
dall'autoloader). Autorevolezza del model stabilita in altro modo: il model
`Modules\Notify\Models\NotificationLog` esiste (`app/Models/NotificationLog.php`), la sua tabella
`notification_logs` combacia esattamente con tutte le chiavi (non-relazione) di `getTableColumns()`
(vedi Task 2), e la bozza `.test` orfana dichiara comunque
`protected static ?string $model = NotificationLog::class;`, confermando indipendentemente la stessa
conclusione. Aggiunto:

```php
/**
 * @var class-string<NotificationLog>
 */
protected static string $model = NotificationLog::class;
```

## Task 2 — verifica `getTableColumns()` contro schema reale

Verifica con `php artisan tinker` (sola lettura:
`Schema::connection($model->getConnectionName())->getColumnListing($model->getTable())`). Connessioni
usate dai model Notify: `notify` per Contact/MailTemplate/NotificationLog/NotificationTemplate/NotifyTheme
(database fisico `quaeris_data`), `xot` per `Notification`.

### Contact — tabella `contacts`, connessione `notify`

Colonne reali: `id, email, mobile_phone, created_at, updated_at, created_by, updated_by, survey_pdf_id,
attribute_1..14, token, first_name, last_name, sms_sent_at, sms_count, mail_sent_at, mail_count,
language, usesleft, sms_status_code, sms_status_txt, duplicate_count, order_column, survey_id,
deleted_at, deleted_by`.

- `id`, `first_name`, `last_name`, `created_at`, `updated_at` — presenti. OK.
- `contact_type`, `value`, `user_id`, `verified_at` — **non presenti** nello schema live di questo
  ambiente. **Non rimosse dal codice.** Verifica con `git log -S<colonna> -- app/Models/Contact.php
  app/Filament/Resources/ContactResource/Tables/ContactsTable.php`: tutte e 4 risalgono al commit
  iniziale (`79ae2e73 first`), quindi non sono un rename recente. Causa identificata: le migration
  `database/migrations/2022_10_12_133535_create_notify_contacts_table.php` e
  `2026_06_11_180000_create_notify_contacts_table.php` **definiscono esplicitamente** queste 4 colonne
  dentro `tableCreate()` (`$table->string('contact_type')`, `$table->string('value')`,
  `$table->integer('user_id')`, `$table->timestamp('verified_at')`), pattern `XotBaseMigration` in cui
  `tableCreate()` e' no-op se la tabella esiste gia'. Il DB locale `quaeris_data` ha evidentemente una
  tabella `contacts` pre-esistente (schema stile "survey participants": `email`, `mobile_phone`,
  `survey_pdf_id`, `language`, `survey_id`, nessuna colonna `model_type`/`model_id` polimorfica) mai
  passata dalla `tableCreate()` di queste migration, quindi le 4 colonne non sono mai state aggiunte in
  questo ambiente. E' un disallineamento migration/ambiente locale, non un errore nel codice della Table
  o un campo mai esistito: **nessuna azione sul codice**, segnalazione per chi gestisce l'ambiente/i seed
  di `quaeris_data`. Nessun comando di migrazione eseguito.

### MailTemplate — tabella `mail_templates`, connessione `notify`

Colonne reali: `id, name, mailable, slug, subject, html_template, text_template, version, params,
sms_template, counter, html_layout_path, created_at, updated_at, updated_by, created_by, deleted_at,
deleted_by`.

- `id`, `name`, `mailable`, `slug`, `counter`, `version`, `created_at`, `updated_at` — tutte presenti.
  **OK, nessuna colonna sospetta.**

### NotificationLog — tabella `notification_logs`, connessione `notify`

Colonne reali: `id, template_id, notifiable_type, notifiable_id, channel, status, status_message, data,
metadata, tenant_id, sent_at, delivered_at, failed_at, opened_at, clicked_at, created_at, updated_at,
updated_by, created_by`.

- `channel`, `status`, `notifiable_type`, `notifiable_id`, `status_message`, `sent_at`, `created_at` —
  tutte presenti. **OK, nessuna colonna sospetta.**

### Notification — tabella `notifications`, connessione `xot`

Colonne reali: `id, type, notifiable_type, notifiable_id, data, read_at, created_at, created_by,
updated_at, updated_by`.

- `type`, `notifiable_type`, `notifiable_id`, `read_at`, `created_at`, `id` — tutte presenti. **OK,
  nessuna colonna sospetta.**

### NotificationTemplate — tabella `notification_templates`, connessione `notify`

Colonne reali: `id, name, code, description, subject, body_html, body_text, channels, variables,
conditions, preview_data, metadata, category, is_active, version, tenant_id, grapesjs_data, type,
created_at, updated_at, deleted_at, updated_by, created_by, deleted_by`.

- `id`, `name`, `code`, `type`, `category`, `is_active`, `version`, `created_at`, `updated_at` — tutte
  presenti. **OK, nessuna colonna sospetta.**

### NotifyTheme — tabella `notify_themes`, connessione `notify`

Colonne reali: `id, lang, type, subject, body, created_at, created_by, updated_at, updated_by, post_type,
post_id, from, body_html, theme, from_email, logo_src, logo_width, logo_height, view_params`.

- `id`, `lang`, `type`, `subject`, `theme`, `from_email`, `created_at`, `updated_at` — tutte presenti.
  **OK, nessuna colonna sospetta.**

## Task 3 — migliorie UX additive applicate

Criterio: solo dove il tipo di colonna lo giustifica chiaramente e il rischio e' minimo; nessuna colonna
rimossa; nessuna nuova classe Column condivisa creata (riuso di `PersonColumn` non applicabile qui,
nessuna Table di questo batch aggrega piu' campi anagrafici in una singola cella).

- `ContactResource/Tables/ContactsTable.php`:
  - `contact_type`: aggiunto `->searchable()` (mancava, testo semplice, pattern gia' usato su
    `first_name`/`last_name`/`value` nello stesso file).
- `MailTemplateResource/Tables/MailTemplatesTable.php`:
  - `slug`: rimossa la chiamata duplicata `->searchable()` (era
    `->searchable()->sortable()->copyable()->searchable()`, stesso modificatore invocato due volte —
    correzione a rischio zero, nessun cambio di comportamento).
- `NotificationLogResource/Tables/NotificationLogsTable.php`:
  - `status_message`: aggiunto `->searchable()` (mancava, campo diagnostico testuale con contenuto reale,
    coerente con `channel`/`status`/`notifiable_type` gia' searchable nello stesso file).
- `NotificationResource/Tables/NotificationsTable.php`:
  - `type`: aggiunto `->badge()` (i valori sono gia' vincolati a un set fisso — vedi `SelectFilter::make
    ('type')->options(['info', 'success', 'warning', 'error'])` nello stesso file — un badge rende lo
    stato piu' leggibile a colpo d'occhio rispetto al solo testo).
- `NotificationTemplateResource/Tables/NotificationTemplatesTable.php`:
  - `type`: aggiunto `->searchable()->badge()`. Verificato che `NotificationTemplate::casts()` proietta
    `type` su `Modules\Notify\Enums\NotificationTypeEnum` (`app/Enums/NotificationTypeEnum.php`), enum
    che implementa `HasColor`, `HasIcon`, `HasLabel` (`EnumTrait`) — esattamente il caso descritto dalle
    istruzioni ("formattazione piu' leggibile ... `->badge()` dove il tipo lo giustifica, verificato dal
    cast reale").
  - `category`: aggiunto `->searchable()` (stringa libera, nessun cast enum trovato per `category`, non
    aggiunto badge per non supporre semantica non verificata).
- `NotifyThemeResource/Tables/NotifyThemesTable.php`:
  - `subject`: aggiunto `->sortable()` (mancava, era solo `searchable()->wrap()`).
  - `theme`: aggiunto `->searchable()` (mancava, era solo `sortable()`).
  - `from_email`: aggiunto `->sortable()` (mancava, era solo `searchable()`; email e' un campo
    schema.org `email`, ordinamento alfabetico utile in lista).

Non toccati oltre a quanto sopra: `id`/`created_at`/`updated_at`/`is_active`/`version`/`counter` in tutti
i file — gia' con `sortable()`/`dateTime()`/boolean icon appropriati, nessun gap individuato senza
supporre semantica non verificata.

## Segnalazione aggiuntiva (non file da modificare, per trasparenza)

`NotificationLogResource/Tables/NotificationLogsTable.php` risulta oggi **dead code a livello di
routing Filament**: `XotBaseResource::getTableClass()` costruisce il nome della classe Table come
`static::class . '\Tables\\' . $name . 'Table'` a partire dalla Resource concreta. Non esistendo una
classe PHP reale `Modules\Notify\Filament\Resources\NotificationLogResource` (solo i file `.test` orfani
sopra citati), nessuna Resource live chiama `getTableClass()` per risolvere `NotificationLogsTable`.
Verificato con:

```
grep -rn "NotificationLogResource" --include="*.php" app/
```

che restituisce solo riferimenti interni al namespace di `NotificationLogsTable.php`/
`NotificationLogForm.php`/`NotificationLogInfolist.php` stessi (nessun `use` esterno, nessuna
registrazione). Non cancellato ne' rinominato in questo turno, come da vincolo del task (item 7):
segnalato qui per chi decide se completare la Resource (rinominando i `.test` in `.php` e correggendoli
per Filament 5) o rimuovere il ramo.

## Verifica

- `php -l` su tutti e 6 i file: OK, nessun errore di sintassi.
- `vendor/bin/phpstan analyse` sui 6 file del batch (dalla dir `laravel`): **`[OK] No errors`**.
- Lock/unlock (`bashscripts/lock/{lock,unlock}.sh`) presi e rilasciati su tutti e 6 i file prima/dopo le
  modifiche, nessun conflitto con altri batch.

## Dev Agent Record

### Completion Notes List

- 2026-09-11: audit Task 1 (5/6 gia' presenti e verificati corretti contro la Resource sorella; aggiunto
  il 6° con model risolto da model+migration, in assenza di Resource sorella live), Task 2 (verificato via
  tinker con connessione esplicita per model, 4 colonne sospette documentate su `Contact`/`contacts` con
  causa identificata — disallineamento migration/ambiente, non rimosse), Task 3 (9 edit additive/1
  correzione duplicato in 6 file), segnalata dead code su `NotificationLogsTable`, PHPStan pulito.

### File List

- `app/Filament/Resources/ContactResource/Tables/ContactsTable.php` (`$model` gia' presente +
  `contact_type` searchable)
- `app/Filament/Resources/MailTemplateResource/Tables/MailTemplatesTable.php` (`$model` gia' presente +
  rimossa `->searchable()` duplicata su `slug`)
- `app/Filament/Resources/NotificationLogResource/Tables/NotificationLogsTable.php` (`$model` aggiunto +
  `status_message` searchable)
- `app/Filament/Resources/NotificationResource/Tables/NotificationsTable.php` (`$model` gia' presente +
  `type` badge)
- `app/Filament/Resources/NotificationTemplateResource/Tables/NotificationTemplatesTable.php` (`$model`
  gia' presente + `type` searchable/badge + `category` searchable)
- `app/Filament/Resources/NotifyThemeResource/Tables/NotifyThemesTable.php` (`$model` gia' presente +
  `subject` sortable + `theme` searchable + `from_email` sortable)

## Perche' niente `github_issue`/`epic`/`story_id`

Batch di audit meccanico trasversale a piu' moduli, assegnato direttamente (non tramite epic/PRD di
prodotto in `docs/planning-artifacts/epics.md`, che copre solo Epic 1-3 Quaeris). Coerente con la stessa
convenzione gia' adottata dal batch gemello `Gdpr`
(`Modules/Gdpr/docs/stories/xotbaseresourcetable-model-audit-gdpr-batch.story.md`). Accesso GitHub MCP
non disponibile in questa sessione (`gh`/MCP github: errore di autenticazione), quindi nessuna
issue/discussion GitHub aperta o commentata per questo turno; da fare in un passaggio successivo se si
decide di tracciare questo batch anche su GitHub.
