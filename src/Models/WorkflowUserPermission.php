<?php

namespace Heloufir\FilamentWorkflowManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkflowUserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'workflow_permission_id',
        'user_id',
    ];
    public $timestamps = false;

    public function workflow_permission(): BelongsTo
    {
        return $this->belongsTo(WorkflowPermission::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'user_id');
    }
}
