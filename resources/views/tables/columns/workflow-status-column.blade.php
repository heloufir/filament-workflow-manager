<div class="px-4 py-3">
    <span style="{{ workflow_status_color_styles($getState()?->status?->color) }}" class="px-2 py-1 rounded">
        {{ $getState()?->status?->name }}
    </span>
</div>
