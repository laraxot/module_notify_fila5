# Ponytail-audit 2026-07-02: Notify module findings

Source: repo-wide ponytail-audit, published as GitHub issues [#103](https://github.com/laraxot/base_quaeris_fila5/issues/103) and [#112](https://github.com/laraxot/base_quaeris_fila5/issues/112), summarized in discussion [#114](https://github.com/laraxot/base_quaeris_fila5/discussions/114).

## Finding

`Modules/Notify/app/Services/NotificationManager.php` is a thin wrapper that delegates almost every call to `SendNotificationAction`, and its `send()` method throws a generic `Exception` with a string message instead of using Laravel conventions (`firstOrFail`) or a typed domain exception.

## Why this is not just a style nit

Discussion [#82](https://github.com/laraxot/base_quaeris_fila5/discussions/82) / [#83](https://github.com/laraxot/base_quaeris_fila5/discussions/83) established a repository-wide architecture rule: **business logic must live in `QueueableAction` classes (`spatie/laravel-queueable-action`), never in Service classes.** `Modules/Xot/app/Services/` and `Modules/Job/app/Services/` are the only allowed exception (framework wrappers, not business logic).

`NotificationManager` is exactly the forbidden pattern this rule targets: a Service class sitting in front of an Action. Removing it is not just a YAGNI cleanup, it is compliance with an already-ratified architecture decision.

## Fix direction

1. Delete `NotificationManager`; call `app(SendNotificationAction::class)->execute(...)` directly at call sites (or `->onQueue()->execute(...)` for async).
2. Inside `SendNotificationAction`, replace the manual template lookup + generic `Exception` with `NotificationTemplate::where('code', $templateCode)->firstOrFail()` and a typed domain exception (e.g. `NotificationTemplateNotFoundException`).
3. Follow the pattern documented in `.claude/skills/create-action/SKILL.md` and `.claude/docs/spatie-queueable-action.md`.

## Related

- Discussion #82/#83: Actions over Services architecture decision (canonical rule).
- Issue #103: NotificationManager wrapper removal (yagni).
- Issue #112: firstOrFail + domain exception (stdlib).
- Known doc-sprawl debt in this module (discussion #22) is out of scope here; `Modules/Notify/docs/` still has duplicate `README.md`/`index.md`/`INDEX.md`/`00-index.md` entrypoints pending consolidation.
