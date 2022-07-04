<?php

namespace Heloufir\FilamentWorkflowManager\Core;

trait WorkflowResource
{

    protected function afterSave(): void
    {
        $data = $this->form->getState();
        $this->record->workflow_status->workflow_status_id = $data['workflow_status_id'];
        $this->record->workflow_status->save();
    }

    protected function afterCreate(): void
    {
        call_user_func($this->getModel() . '::initiate_default_status', $this->record->id);
    }

}
