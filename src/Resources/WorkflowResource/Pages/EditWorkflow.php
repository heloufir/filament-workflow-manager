<?php

namespace Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Heloufir\FilamentWorkflowManager\Resources\WorkflowResource;

class EditWorkflow extends EditRecord
{
    protected static string $resource = WorkflowResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
