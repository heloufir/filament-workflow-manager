<?php

namespace Heloufir\FilamentWorkflowManager\Core;

use Heloufir\FilamentWorkflowManager\Models\WorkflowPermission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait WorkflowPermissions
{

    public function workflow_permissions(): BelongsToMany
    {
        return $this->belongsToMany(WorkflowPermission::class, 'workflow_user_permissions', 'user_id', 'workflow_permission_id');
    }

}
