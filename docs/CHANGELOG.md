# Changelog - Modulo Notify

Tutte le modifiche significative al modulo Notify saranno documentate in questo file.

## [2026-09-17] - Docs cleanup pass (E-DOCS-20.Notify)

### Removed
- Dedup di massa in `docs/`: ~4788 file iniziali, oltre 1600 duplicati esatti
  (stesso md5, sparsi tra varianti maiuscole/minuscole, `.bak`/`.old`/`.txt` e
  sottoalberi di archivio) rimossi con `rm` diretto, un solo canonico per gruppo.
- Ulteriori ~270 varianti quasi-identiche a livello root (stesso contenuto,
  solo case/underscore/hyphen diverso, es. `AGENTS.md`/`agents.md`,
  `architecture-analysis.md`/`ARCHITECTURE_ANALYSIS.md`) consolidate in
  un'unica forma canonica lowercase-hyphenated (eccetto i file convenzionali
  `README.md`, `CHANGELOG.md`, `AGENTS.md`, `CONTRIBUTING.md`, `CLAUDE.md`
  tenuti in maiuscolo).
- `changelog.md` e `CHANGELOG.MD`: contenuto duplicato di questo file
  (probabile collisione da filesystem case-insensitive), rimossi.

### Fixed
- Questo file conteneva il proprio changelog duplicato due volte (merge non
  risolto tra `CHANGELOG.md` e `changelog.md`, con un placeholder `[[DATE]]`
  non sostituito); ripulito mantenendo una sola voce.

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
