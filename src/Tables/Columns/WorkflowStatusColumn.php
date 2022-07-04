<?php

namespace Heloufir\FilamentWorkflowManager\Tables\Columns;

use Filament\Tables\Columns\Column;

class WorkflowStatusColumn extends Column
{
    protected string $view = 'tables.columns.workflow-status-column';

    public static function make(string $name = null): static
    {
        return parent::make('workflow_status');
    }
}
