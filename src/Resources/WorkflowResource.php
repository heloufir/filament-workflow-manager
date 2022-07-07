<?php

namespace Heloufir\FilamentWorkflowManager\Resources;

use Heloufir\FilamentWorkflowManager\Core\WorkflowHelper;
use Filament\Forms\Components;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns;
use Heloufir\FilamentWorkflowManager\Models\Workflow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Relations;

class WorkflowResource extends Resource
{
    use WorkflowHelper;

    protected static ?string $model = Workflow::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Settings';

    protected static function getNavigationLabel(): string
    {
        return trans('filament-workflow-manager::filament-workflow-manager.resources.title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Components\Card::make([
                    // NAME
                    Components\TextInput::make('name')
                        ->label(trans('filament-workflow-manager::filament-workflow-manager.resources.workflow.table.name'))
                        ->required()
                        ->maxLength(Builder::$defaultStringLength),

                    // MODEL
                    Components\Select::make('model')
                        ->label(trans('filament-workflow-manager::filament-workflow-manager.resources.workflow.table.model'))
                        ->required()
                        ->rule(fn(?Model $record) => 'unique:workflows,model,' . ($record?->id ?? 'NULL') . ',id,deleted_at,NULL')
                        ->options(self::get_workflow_models_options())
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('name')
                    ->label(trans('filament-workflow-manager::filament-workflow-manager.resources.workflow.table.name'))
                    ->sortable()
                    ->searchable(),

                Columns\TextColumn::make('model')
                    ->label(trans('filament-workflow-manager::filament-workflow-manager.resources.workflow.table.model'))
                    ->sortable()
                    ->formatStateUsing(fn (string $state) => (new $state)->workflow_model_name())
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            Relations\WorkflowManager::class,
            Relations\WorkflowPermission::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Pages\ListWorkflows::route('/'),
            'create' => \Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Pages\CreateWorkflow::route('/create'),
            'edit' => \Heloufir\FilamentWorkflowManager\Resources\WorkflowResource\Pages\EditWorkflow::route('/{record}/edit'),
        ];
    }
}
