<?php

namespace Heloufir\FilamentWorkflowManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkflowModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'status_from_id',
        'status_to_id',
        'workflow_id'
    ];

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(Workflow::class);
    }

    public function status_from(): BelongsTo
    {
        return $this->belongsTo(WorkflowStatus::class, 'status_from_id');
    }

    public function status_to(): BelongsTo
    {
        return $this->belongsTo(WorkflowStatus::class, 'status_to_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(WorkflowModel::class, 'status_to_id', 'status_from_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(WorkflowModel::class, 'status_from_id', 'status_to_id');
    }
}
