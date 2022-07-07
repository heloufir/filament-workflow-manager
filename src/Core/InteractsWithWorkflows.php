<?php

namespace Heloufir\FilamentWorkflowManager\Core;

use Heloufir\FilamentWorkflowManager\Models\Workflow;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModelStatus;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Collection;

trait InteractsWithWorkflows
{

    protected function getArrayableAppends()
    {
        $this->appends = array_unique(array_merge($this->appends, ['workflow_status_id']));

        return parent::getArrayableAppends();
    }

    public function workflow_model_name(): string
    {
        return class_basename(__CLASS__);
    }

    public function getWorkflowAttribute(): Workflow|null
    {
        return Workflow::where('model', get_class())->first();
    }

    public function getNextStatusesAttribute(): Collection
    {
        $workflow = $this->workflow;
        if ($workflow) {
            return WorkflowModel::where('workflow_id', $workflow->id)
                ->where('status_from_id', $this->workflow_status->status->id)
                ->whereIn('status_to_id', auth()->user()->workflow_permissions->pluck('workflow_models_objects')->flatten()->pluck('status_to_id')->toArray())
                ->get()
                ->pluck('status_to');
        }
        return collect();
    }

    public function workflow_status(): MorphOne
    {
        return $this->morphOne(WorkflowModelStatus::class, 'modelable');
    }

    public function getWorkflowStatusIdAttribute()
    {
        return $this->workflow_status?->status?->id;
    }

    public static function initiate_default_status($id)
    {
        $status = Workflow::where('model', get_class())->first()->workflow_models->first();
        if ($status) {
            WorkflowModelStatus::create([
                'modelable_type' => get_class(),
                'modelable_id' => $id,
                'workflow_status_id' => $status->status_to_id
            ]);
        }
    }

}
