# Visione del Modulo Rating

Il modulo `Rating` ha l'obiettivo di fornire un'infrastruttura **agnostica e riusabile** per la gestione di criteri di valutazione e punteggi, indipendente dal dominio applicativo specifico.

## Obiettivi di business

- Definire un modello di **rating generico** applicabile a qualunque entità (utente, servizio, struttura, progetto, ecc.).
- Supportare scenari in cui **più moduli** consumano il sistema di rating senza duplicare logica o tabelle.
- Permettere la configurazione di **criteri di valutazione** flessibili (peso, scala, vincoli) mantenendo la semplicità d’uso.
- Abilitare reportistica e analisi sui punteggi senza introdurre logica di domain-specific nel modulo Rating.

## Obiettivi tecnici

- Esposizione di un `HasRatingsTrait` riusabile, con relazioni pivot tipizzate e documentate.
- Calcolo di punteggi aggregati (media, somma, pesata, ecc.) demandato ad **Actions dedicate**, non a controller o view.
- Allineamento completo con:
  - PHP 8.2+ e `declare(strict_types=1);`
  - Laravel 12 e pattern Eloquent moderni
  - Filament v5 per eventuali UI di amministrazione/configurazione.
- Integrazione naturale con il sistema di traduzioni modulare Laraxot (naming chiavi coerente e nessuna label hardcoded).

## Confini del modulo

- Il modulo **non** deve conoscere i dettagli di business dei moduli che usano il rating (es. Patient, Dental, ecc.).
- Il modulo espone:
  - Modelli e relazioni base
  - Actions per calcolo/aggiornamento dei punteggi
  - Eventuali widget/risorse Filament generiche
- I moduli consumer si occupano di:
  - Collegare le proprie entità alla infrastruttura di rating
  - Definire le esperienze utente (UI/UX, workflow)

