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
    | Navigation Group
    |--------------------------------------------------------------------------
    |
    | This is the configuration for the navigation group
    |
    */
    
    'navigationGroup' => 'Settings',

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
    | Styles
    |--------------------------------------------------------------------------
    |
    | This is the configuration allowing you to add custom styles to the
    | package default stylesheet file
    |
    */

    'styles' => [

    ],

];
