<?php

namespace Heloufir\FilamentWorkflowManager\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait WorkflowHelper
{

    static function get_workflow_models(): Collection
    {
        $models = collect(get_declared_classes())
            ->filter(function ($class) {
                $valid = false;

                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }

                if ($valid) {
                    $valid = ((new $class) instanceof HasWorkflow);
                }

                return $valid;
            });

        return $models->values();
    }

    static function get_workflow_models_options(): array
    {
        $options = [];
        foreach (self::get_workflow_models() as $model) {
            $options[$model] = (new $model)->workflow_model_name();
        }
        return $options;
    }


}
