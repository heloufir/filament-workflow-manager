<?php

namespace Heloufir\FilamentWorkflowManager\Http\Livewire;

use Filament\Facades\Filament;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;
use Livewire\Component;

class WorkflowManagerDelete extends Component
{

    public WorkflowModel $record;

    public function render()
    {
        return view('filament-workflow-manager::livewire.workflow-manager-delete');
    }

    public function submit()
    {
        $this->record->delete();
        Filament::notify('success', __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.delete.messages.deleted'));
        $this->emit('close_workflow_manager_delete_dialog');
    }

    public function cancel()
    {
        $this->emit('close_workflow_manager_delete_dialog');
    }
}
