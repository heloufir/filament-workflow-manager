<?php

namespace Heloufir\FilamentWorkflowManager;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentWorkflowManagerServiceProvider extends PluginServiceProvider
{

    public function configurePackage(Package $package): void
    {
        // Package name
        $package->name('filament-workflow-manager');

        // Config file
        $package->hasConfigFile('filament-workflow-manager');

        // Migrations
        $package->hasMigrations([
           '2022_07_01_120846_create_workflow_statuses_table',
           '2022_07_01_120850_create_workflows_table',
           '2022_07_01_120853_create_workflow_models_table',
           '2022_07_01_214028_create_workflow_model_statuses_table',
        ]);
        $package->runsMigrations = true;

        // Helpers file
        if (file_exists($file = __DIR__ . '/../src/helpers.php'))
        {
            require $file;
        }
    }

    protected function getResources(): array
    {
        return config('filament-workflow-manager.resources');
    }

    protected function getStyles(): array
    {
        return array_merge([
            __DIR__ . '/../dist/app.css'
        ], config('filament-workflow-manager.styles'));
    }

}
