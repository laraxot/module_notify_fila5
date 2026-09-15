---
title: "Composer root minimale — modulo Notify"
type: concept
tags: [composer, notify, nwidart, merge-plugin]
created: 2026-06-29
updated: 2026-06-29
qmd: "Notify composer dependencies root minimal nwidart merge-plugin"
issues:
  - "https://github.com/laraxot/<repo progetto>/issues/214"
discussions:
  - "https://github.com/laraxot/<repo progetto>/discussions/215"
related:
  - ../../../Xot/docs/wiki/concepts/composer-root-skeleton-modular.md
  - ../../../../../../docs/wiki/concepts/composer-root-minimal-nwidart.md
  - ../../composer.json
---

# Notify e composer root minimale

## Regola

Dipendenze del dominio **Notify** in `Modules/Notify/composer.json`. Il root `laravel/composer.json` resta skeleton come [<repo progetto>](https://github.com/laraxot/<repo progetto>/blob/dev/laravel/composer.json).
Dipendenze del dominio **Notify** in `Modules/Notify/composer.json`. Il root `laravel/composer.json` resta skeleton come [<repo progetto>](https://github.com/laraxot/platform/blob/dev/laravel/composer.json).




## Merge root — solo moduli

`laravel/composer.json` → merge **solo** `Modules/*/composer.json`. **Vietato** `Themes/*/composer.json` (nwidart owner = modulo; tema = vestito Blade/assets).

Perché: [composer-merge-plugin-modules-only](../../../Xot/docs/wiki/concepts/composer-merge-plugin-modules-only.md).

## Riferimento

[Composer root minimale nwidart](../../../../../../docs/wiki/concepts/composer-root-minimal-nwidart.md)
