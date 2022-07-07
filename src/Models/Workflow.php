<?php

namespace Heloufir\FilamentWorkflowManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workflow extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'model'
    ];

    public function workflow_models(): HasMany
    {
        return $this->hasMany(WorkflowModel::class)->whereNull('status_from_id');
    }

    public function workflow_permissions(): HasMany
    {
        return $this->hasMany(WorkflowPermission::class);
    }
}
