<form wire:submit.prevent="submit" class="w-full flex flex-col justify-start items-start">
    <div class="w-full mb-5 p-5">
        {{ $this->form }}
    </div>

    <div class="w-full flex flex-row justify-start items-center gap-2 border-t border-gray-200 px-5">
        <button type="submit" class="mt-5 px-3 py-1 text-white bg-primary-600 hover:text-primary-600 hover:bg-white border border-primary-600 rounded">
            {{ __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.submit') }}
        </button>
        <button type="button" wire:click="cancel" class="mt-5 px-3 py-1 text-white bg-danger-600 hover:text-danger-600 hover:bg-white border border-danger-600 rounded">
            {{ __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.modal.edit.form.cancel') }}
        </button>
        <div class="w-8 h-8 mt-5" wire:loading>
            <x-filament-support::loading-indicator
                class="inline-block animate-spin w-8 h-8 mr-3 text-primary-600"
            />
        </div>
    </div>
</form>
