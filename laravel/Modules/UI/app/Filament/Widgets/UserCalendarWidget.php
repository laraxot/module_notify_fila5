<?php

namespace Modules\UI\Filament\Widgets;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
// use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Filament\Widgets\Widget;
use Illuminate\Support\Str;
use Modules\Xot\Datas\XotData;

class UserCalendarWidget extends Widget
{
    // use InteractsWithEvents;
    protected string $view = 'ui::filament.widgets.user-calendar';

    public string $type;

    public function getActionName(string $function): string
    {
        $action_suffix = Str::of($function)->studly()->append('Action')->toString();
        $resource = XotData::make()->getUserResourceClassByType($this->type);
        $model = $resource::getModel();
        $action = Str::of($model)
            ->replace('\Models\\', '\Actions\\')
            ->append('\Calendar\\'.$action_suffix)
            ->toString();

        return $action;
    }

    public function fetchEvents(array $fetchInfo): array
    {
        $action = $this->getActionName(__FUNCTION__);

        return app($action)->execute($fetchInfo);
    }

    public function getFormSchema(): array
    {
        $action = $this->getActionName(__FUNCTION__);

        if (class_exists($action)) {
            return app($action)->execute();
        }

        // Fallback schema
        return [
            TextInput::make('title'),

            Grid::make()
                ->schema([
                    DateTimePicker::make('starts_at'),
                    DateTimePicker::make('ends_at'),
                ]),
        ];
    }

    /*
    protected function modalActions(): array
    {
        return [
            \Saade\FilamentFullCalendar\Actions\EditAction::make(),
            \Saade\FilamentFullCalendar\Actions\DeleteAction::make(),
        ];
    }
    */

    public function onDateSelect(string $start, ?string $end, bool $allDay, ?array $view, ?array $resource): void
    {
        // TODO: Implementare la logica per la selezione della data
        // dd('test');
    }
}
