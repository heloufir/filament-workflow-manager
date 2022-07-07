<?php

namespace Heloufir\FilamentWorkflowManager\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkflowStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'color',
        'is_end'
    ];
}
