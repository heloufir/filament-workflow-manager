<?php

namespace Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Heloufir\FilamentWorkflowManager\Resources\WorkflowResource;
Use \Filament\Actions\DeleteAction;

class EditWorkflow extends EditRecord
{
    protected static string $resource = WorkflowResource::class;

    protected function getActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
