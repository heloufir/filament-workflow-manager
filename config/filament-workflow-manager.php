<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    |
    | This is the configuration for the package filament resources
    |
    */

    'resources' => [
        \Heloufir\FilamentWorkflowManager\Resources\WorkflowResource::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Pages
    |--------------------------------------------------------------------------
    |
    | This is the configuration for the package filament pages
    |
    */

    'pages' => [
        \Heloufir\FilamentWorkflowManager\Pages\WorkflowHistory::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | User name column
    |--------------------------------------------------------------------------
    |
    | This is the configuration for the user's name column (by default "name")
    |
    */

    'user_name' => 'name',

    /*
    |--------------------------------------------------------------------------
    |  Navigation Group Name
    |--------------------------------------------------------------------------
    |
    | This is the configuration for the navigation group name (by default "Settings")
    |
    */

    'navigation_group' => 'Settings',

    /*
    |--------------------------------------------------------------------------
    |  Navigation Sort
    |--------------------------------------------------------------------------
    |
    | This is the configuration for the navigation sort number (by default 1)
    |
    */

    'navigation_sort' => 1,

    /*
    |--------------------------------------------------------------------------
    |  Navigation Icon
    |--------------------------------------------------------------------------
    |
    | This is the configuration for the navigation icon class (by default "heroicon-o-collection")
    |
    */

    'navigation_icon' => 'heroicon-o-collection',

    /*
    |--------------------------------------------------------------------------
    | Styles
    |--------------------------------------------------------------------------
    |
    | This is the configuration allowing you to add custom styles to the
    | package default stylesheet file
    |
    */

    'styles' => [

    ],

    /*
    |--------------------------------------------------------------------------
    |  Permissions enabled
    |--------------------------------------------------------------------------
    |
    | This is the configuration where you can enable or disable the
    | workflow permissions
    |
    */

    'permissions_enabled' => true,

];
