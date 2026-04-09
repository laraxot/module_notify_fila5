# Ticket Wizard Frontoffice

## Decisione
La pagina pubblica `tests.segnalazione-crea` e' l'entrypoint unificato del flusso utente.
Le pagine legacy restano disponibili:
- `segnalazione-01-privacy`
- `segnalazione-02-dati`
- `segnalazione-03-riepilogo`
- `segnalazione-04-conferma`

## Architettura
Il widget **NON** usa `Filament\Schemas\Components\Wizard` perche' richiede asset JavaScript
(`step`, `isFirstStep`, `isLastStep`, `filamentSchemaComponent`) non disponibili nel frontoffice.

Invece usa navigazione Livewire pura:
- Stato `$currentStep` (1-3) con validazione per-step
- Step 1: Privacy → checkbox obbligatoria
- Step 2: Dati → address, issue_type, title, details, email
- Step 3: Riepilogo → revisione + submit
- Submit al step 3 crea il `Ticket` e redirect a `/{locale}/tests/segnalazione-04-conferma`

## Regole stabili
- Le classi PHP/Filament usano `Ticket`, NON `Segnalazione`.
- Il widget corretto e' `Modules\Fixcity\Filament\Widgets\CreateTicketWizardWidget`.
- Estende `BaseWidget` con `InteractsWithForms` + `InteractsWithActions`.
- `segnalazione-crea` appare come `segnalazione-01-privacy` (step 1 iniziale).
- Gli step sono 3: `privacy`, `data`, `summary`.
- Il submit avviene allo step 3 (`summary`).
- `segnalazione-04-conferma` NON fa parte del wizard, e' pagina separata post-redirect.
- Le traduzioni usano namespace `fixcity::segnalazione.*`.
- Pattern traduzioni step: `fixcity::segnalazione.steps.<item>.label`.

## Widget duplicati rimossi
- `SegnalazioneCreateWidget.php` — rimosso (aveva 4 step, confirmation dentro wizard, sbagliato)
- `CreateTicketWidget.php` — mantenuto (approccio diverso con TicketResource, per backoffice)

## File coinvolti
- widget: `laravel/Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php`
- view widget: `laravel/Modules/Fixcity/resources/views/filament/widgets/ticket-create-wizard.blade.php`
- blocco tema: `laravel/Themes/Sixteen/resources/views/components/blocks/tests/segnalazione-crea.blade.php`
- json cms: `laravel/config/local/fixcity/database/content/pages/tests.segnalazione-crea.json`
- traduzioni: `laravel/Modules/Fixcity/lang/{locale}/segnalazione.php`

## Coordinamento multi-agent
Prima di cambiare il flusso controllare sempre se altri agenti hanno gia' introdotto:
- un widget `Ticket` concorrente
- modifiche ai JSON CMS della stessa pagina
- docs che fissano il numero di step o il naming delle classi

## See Also
- [Fixcity Module README](README.md)
- [Fixcity Components](components.md)
- [Sixteen Theme Docs](../../Themes/Sixteen/docs/)
