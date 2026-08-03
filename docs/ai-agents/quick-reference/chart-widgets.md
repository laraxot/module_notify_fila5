# Quick Reference - Chart Widgets

## Errori comuni

- `Cannot read properties of null (reading 'x')` su doughnut/pie
  - Causa probabile: plugin datalabels/runtime callback su meta/data non disponibili.
  - Azione: validare dataset/options nel widget e disabilitare datalabels dove necessario per radial.

## File chiave

<<<<<<< HEAD
- `laravel/Modules/App/app/Filament/Widgets/QuestionChartAnswersChartWidget.php`
- `laravel/Modules/App/app/Filament/Widgets/QuestionChartAnswersTripleChartWidget.php`
=======
- `laravel/Modules/Quaeris/app/Filament/Widgets/QuestionChartAnswersChartWidget.php`
- `laravel/Modules/Quaeris/app/Filament/Widgets/QuestionChartAnswersTripleChartWidget.php`
>>>>>>> b05b65f05 (Refactor NotifyThemeableBusinessLogicTest to simplify factory usage and improve readability)
- `laravel/Modules/Chart/resources/js/filament-chart-js-plugins.js`

## Check dataset rapido

- label/values con stessa lunghezza
- niente `null` dove il plugin si aspetta coordinate/valori numerici
- per `_total` su doughnut: modellare il dataset per resa visiva attesa
