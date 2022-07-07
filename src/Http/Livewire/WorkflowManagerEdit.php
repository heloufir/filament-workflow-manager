<?php

namespace Heloufir\FilamentWorkflowManager\Http\Livewire;

use Closure;
use Filament\Facades\Filament;
use Filament\Forms\Components;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Illuminate\Database\Schema\Builder;
use Livewire\Component;

class WorkflowManagerEdit extends Component implements HasForms
{
    use InteractsWithForms;

    public WorkflowModel $record;

    public function mount()
    {
        $this->form->fill([
            'name' => $this->record?->status_to?->name,
            'color' => $this->record?->status_to?->color,
            'is_end' => $this->record?->status_to?->is_end
        ]);
    }

    public function render()
    {
        return view('filament-workflow-manager::livewire.workflow-manager-edit');
    }

    protected function getFormSchema(): array
    {
        return [
            Components\TextInput::make('name')
                ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.status_name'))
                ->required()
                ->maxLength(Builder::$defaultStringLength),

            Components\ColorPicker::make('color')
                ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.status_color'))
                ->required(),

            Components\Checkbox::make('is_end')
                ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.is_end')),
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();
        if ($data['is_end'] && WorkflowModel::where('workflow_id', $this->record->workflow->id)->where('status_from_id', $this->record->status_to_id)->count()) {
            Filament::notify('warning', __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.messages.cannot_end_workflow'));
        } else {
            $this->record->status_to->name = $data['name'];
            $this->record->status_to->color = $data['color'];
            $this->record->status_to->is_end = $data['is_end'];
            $this->record->status_to->save();
            Filament::notify('success', __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.messages.submitted'));
            $this->emit('close_workflow_manager_edit_dialog');
        }
    }

    public function cancel()
    {
        $this->emit('close_workflow_manager_edit_dialog');
    }
}
