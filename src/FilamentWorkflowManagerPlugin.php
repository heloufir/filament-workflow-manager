<?php

namespace Heloufir\FilamentWorkflowManager;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Heloufir\FilamentWorkflowManager\Resources\WorkflowResource;

class FilamentWorkflowManagerPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-workflow-manager';
    }

    public function register(Panel $panel): void
    {
        $panel
        ->resources([
            WorkflowResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}