<?php

namespace Heloufir\FilamentWorkflowManager\Http\Livewire;

use Closure;
use Filament\Facades\Filament;
use Filament\Forms\Components;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Livewire\Component;

class WorkflowManagerEdit extends Component implements HasForms
{
    use InteractsWithForms;

    public WorkflowModel $record;

    public function mount()
    {
        $this->form->fill($this->record->fresh(['status_from', 'status_to'])->toArray());
    }

    public function render()
    {
        return view('filament-workflow-manager::livewire.workflow-manager-edit');
    }

    protected function getFormSchema(): array
    {
        return [

            Components\Grid::make(2)
                ->schema([
                    Components\Select::make('status_from_id')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.status_from'))
                        ->options(WorkflowStatus::all()->pluck('name', 'id'))
                        ->disabled(),

                    Components\ColorPicker::make('status_from.color')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.status_from_color'))
                        ->disabled(fn(Closure $get) => !$get('status_from_id'))
                        ->required(fn(Closure $get) => $get('status_from_id')),
                ]),

            Components\Grid::make(2)
                ->schema([
                    Components\Select::make('status_to_id')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.status_to'))
                        ->options(WorkflowStatus::all()->pluck('name', 'id'))
                        ->disabled(),

                    Components\ColorPicker::make('status_to.color')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.status_to_color'))
                        ->required(),
                ])
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();
        if ($this->record->status_from_id) {
            $this->record->status_from->color = $data['status_from']['color'];
            $this->record->status_from->save();
        }
        $this->record->status_to->color = $data['status_to']['color'];
        $this->record->status_to->save();
        Filament::notify('success', __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.messages.submitted'));
        $this->emit('close_workflow_manager_edit_dialog');
    }

    public function cancel()
    {
        $this->emit('close_workflow_manager_edit_dialog');
    }
}
