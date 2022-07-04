<?php

namespace Heloufir\FilamentWorkflowManager\Http\Livewire;

use Filament\Facades\Filament;
use Filament\Forms\Components;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Heloufir\FilamentWorkflowManager\Models\Workflow;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Livewire\Component;

class WorkflowManagerAdd extends Component implements HasForms
{
    use InteractsWithForms;

    public WorkflowModel|null $record = null;
    public Workflow $workflow;

    public function mount()
    {
        $this->form->fill([
            'status_from_id' => $this->record?->status_to_id,
            'status_to_id' => null,
        ]);
    }

    public function render()
    {
        return view('filament-workflow-manager::livewire.workflow-manager-add');
    }

    protected function getFormSchema(): array
    {
        return [

            Components\Grid::make(1)
                ->schema([
                    Components\Select::make('status_from_id')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add.form.status_from'))
                        ->options(WorkflowStatus::all()->pluck('name', 'id'))
                        ->disabled(),
                ]),

            Components\Grid::make(1)
                ->schema([
                    Components\Select::make('status_to_id')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add.form.status_to'))
                        ->options(function() {
                            if ($this->record?->status_to_id) {
                                return WorkflowStatus::where('id', '<>', $this->record?->status_to_id)->pluck('name', 'id');
                            } else {
                                return WorkflowStatus::all()->pluck('name', 'id');
                            }
                        })
                        ->searchable()
                        ->required(),
                ])
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();
        if (WorkflowModel::where('workflow_id', $this->workflow->id)->where('status_from_id', $data['status_from_id'])->where('status_to_id', $data['status_to_id'])->count()) {
            Filament::notify('warning', __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add.messages.duplicated'));
        } else {
            $model = new WorkflowModel();
            $model->workflow_id = $this->workflow->id;
            $model->status_from_id = $data['status_from_id'];
            $model->status_to_id = $data['status_to_id'];
            $model->save();
            Filament::notify('success', __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add.messages.submitted'));
            $this->emit('close_workflow_manager_add_dialog');
        }
    }

    public function cancel()
    {
        $this->emit('close_workflow_manager_add_dialog');
    }
}
