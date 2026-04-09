# Ticket Wizard Frontoffice

## Decisione
La pagina pubblica `tests.segnalazione-crea` è l'entrypoint unificato del flusso utente per la creazione di segnalazioni (Ticket).
Le pagine statiche legacy restano disponibili per riferimento o test di parità HTML:
- `segnalazione-01-privacy`
- `segnalazione-02-dati`
- `segnalazione-03-riepilogo`
- `segnalazione-04-conferma`

## Architettura
Il widget segue i principi Laraxot ed estende `XotBaseWidget`.

**Nota tecnica**: Nonostante la disponibilità di asset Filament in alcune pagine frontoffice, il widget **NON** usa `Filament\Schemas\Components\Wizard` standard per garantire la massima fedeltà al design system "Design Comuni Italia" (Bootstrap Italia replicated via Tailwind).

### Caratteristiche principali:
- **Base Class**: `Modules\Fixcity\Filament\Widgets\CreateTicketWizardWidget`
- **Estensione**: `Modules\Xot\Filament\Widgets\XotBaseWidget`
- **Navigazione**: Stato Livewire puro (`$currentStep`) gestito manualmente nella vista.
- **Validazione**: Per-step tramite metodi `nextStep()` e `submit()`.
- **Naming**: Usa sempre `Ticket` invece di `Segnalazione` nel codice PHP.

### Step del Wizard (3):
1. **Privacy** (`$currentStep === 1`): Accettazione informativa obbligatoria (`$privacyAccepted`).
2. **Dati** (`$currentStep === 2`): Raccolta di indirizzo, tipo disservizio, titolo, dettagli, email, immagini (opzionali), autore (se non autenticato: `$userName`, `$userFiscalCode`, `$userPhone`).
3. **Riepilogo + Submit** (`$currentStep === 3`): Revisione finale dei dati e pulsante di invio.

**Conferma**: Il redirect post-invio punta alla pagina `/{locale}/tests/segnalazione-04-conferma`, che è **esterna al wizard** (pagina separata di esito).

### Proprietà Livewire del widget:
```php
// Navigazione
public int $currentStep = 1;
public array $blockData = [];
// Step 1
public bool $privacyAccepted = false;
// Step 2 - Segnalazione
public string $address = '';
public string $issueType = '';
public string $title = '';
public string $details = '';
public string $email = '';
public array $images = [];   // percorsi immagini
// Step 2 - Autore (guest)
public string $userName = '';
public string $userFiscalCode = '';
public string $userPhone = '';
```

### Metodi chiave:
- `nextStep()`: valida step corrente e avanza (max 3)
- `prevStep()`: torna allo step precedente (min 1)
- `submit()`: valida tutto, crea Ticket, dispatch `TicketCreatedEvent`, redirect a conferma
- `removeImage(int $index)`: rimuove immagine dall'array
- `getIssueTypeOptions()`: tipi disservizio da `$blockData['issue_types']` o da traduzioni

### Classe naming convention:
- **CORRETTO**: `CreateTicketWizardWidget` (Ticket, non Segnalazione)
- **SBAGLIATO**: ~~`CreateSegnalazioneWizardWidget`~~

## Traduzioni
Segue il pattern richiesto: `fixcity::segnalazione.steps.<item>.<tipo>`.
Esempio: `fixcity::segnalazione.steps.privacy.label`.

Il file principale è `laravel/Modules/Fixcity/lang/{locale}/segnalazione.php`.

## File coinvolti
- **Widget**: `laravel/Modules/Fixcity/app/Filament/Widgets/CreateTicketWizardWidget.php`
- **View Widget**: `laravel/Modules/Fixcity/resources/views/filament/widgets/ticket-create-wizard.blade.php`
- **Blocco Tema**: `laravel/Themes/Sixteen/resources/views/components/blocks/tests/segnalazione-crea.blade.php`
- **CMS JSON**: `laravel/config/local/fixcity/database/content/pages/tests.segnalazione-crea.json`

## See Also
- [Fixcity Module README](README.md)
- [Laraxot Core Architecture](../../Xot/docs/architecture.md)
- [Sixteen Theme Design Comuni](../../../Themes/Sixteen/docs/design-comuni/README.md)
