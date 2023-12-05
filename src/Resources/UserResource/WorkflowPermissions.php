<?php

namespace Heloufir\FilamentWorkflowManager\Resources\UserResource;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class WorkflowPermissions extends RelationManager
{
    protected static string $relationship = 'workflow_permissions';

    protected static ?string $recordTitleAttribute = 'role';

    protected static bool $shouldPreloadAttachFormRecordSelectOptions = true;

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('filament-workflow-manager::filament-workflow-manager.resources.permissions.user-relation.title');
    }

    protected static function getRecordLabel(): string
    {
        return __('filament-workflow-manager::filament-workflow-manager.resources.permissions.user-relation.label');
    }

    public function table(Table $table): Table
    {

        return $table
            ->columns([
                TextColumn::
                make('workflow.name')
                    ->label(__('filament-workflow-manager::filament-workflow-manager.resources.permissions.user-relation.table.workflow'))
                    ->searchable(),

                TextColumn::
                make('role')
                    ->label(__('filament-workflow-manager::filament-workflow-manager.resources.permissions.user-relation.table.permission'))
                    ->searchable(),

                TagsColumn::make('workflow_models_formatted')
                    ->label(__('filament-workflow-manager::filament-workflow-manager.resources.permissions.user-relation.table.permission'))

            ])
            ->filters([
                //
            ]);
    }

    protected function canCreate(): bool
    {
        return false;
    }

    protected function canEdit(Model $record): bool
    {
        return false;
    }

    protected function canDelete(Model $record): bool
    {
        return false;
    }

    protected function canDeleteAny(): bool
    {
        return false;
    }
}
