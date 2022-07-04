@php

    $record = $this->getOwnerRecord();

@endphp

<div class="border border-gray-300 shadow-sm bg-white rounded-xl filament-tables-container">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <div class="px-2 pt-2">
        <div class="px-4 py-2 filament-tables-header mb-2">
            <div class="flex flex-col gap-4 md:justify-between md:items-start md:flex-row md:-mr-2">
                <div>
                    <h2 class="text-xl font-bold tracking-tight filament-tables-header-heading">
                        @lang('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.heading')
                    </h2>
                    <p class="text-gray-900 filament-tables-header-description">
                    </p>
                </div>
                <div>
                    <x-filament::button wire:click="add_status" type="button">@lang('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.actions.add_status')</x-filament::button>
                </div>
            </div>
        </div>

        <div aria-hidden="true" class="border-t filament-hr" xshow="true || selectedRecords.length" x-show="true || selectedRecords.length"></div>
    </div>

    <div class="w-full p-5">
        <figure class="tree-chart">

            <ul class="tree">
                <li>
                <span class="start-node">
                    &nbsp;
                    @if($record->workflow_models->count() == 0)
                        <div>
                            <button class="add-btn" wire:click="add_node()">
                                <x-heroicon-o-plus class="w-3 h-3"></x-heroicon-o-plus>
                            </button>
                        </div>
                    @endif
                </span>
                    <ul>
                        @foreach($record->workflow_models as $item)
                            @include('filament-workflow-manager::partials.workflow-tree-item', ['item' => $item])
                        @endforeach
                    </ul>
                </li>
            </ul>

        </figure>
    </div>

    @if($to_edit)
        <div class="dialog fixed py-5 top-0 right-0 bottom-0 left-0 bg-gray-500 bg-opacity-50 z-50 flex flex-col justify-center items-center">
            <div class="bg-white md:w-2/6 sm:w-5/6 w-5/6 py-5 rounded-lg border border-gray-200 shadow flex flex-col justify-center items-center">
                <div class="w-full flex flex-row justify-start items-center px-5 mb-5 pb-5 border-b border-gray-200">
                    <span class="text-medium text-xl text-gray-700">@lang('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.title')</span>
                </div>
                <div class="w-full flex flex-col justify-start items-start">
                    @livewire(Heloufir\FilamentWorkflowManager\Http\Livewire\WorkflowManagerEdit::class, ['record' => $to_edit])
                </div>
            </div>
        </div>
    @endif

    @if($to_delete)
        <div class="dialog fixed py-5 top-0 right-0 bottom-0 left-0 bg-gray-500 bg-opacity-50 z-50 flex flex-col justify-center items-center">
            <div class="bg-white md:w-2/6 sm:w-5/6 w-5/6 py-5 rounded-lg border border-gray-200 shadow flex flex-col justify-center items-center">
                <div class="w-full flex flex-row justify-start items-center px-5 mb-5 pb-5 border-b border-gray-200">
                    <span class="text-medium text-xl text-gray-700">@lang('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.delete.title')</span>
                </div>
                <div class="w-full flex flex-col justify-start items-start">
                    @livewire(Heloufir\FilamentWorkflowManager\Http\Livewire\WorkflowManagerDelete::class, ['record' => $to_delete])
                </div>
            </div>
        </div>
    @endif

    @if($to_add)
        <div class="dialog fixed py-5 top-0 right-0 bottom-0 left-0 bg-gray-500 bg-opacity-50 z-50 flex flex-col justify-center items-center">
            <div class="bg-white md:w-2/6 sm:w-5/6 w-5/6 py-5 rounded-lg border border-gray-200 shadow flex flex-col justify-center items-center">
                <div class="w-full flex flex-row justify-start items-center px-5 mb-5 pb-5 border-b border-gray-200">
                    <span class="text-medium text-xl text-gray-700">@lang('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add.title')</span>
                </div>
                <div class="w-full flex flex-col justify-start items-start">
                    @livewire(Heloufir\FilamentWorkflowManager\Http\Livewire\WorkflowManagerAdd::class, ['record' => $to_add, 'workflow' => $record])
                </div>
            </div>
        </div>
    @endif

    @if($show_add_status)
        <div class="dialog fixed py-5 top-0 right-0 bottom-0 left-0 bg-gray-500 bg-opacity-50 z-50 flex flex-col justify-center items-center">
            <div class="bg-white md:w-2/6 sm:w-5/6 w-5/6 py-5 rounded-lg border border-gray-200 shadow flex flex-col justify-center items-center">
                <div class="w-full flex flex-row justify-start items-center px-5 mb-5 pb-5 border-b border-gray-200">
                    <span class="text-medium text-xl text-gray-700">@lang('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.add_status.title')</span>
                </div>
                <div class="w-full flex flex-col justify-start items-start">
                    @livewire(Heloufir\FilamentWorkflowManager\Http\Livewire\WorkflowManagerAddStatus::class)
                </div>
            </div>
        </div>
    @endif

</div>
