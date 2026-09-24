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

## Nota tecnica: `Safe\preg_replace_callback` non esiste

`Modules\Notify\Traits\HasNotificationTracking` importava `use function
Safe\preg_replace_callback;`, ma `thecodingmachine/safe` non genera un
wrapper per questa funzione (non è nella lista `pcre.php` del pacchetto —
solo `preg_match`, `preg_match_all`, `preg_grep`, `preg_split`). L'import era
morto (PHPStan `function.notFound`) e avrebbe fatto fatal error a runtime se
il trait fosse mai stato usato fuori dai test. Fix: `preg_replace_callback`
globale, che già ritorna `null` in caso di errore — gestito con
`is_string($result) ? $result : $html`.
