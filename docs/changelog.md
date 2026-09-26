# Changelog - Modulo Notify

Tutte le modifiche significative al modulo Notify saranno documentate in questo file.

<<<<<<< .merge_file_1mgftE
<<<<<<< .merge_file_KtJA7Y
=======
=======
>>>>>>> .merge_file_iVHMgH
## [2025-06-04] - Fix PSR-4 Autoloading

### Fixed
- **SendScheduledPushNotification.php**: Corretto import con namespace errato
  - Prima: `use Modules\Notify\App\Services\PushNotificationService;`
  - Dopo: `use Modules\Notify\Services\PushNotificationService;`
  - Dettagli: [psr4-namespace-fix.md](./psr4-namespace-fix.md)

### Documentation
- Aggiunta guida PSR-4 compliance per il modulo
- Regola Laraxot: MAI usare `\App\` nei namespace moduli

---

## Convenzioni

- Namespace modulo: `Modules\Notify\{Subdirectory}`
- NO: `Modules\Notify\App\{Subdirectory}`
- Cartella `app/` è organizzativa, non parte del namespace
- Cartella `app/` è organizzativa, non parte del namespace

---

<!-- Merged from changelog.md, which collided with this file on case-insensitive filesystems. -->

# Changelog - Modulo Notify

Tutte le modifiche significative al modulo Notify saranno documentate in questo file.

<<<<<<< .merge_file_1mgftE
>>>>>>> .merge_file_W8hnm2
=======
>>>>>>> .merge_file_iVHMgH
## [[DATE]] - Fix PSR-4 Autoloading

### Fixed
- **SendScheduledPushNotification.php**: Corretto import con namespace errato
  - Prima: `use Modules\Notify\App\Services\PushNotificationService;`
  - Dopo: `use Modules\Notify\Services\PushNotificationService;`
  - Dettagli: [psr4-namespace-fix.md](./psr4-namespace-fix.md)

### Documentation
- Aggiunta guida PSR-4 compliance per il modulo
- Regola Laraxot: MAI usare `\App\` nei namespace moduli

---

## Convenzioni

- Namespace modulo: `Modules\Notify\{Subdirectory}`
- NO: `Modules\Notify\App\{Subdirectory}`
- Cartella `app/` è organizzativa, non parte del namespace
