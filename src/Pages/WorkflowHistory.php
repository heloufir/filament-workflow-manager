<?php

namespace Heloufir\FilamentWorkflowManager\Pages;

use Closure;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\MultiSelectFilter;
use Heloufir\FilamentWorkflowManager\Models\WorkflowStatus;
use Illuminate\Database\Eloquent\Builder;
use Heloufir\FilamentWorkflowManager\Models\WorkflowHistory as WorkflowHistoryModel;
use Illuminate\Support\Facades\Route;

class WorkflowHistory extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament-workflow-manager::filament.pages.workflow-history';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $slug = 'workflow-history/{id?}/{model?}';

    public string|null $modelable_type = null;
    public int|null $modelable_id = null;

    protected function getTitle(): string
    {
        return trans('filament-workflow-manager::filament-workflow-manager.page.history.title');
    }

    public static function getRoutes(): Closure
    {
        return function () {
            $slug = static::getSlug();

            Route::get($slug, static::class)
                ->middleware(static::getMiddlewares())
                ->name($slug)
                ->where('model', '(.*)');
        };
    }

    public function mount($id, $model)
    {
        $this->modelable_id = $id;
        $this->modelable_type = $model;
    }

    protected function getTableQuery(): Builder
    {
        $query = WorkflowHistoryModel::query();
        $query->where('modelable_type', str_replace('/', '\\', $this->modelable_type));
        $query->where('modelable_id', $this->modelable_id);
        return $query;
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('old_status.name')
                ->label(trans('filament-workflow-manager::filament-workflow-manager.page.history.table.old_status'))
                ->searchable()
                ->sortable(),

            TextColumn::make('new_status.name')
                ->label(trans('filament-workflow-manager::filament-workflow-manager.page.history.table.new_status'))
                ->searchable()
                ->sortable(),

            TextColumn::make('user.' . config('filament-workflow-manager.user_name'))
                ->label(trans('filament-workflow-manager::filament-workflow-manager.page.history.table.changed_by'))
                ->searchable()
                ->sortable(),

            TextColumn::make('executed_at')
                ->label(trans('filament-workflow-manager::filament-workflow-manager.page.history.table.changed_at'))
                ->searchable()
                ->sortable()
                ->dateTime(trans('filament-workflow-manager::filament-workflow-manager.page.history.data.date_format')),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            MultiSelectFilter::make('statuses')
                ->label(trans('filament-workflow-manager::filament-workflow-manager.page.history.table.filter.statuses'))
                ->options(WorkflowStatus::all()->pluck('name', 'id')->toArray())
                ->query(function (Builder $query, array $state) {
                    if (isset($state['values']) && sizeof($state['values'])) {
                        $query->whereIn('old_status_id', $state['values'])
                            ->orWhereIn('new_status_id', $state['values']);
                    }
                    return $query;
                })
        ];
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'executed_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }
}
