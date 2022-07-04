<div class="w-full flex flex-col">
    <div class="w-full flex flex-row justify-start items-center px-5">
        <span class="text-normal text-danger-600">
            {{ __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.delete.messages.confirmation_title') }}
        </span>
    </div>
    <div class="w-full flex flex-row justify-start items-center gap-2 px-5 mt-5 border-t border-gray-200">
        <button type="button" wire:click="submit" class="mt-5 px-3 py-1 text-white bg-danger-600 hover:text-danger-600 hover:bg-white border border-danger-600 rounded">
            {{ __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.delete.buttons.submit') }}
        </button>
        <button type="button" wire:click="cancel" class="mt-5 px-3 py-1 text-white bg-primary-600 hover:text-primary-600 hover:bg-white border border-primary-600 rounded">
            {{ __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.delete.buttons.cancel') }}
        </button>
        <div class="w-8 h-8 mt-5" wire:loading>
            <x-filament-support::loading-indicator
                class="inline-block animate-spin w-8 h-8 mr-3 text-primary-600"
            />
        </div>
    </div>
</div>
