<li>
    <span class="{{ $item->status_to->is_end ? 'end-workflow' : '' }}" style="{{ workflow_status_color_styles($item->status_to->color) }}">
        {{ $item->status_to->name }}
        <div>
            <button class="delete-btn" wire:click="delete_node({{ $item }})">
                <x-heroicon-o-x class="w-3 h-3"></x-heroicon-o-x>
            </button>
            @if(!$item->status_to->is_end)
                <button class="add-btn" wire:click="add_node({{ $item }})">
                    <x-heroicon-o-plus class="w-3 h-3"></x-heroicon-o-plus>
                </button>
            @endif
            <button class="edit-btn" wire:click="edit_node({{ $item }})">
                <x-heroicon-o-pencil class="w-3 h-3"></x-heroicon-o-pencil>
            </button>
        </div>
    </span>
    @if($item->children->count())
        <ul>
            @foreach($item->children as $child)
                @include('filament-workflow-manager::partials.workflow-tree-item', ['item' => $child])
            @endforeach
        </ul>
    @endif
</li>
