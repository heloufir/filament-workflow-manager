<?php

namespace Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Relations;

use Filament\Resources\RelationManagers\RelationManager;
use Heloufir\FilamentWorkflowManager\Models\WorkflowModel;

class WorkflowManager extends RelationManager
{
    protected static string $view = 'filament-workflow-manager::filament.resources.workflow-resource.pages.workflow-manager';

    protected static string $relationship = 'workflow_models';

    protected static ?string $recordTitleAttribute = 'name';

    protected $listeners = [
        'close_workflow_manager_edit_dialog', 'close_workflow_manager_delete_dialog', 'close_workflow_manager_add_dialog', 'close_add_status'
    ];

    public WorkflowModel|null $to_edit;
    public WorkflowModel|null $to_delete;
    public WorkflowModel|null $to_add;
    public bool $show_add_status = false;

    public static function getTitle($ownerRecord, string $pageClass): string
    {
        return __('filament-workflow-manager::filament-workflow-manager.resources.workflow.page.workflow.heading');
    }

    public function add_status() {
        $this->show_add_status = true;
    }

    public function close_add_status()
    {
        $this->show_add_status = false;
    }

    public function add_node(WorkflowModel|null $workflowModel = null)
    {
        $this->to_add = $workflowModel;
    }

    public function delete_node(WorkflowModel $workflowModel)
    {
        $this->to_delete = $workflowModel;
    }

    public function edit_node(WorkflowModel $workflowModel)
    {
        $this->to_edit = $workflowModel;
    }

    public function close_workflow_manager_edit_dialog()
    {
        $this->to_edit = null;
    }

    public function close_workflow_manager_add_dialog()
    {
        $this->to_add = null;
    }

    public function close_workflow_manager_delete_dialog()
    {
        $this->to_delete = null;
    }

}
