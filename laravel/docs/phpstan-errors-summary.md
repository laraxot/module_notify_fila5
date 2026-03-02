## PHPStan Errors Summary - Modules (Level 10, JSON Report)

Fonte: `./vendor/bin/phpstan analyse Modules --level=10 --memory-limit=2G --error-format=json > /tmp/phpstan-errors.json`  
Totale file con errori: **135** (vedi JSON per dettaglio completo).

### Blog
- `Blog/app/Models/Transaction.php`
  - Factory PHPDoc punta a classe inesistente `Modules\Blog\Database\Factories\TransactionFactory`.
- `Blog/app/View/Composers/ThemeComposer.php`
  - Uso del componente `Render\Blocks` senza parametro `view` e con `blocks` potenzialmente `null`.

### Cms
- `Cms/app/Http/Middleware/PageSlugMiddleware.php`
  - Manca `Page::getMiddlewareBySlug()` e tipo di `$middlewares` non coerente con `executeMiddlewareChain()`.
- `Cms/app/View/Components/Page.php` / `Section.php`
  - Manca `Page::getBlocksBySlug()` / `Section::getBlocksBySlug()` e il tipo di `$blocks` non è allineato (`BlockData` array vs mixed/DataCollection).
- `Cms/resources/views/Composers/ThemeComposer.php`
  - `getMenu()` ritorna `array<mixed,mixed>` invece di `array<string,mixed>`.
  - Più chiamate a `Render\Blocks` senza `view` esplicita e con parametri extra (`tpl`).

### Fixcity
- `Actions/ChangeStatus.php`, `GenerateTicketsAction.php`
  - Metodi dominio mancanti su `Ticket` (`setStatus()`, `comments()`, `activities()`) e uso di `mixed` dentro closure factory.
- `Filament/Widgets/CreateTicketWidget.php`
  - Firma `schema()` / `components()` non allineata alle API Filament v5.
- `Livewire/TicketList.php`, `View/Components/Blocks/TicketList*.php`
  - Builder custom `Modules\Fixcity\Models\Builder` inesistente, proprietà non tipizzate, accesso a offset su `mixed`.
- `Models/Ticket.php`, `TicketActivity.php`
  - `belongsTo()` / `belongsToMany()` con `$related` `mixed`, return type `ticket()` non tipizzato.
- Factory/Seeder
  - `ReportFactory`, `TicketFactory`, `ReportContentSeeder`, `TicketDatabaseSeeder` con modelli mancanti e accesso a offset su `mixed`.

### Geo
- `Filament/Resources/AddressResource.php`
  - Mancano i metodi statici `Region::getOptions()`, `Province::getOptions()`, `Locality::getOptions()/getPostalCodeOptions()`.
- `Models/Address.php`
  - Uso di `Collection<Comune>::map()` con callback/return type non risolvibili.

### Tenant / Cms / Xot – Sushi Traits
- `Tenant/app/Models/Traits/SushiToJson.php`
  - Per `Comune`, `TestSushiModel`, `InformationSchemaTable`: metodi `getJsonFile()/loadExistingData()/saveToJson()/authId()/findRowIndexById()` mancanti quando il trait è usato fuori dal modello che li implementa.
  - Problemi ricorrenti su `foreach nonIterable`, accesso a offset su `mixed`, `array_values()` su `mixed`.
- `Tenant/app/Models/Traits/SushiToJsons.php`
  - Per modelli Cms (`Attachment`, `Menu`, `Page`, `PageContent`, `Section`): `getJsonFile()` non presente sul modello.
- `Xot/Models/InformationSchemaTable.php` + `ModelClass\CountAction/UpdateCountAction`
  - `InformationSchemaTable::getModelCount()/updateModelCount()` mancanti nella nostra codebase (presenti in `base_laravelpizza`).

### Notify
- `FirebaseAndroidNotification.php`
  - Interfaccia `Modules\Notify\Contracts\MobilePushNotification` mancante.
  - `NotificationChannels\Fcm\FcmChannel` mancante a livello di dipendenza.
  - Metodi con `#[\Override]` che non overrideano nulla.

### Rating / Blog integrazione
- `Rating/app/Models/Traits/HasRating.php` (context `Blog\Models\Article`)
  - Tipo di ritorno di `ratings()` non allineato con i template `MorphToMany` (problema di covarianza del `TDeclaringModel`).

---

Per il dettaglio completo (file per file, messaggio per messaggio) usare direttamente `phpstan-errors.json` in `/tmp`.  
Per ogni modulo, seguire il workflow definito in `phpstan_module.txt` e documentare i fix nelle rispettive `docs/phpstan-*.md`.

