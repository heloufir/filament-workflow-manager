<?php

namespace Heloufir\FilamentWorkflowManager\Core;

use Heloufir\FilamentWorkflowManager\Models\WorkflowHistory;

trait WorkflowResource
{

    protected function afterSave(): void
    {
        $old_status = $this->record->workflow_status->status;
        $data = $this->form->getState();
        $this->record->workflow_status->workflow_status_id = $data['workflow_status_id'];
        $this->record->workflow_status->save();
        $this->saveHistory($old_status->id);
        if ($old_status->id !== $this->record->workflow_status->workflow_status_id) {
            $this->emit('WorkflowStatusUpdated', [
                'type' => 'update',
                'old_status' => $old_status,
                'new_status' => $this->record->workflow_status->status,
                'model' => $this->record,
                'user' => auth()->user()
            ]);
        }
    }

    protected function afterCreate(): void
    {
        call_user_func($this->getModel() . '::initiate_default_status', $this->record->id);
        $this->saveHistory();
        $this->emit('WorkflowStatusUpdated', [
            'type' => 'create',
            'old_status' => null,
            'new_status' => $this->record->workflow_status->workflow_status,
            'model' => $this->record,
            'user' => auth()->user()
        ]);
    }

    private function saveHistory(int|null $old_status = null): void
    {
        WorkflowHistory::create([
            'old_status_id' => $old_status,
            'new_status_id' => $this->record->workflow_status->workflow_status_id,
            'user_id' => auth()->user()->id,
            'modelable_type' => get_class($this->record),
            'modelable_id' => $this->record->id,
            'executed_at' => now()
        ]);
    }

}
