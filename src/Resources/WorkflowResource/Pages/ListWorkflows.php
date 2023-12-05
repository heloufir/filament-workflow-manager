<?php

namespace Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Heloufir\FilamentWorkflowManager\Resources\WorkflowResource;
Use \Filament\Actions\CreateAction;

class ListWorkflows extends ListRecords
{
    protected static string $resource = WorkflowResource::class;

    protected function getActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
