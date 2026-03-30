# Modulo UI - Componenti Condivisi

## Overview

Il modulo **UI** fornisce componenti Blade, widget Filament e asset condivisi per tutti i moduli e temi.

## Struttura Componenti

```
laravel/Modules/UI/resources/views/components/ui/
├── buttons/
│   ├── primary.blade.php
│   └── secondary.blade.php
├── cards/
│   ├── base.blade.php
│   └── collapsible.blade.php
├── forms/
│   ├── input.blade.php
│   └── select.blade.php
└── layout/
    ├── container.blade.php
    └── divider.blade.php
```

## Utilizzo

```blade
<x-ui::ui.button type="primary">
    Salva
</x-ui::ui.button>

<x-ui::ui.card>
    Contenuto
</x-ui::ui.card>
```

## Widget Filament

- `CalendarWidget`: FullCalendar integration
- `StatsOverviewWidget`: Statistiche dashboard
- `ChartWidget`: Grafici integrati

## Struttura Progetto

```
base_fixcity_fila5/
├── public_html/              # DOCUMENT ROOT
│   ├── themes/              # Theme assets
│   └── assets/              # Shared assets
├── laravel/Modules/UI/      # Questo modulo
└── docs/                     # Documentazione progetto
```

## Collegamenti

- [Regole Posizionamento](../../../../.cursor/rules/ui-components-rules.mdc)
- [Filament Widgets](./widgets/)
- [Master Module Index](../README.md)

## Regole Fondamentali

1. **MAI posizionare componenti in root** - Usare solo `Modules/UI/resources/views/components/ui/`
2. **Prefisso obbligatorio** - Usare `<x-ui::ui.componente />`
3. **PHPDoc completo** per ogni componente

## Backlinks

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/)
<<<<<<< Updated upstream
<<<<<<< HEAD

## AI Workflows
- [AI Methodologies](./ai-methodologies.md)
||||||| parent of 9a84589 (.)
    case LIST = 'list';
    case GRID = 'grid';

    public function getLabel(): string
    {
        return $this->transClass(self::class, $this->value . '.label');
    }
}
```

## ✅ Stato Qualità

- **PHPStan Level 10**: ✅ Compliant
- **Translation Standards**: ✅ 100%
- **Componenti**: 50+ Blade components
- **Widget**: 20+ Filament widgets

## 📚 Documentazione

- [Components Guide](components.md)
- [TableLayoutEnum Guide](table-layout-enum-complete-guide.md)
- [Filament Components](filament-components.md)

## 🔗 Moduli Collegati

- [Xot Module](../xot/docs/readme.md) - Framework core
- [User Module](../user/docs/readme.md) - Gestione utenti
- [Lang Module](../lang/docs/readme.md) - Traduzioni

---

**🔄 Ultimo aggiornamento**: 27 Gennaio 2025
**📦 Versione**: 4.1.0

## 🔁 CI & Semantic Versioning
Workflow: `.github/workflows/semantic-versioning.yml`

## 📄 License
MIT
=======
>>>>>>> 9a84589 (.)
||||||| Stash base
=======
- [Master Module Index](../README.md)

## Stato Qualità

- **PHPStan Level 10**: ✅ Compliant
- **Translation Standards**: ✅ 100%
- **Componenti**: 50+ Blade components
- **Widget**: 20+ Filament widgets

## Documentazione

- [Components Guide](components.md)
- [TableLayoutEnum Guide](table-layout-enum-complete-guide.md)
- [Filament Components](filament-components.md)

## Moduli Collegati

- [Xot Module](../Xot/docs/) - Framework core
- [User Module](../User/docs/) - Gestione utenti
- [Lang Module](../Lang/docs/) - Traduzioni
>>>>>>> Stashed changes
