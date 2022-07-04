<?php

namespace Heloufir\FilamentWorkflowManager\Forms\Components;

use Closure;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;

class WorkflowStatusInput extends Select
{

    protected bool|Closure $isSearchable = true;

    protected bool | Closure $isPreloaded = true;

    public static function make(string $name = null): static
    {
        return parent::make('workflow_status_id')
            ->label('Workflow status')
            ->options(function (?Model $record) {
                $options = $record?->nextStatuses?->pluck('name', 'id')->toArray() ?? [];
                if ($record?->workflow_status) {
                    $options[$record->workflow_status->status->id] = $record->workflow_status->status->name;
                }
                return $options;
            })
            ->hidden(fn (?Model $record) => !$record)
            ->required();
    }

}
