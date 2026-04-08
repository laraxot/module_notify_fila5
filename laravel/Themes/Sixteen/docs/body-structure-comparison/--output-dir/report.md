# HTML Body Structure Comparison: `--output-dir`

**Date**: 2026-04-08 13:18:18
**Reference**: https://italia.github.io/design-comuni-pagine-statiche/sito/segnalazioni-elenco.html
**Local**: http://127.0.0.1:8000/it/tests/segnalazioni-elenco

## 📊 Parity Score

**Overall Match**: **77.8%** (603/775 elements identical)

## Summary

| Metric | Value |
|--------|-------|
| Total elements (reference) | 775 |
| Total elements (local) | 707 |
| ✅ Identical elements | 603 |
| ⚠️ Different elements | 49 |
| ❌ Missing in local | 123 |
| ➕ Extra in local | 55 |
| Unique IDs (reference) | 49 |
| Unique IDs (local) | 47 |
| Unique classes (reference) | 267 |
| Unique classes (local) | 227 |

## 🆔 ID Comparison

- **Common IDs**: 34
- **Missing in local**: 15
  - ❌ `formGroupExampleInputWithHelp`
  - ❌ `formGroupExampleInputWithHelpDescription`
  - ❌ `modal-disservizio`
  - ❌ `modal2Title`
  - ❌ `radio-1`
  - ❌ `radio-10`
  - ❌ `radio-2`
  - ❌ `radio-3`
  - ❌ `radio-4`
  - ❌ `radio-5`
  - ❌ `radio-6`
  - ❌ `radio-7`
  - ❌ `radio-8`
  - ❌ `radio-9`
  - ❌ `rating-feedback`
- **Extra in local**: 13
  - ➕ `mobile-enviroment`
  - ➕ `mobile-green`
  - ➕ `mobile-maintenance`
  - ➕ `mobile-public-order`
  - ➕ `mobile-road`
  - ➕ `mobile-rodent-control`
  - ➕ `mobile-security`
  - ➕ `mobile-service`
  - ➕ `mobile-street-furniture`
  - ➕ `mobile-waste`
  - ➕ `mobile-water`
  - ➕ `modal-categories`
  - ➕ `modal-categories-label`

## 🎨 CSS Class Comparison

- **Common classes**: 225
- **Missing in local**: 42
  - (42 classes — see JSON for full list)
- **Extra in local**: 2
  - ➕ `.h4`
  - ➕ `.modal-dialog-scrollable`

## ⚠️ Elements with Differences

1. `<div>` at depth 8
   - classes missing in local: ['text-wrapper']
   - extra classes in local: ['card-footer', 'd-none', 'p-0']
2. `<div>` at depth 8
   - classes missing in local: ['button-wrapper']
   - extra classes in local: ['col-12', 'text-center']
3. `<button>` at depth 9
   - classes missing in local: ['btn-primary', 'mb-4', 'mb-lg-0', 'mt-2']
   - extra classes in local: ['btn-outline-primary', 'mt-10', 'mx-auto']
   - attrs differ: ref={'data-bs-toggle', 'class', 'type', 'data-bs-target'}, loc={'class', 'type'}
4. `<div>` at depth 7
   - classes missing in local: ['cmp-rating__card-second', 'd-none']
   - extra classes in local: ['bg-grey-card', 'shadow-contacts']
   - attrs differ: ref={'data-step', 'class'}, loc={'class'}
5. `<div>` at depth 8
   - classes missing in local: ['border-0', 'card-header', 'mb-0']
   - extra classes in local: ['container']
6. `<div>` at depth 7
   - classes missing in local: ['d-none', 'form-rating']
   - extra classes in local: ['d-flex', 'justify-content-center', 'p-contacts', 'row']
7. `<div>` at depth 8
   - classes missing in local: ['d-none']
   - extra classes in local: ['col-12', 'col-lg-5']
   - attrs differ: ref={'data-step', 'class'}, loc={'class'}
8. `<div>` at depth 9
   - classes missing in local: ['cmp-steps-rating']
   - extra classes in local: ['cmp-contacts']
9. `<span>` at depth 13
   - classes missing in local: ['d-block', 'text-wrap']
   - attrs differ: ref={'class', 'data-element'}, loc=set()
10. `<span>` at depth 13
   - classes missing in local: ['step']
   - attrs differ: ref={'class'}, loc=set()
11. `<div>` at depth 11
   - classes missing in local: ['cmp-steps-rating__body']
   - extra classes in local: ['it-example-modal']
12. `<div>` at depth 12
   - id: 'None' vs 'modal-categories'
   - classes missing in local: ['cmp-radio-list']
   - extra classes in local: ['fade', 'modal']
   - attrs differ: ref={'class'}, loc={'aria-hidden', 'tabindex', 'class', 'role', 'id', 'aria-labelledby'}
13. `<div>` at depth 13
   - classes missing in local: ['card', 'card-teaser', 'shadow-rating']
   - extra classes in local: ['modal-dialog', 'modal-dialog-scrollable']
14. `<div>` at depth 14
   - classes missing in local: ['card-body']
   - extra classes in local: ['modal-content']
15. `<div>` at depth 15
   - classes missing in local: ['form-check', 'm-0']
   - extra classes in local: ['modal-header']
16. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'border-light', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['modal-body']
17. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'border-light', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['categoy-list', 'pb-4']
18. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'border-light', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['form-check']
19. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['checkbox-body', 'py-1']
20. `<input>` at depth 17
   - id: 'radio-4' vs 'mobile-water'
   - attrs differ: ref={'id', 'type', 'name'}, loc={'value', 'type', 'id', 'name'}
21. `<label>` at depth 17
   - classes missing in local: ['active']
   - extra classes in local: ['category-list__list', 'mb-0', 'subtitle-small_semi-bold']
   - attrs differ: ref={'for', 'class', 'data-element'}, loc={'for', 'class'}
22. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['checkbox-body', 'py-1']
23. `<input>` at depth 17
   - id: 'radio-5' vs 'mobile-enviroment'
   - attrs differ: ref={'id', 'type', 'name'}, loc={'value', 'type', 'id', 'name'}
24. `<label>` at depth 17
   - classes missing in local: ['active']
   - extra classes in local: ['category-list__list', 'mb-0', 'subtitle-small_semi-bold']
   - attrs differ: ref={'for', 'class', 'data-element'}, loc={'for', 'class'}
25. `<div>` at depth 15
   - classes missing in local: ['m-0']
26. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['checkbox-body', 'py-1']
27. `<input>` at depth 17
   - id: 'radio-6' vs 'mobile-street-furniture'
   - attrs differ: ref={'id', 'type', 'name'}, loc={'value', 'type', 'id', 'name'}
28. `<label>` at depth 17
   - classes missing in local: ['active']
   - extra classes in local: ['category-list__list', 'mb-0', 'subtitle-small_semi-bold']
   - attrs differ: ref={'for', 'class', 'data-element'}, loc={'for', 'class'}
29. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'border-light', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['form-check']
30. `<div>` at depth 16
   - classes missing in local: ['border-bottom', 'cmp-radio-list__item', 'radio-body']
   - extra classes in local: ['checkbox-body', 'py-1']

... and 19 more (see JSON)

## ❌ Elements Missing in Local

1. `<a> class="d-none text-decoration-none"`
2. `<span> class="t-primary text-button-sm-semi"`
3. `<div> class="border-light single-line-info"`
4. `<div> class="text-paragraph-small"`
5. `<div> class="border-0 border-light"`
6. `<div> class="d-lg-flex gap-2 mt-3"`
7. `<div>`
8. `<img> class="img-fluid mb-3 mb-lg-0 w-100"`
9. `<div>`
10. `<img> class="img-fluid mb-3 mb-lg-0 w-100"`
11. `<div>`
12. `<img> class="img-fluid w-100"`
13. `<a> class="d-none text-decoration-none"`
14. `<span> class="t-primary text-button-sm-semi"`
15. `<div> class="border-light single-line-info"`
16. `<div> class="text-paragraph-small"`
17. `<div> class="border-0 border-light"`
18. `<div> class="d-lg-flex gap-2 mt-3"`
19. `<div>`
20. `<img> class="img-fluid mb-3 mb-lg-0 w-100"`
21. `<div>`
22. `<img> class="img-fluid mb-3 mb-lg-0 w-100"`
23. `<div>`
24. `<img> class="img-fluid w-100"`
25. `<a> class="d-none text-decoration-none"`
26. `<span> class="t-primary text-button-sm-semi"`
27. `<div> class="border-light single-line-info"`
28. `<div> class="text-paragraph-small"`
29. `<div> class="border-0 border-light"`
30. `<div> class="d-lg-flex gap-2 mt-3"`

... and 93 more

## ➕ Extra Elements in Local

1. `<div> class="card w-100"`
2. `<div> class="card-body"`
3. `<h2> class="title-medium-2-semi-bold"`
4. `<ul> class="contact-list p-0"`
5. `<li>`
6. `<a> class="list-item"`
7. `<svg> class="icon icon-primary icon-sm"`
8. `<use>`
9. `<span>`
10. `<li>`
11. `<a> class="list-item"`
12. `<svg> class="icon icon-primary icon-sm"`
13. `<use>`
14. `<span>`
15. `<li>`
16. `<a> class="list-item"`
17. `<svg> class="icon icon-primary icon-sm"`
18. `<use>`
19. `<span>`
20. `<li>`
21. `<a> class="list-item"`
22. `<svg> class="icon icon-primary icon-sm"`
23. `<use>`
24. `<h2> class="mb-3 title-medium-2-semi-bold"`
25. `<ul> class="contact-list p-0"`
26. `<li>`
27. `<a> class="list-item"`
28. `<svg> class="icon icon-primary icon-sm"`
29. `<use>`
30. `<h2> id="modal-categories-label" class="h4 modal-title"`

... and 25 more

## 📋 Tag Distribution

| Tag | Reference | Local | Diff |
|-----|-----------|-------|------|
| `<a>` | 89 | 87 | -2 |
| `<br>` | 9 | 9 | 0 |
| `<button>` | 20 | 16 | -4 |
| `<div>` | 261 | 224 | -37 |
| `<fieldset>` | 5 | 3 | -2 |
| `<footer>` | 1 | 1 | 0 |
| `<form>` | 1 | 1 | 0 |
| `<h1>` | 1 | 1 | 0 |
| `<h2>` | 8 | 7 | -1 |
| `<h3>` | 11 | 3 | -8 |
| `<h4>` | 6 | 6 | 0 |
| `<header>` | 1 | 1 | 0 |
| `<hr>` | 1 | 1 | 0 |
| `<image>` | 1 | 1 | 0 |
| `<img>` | 13 | 3 | -10 |
| `<input>` | 28 | 28 | 0 |
| `<label>` | 28 | 28 | 0 |
| `<legend>` | 5 | 2 | -3 |
| `<li>` | 88 | 100 | +12 |
| `<main>` | 1 | 1 | 0 |
| `<nav>` | 3 | 3 | 0 |
| `<ol>` | 1 | 1 | 0 |
| `<p>` | 17 | 12 | -5 |
| `<path>` | 10 | 10 | 0 |
| `<small>` | 1 | 0 | -1 |
| `<span>` | 66 | 57 | -9 |
| `<svg>` | 44 | 44 | 0 |
| `<ul>` | 17 | 19 | +2 |
| `<use>` | 38 | 38 | 0 |

---
*Generated by bashscripts/html/compare-html-body.py*