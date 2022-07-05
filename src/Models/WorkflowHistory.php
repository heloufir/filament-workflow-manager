<?php

namespace Heloufir\FilamentWorkflowManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkflowHistory extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'old_status_id',
        'new_status_id',
        'user_id',
        'modelable_type',
        'modelable_id',
        'executed_at'
    ];

    protected $casts = [
        'executed_at' => 'datetime'
    ];

    public function modelable(): MorphTo
    {
        return $this->morphTo();
    }

    public function old_status(): BelongsTo
    {
        return $this->belongsTo(WorkflowStatus::class, 'old_status_id');
    }

    public function new_status(): BelongsTo
    {
        return $this->belongsTo(WorkflowStatus::class, 'new_status_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'user_id');
    }
}
