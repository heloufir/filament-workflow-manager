<?php

namespace Heloufir\FilamentWorkflowManager\Http\Livewire;

use Filament\Facades\Filament;
use Filament\Forms\Components;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Livewire\Component;

class WorkflowManagerAddStatus extends Component implements HasForms
{
    use InteractsWithForms;

    public function mount()
    {
        $this->form->fill([
            'name' => null,
            'color' => '#f3f4f6',
        ]);
    }

    public function render()
    {
        return view('filament-workflow-manager::livewire.workflow-manager-add-status');
    }

    protected function getFormSchema(): array
    {
        return [

            Components\Grid::make(1)
                ->schema([
                    Components\TextInput::make('name')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add_status.form.name'))
                        ->required()
                        ->unique(table: WorkflowStatus::class, column: 'name', ignorable: fn (?Model $record) => $record)
                        ->maxLength(Builder::$defaultStringLength),

                    Components\ColorPicker::make('color')
                        ->label(__('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add_status.form.color'))
                        ->required(),
                ])
        ];
    }

    public function submit()
    {
        $data = $this->form->getState();
        $model = new WorkflowStatus();
        $model->name = $data['name'];
        $model->color = $data['color'];
        $model->save();
        Filament::notify('success', __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add_status.form.submit'));
        $this->emit('close_add_status');
    }

    public function cancel()
    {
        $this->emit('close_add_status');
    }
}
