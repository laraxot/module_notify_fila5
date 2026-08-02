---
title: "PSR-4 nei test Notify"
type: concept
tags: [psr-4, composer, tests, fixtures]
created: 2026-07-16
updated: 2026-07-16
qmd: "notify psr-4 test doubles phpstan probes composer autoload"
issues:
  - ""
discussions:
  - ""
related:
  - "../../../../Xot/docs/wiki/concepts/psr4-one-class-one-file.md"
---

# PSR-4 nei test Notify

Ogni test double vive nel file omonimo sotto `tests/`; non mantenere anche un aggregatore `*TestDoubles.php`. Le probe PHPStan non appartengono ad `app/Phpstan`: testare i trait con fixture reali sotto `tests/` evita classi di produzione create solo per l'analizzatore.

Il controllo conclusivo è `composer dump-autoload -o`, seguito da PHPStan e dal test Pest owner.
