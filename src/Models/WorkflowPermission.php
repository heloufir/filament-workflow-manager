<?php

namespace Heloufir\FilamentWorkflowManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkflowPermission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'role',
        'workflow_id',
        'workflow_models',
    ];

    protected $casts = [
        'workflow_models' => 'array'
    ];

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(Workflow::class);
    }

    public function getWorkflowModelsFormattedAttribute()
    {
        return WorkflowModel::whereIn('id', $this->workflow_models)->get()->map(function (WorkflowModel $item) {
            return [
                'name' => __('filament-workflow-manager::filament-workflow-manager.resources.permissions.form.transition', [
                    'status_from' => $item->status_from?->name ?? '-',
                    'status_to' => $item->status_to->name,
                ])
            ];
        })->flatten()->toArray();
    }

    public function getWorkflowModelsObjectsAttribute()
    {
        return WorkflowModel::whereIn('id', $this->workflow_models)->get();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(config('auth.providers.users.model'), 'workflow_user_permissions', 'workflow_permission_id', 'user_id');
    }

    public function getNameAttribute(): string {
        return $this->workflow->name . ' - ' . $this->role;
    }
}
