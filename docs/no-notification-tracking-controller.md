# Notify: no NotificationTrackingController

## Regola

`Modules/Notify/app/Http/Controllers/NotificationTrackingController.php` non deve stare nel modulo.

## Perche'

- mescola transport HTTP, tracking, mutazione stato e redirect in un punto unico;
- sposta nel boundary web una responsabilita' che deve restare nel dominio `Notify`;
- rende il tracking meno riusabile, meno testabile e piu' facile da duplicare nei temi.

## Approccio corretto

- action dedicate per open/click tracking;
- route sottili, se davvero necessarie, che delegano subito al dominio;
- niente controller monolitici o orfani per tracking notifiche;
- nessuna logica di tracking nel tema.

## Nota di governance

La sua ricomparsa va trattata come regressione architetturale, non come semplice refactor incompleto.

## Stato attuale (verificato 2026-09-17)

`Modules/Notify/app/Http/Controllers/NotificationTrackingController.php` esiste ancora nel
codebase. Non e' stato toccato in questa sessione (solo documentazione), ma la regola sopra
e' attualmente violata: serve una review dedicata per decidere se rimuoverlo/rifattorizzarlo
o aggiornare questa regola se il controller e' stato reintrodotto per un motivo valido.
