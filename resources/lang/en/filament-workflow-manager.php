<?php

return [
    'resources' => [
        'workflow' => [
            'table' => [
                'name' => 'Name',
                'model' => 'Model'
            ],
            'page' => [
                'edit' => [
                    'workflow' => 'Manage workflow'
                ],
                'workflow' => [
                    'heading' => 'Workflow transitions',
                    'actions' => [
                        'add_status' => 'New status'
                    ],
                    'modal' => [
                        'edit' => [
                            'title' => 'Edit transition',
                            'form' => [
                                'status_from' => 'From status',
                                'status_to' => 'To status',
                                'status_from_color' => 'From status color',
                                'status_to_color' => 'To status color',
                                'submit' => 'Edit',
                                'cancel' => 'Cancel',
                            ],
                            'messages' => [
                                'submitted' => 'Transition saved!'
                            ],
                        ],
                        'delete' => [
                            'title' => 'Delete transition',
                            'buttons' => [
                                'submit' => 'Delete',
                                'cancel' => 'Cancel',
                            ],
                            'messages' => [
                                'confirmation_title' => 'Are you sure you want to delete this transition?',
                                'deleted' => 'Transition deleted!'
                            ],
                        ],
                        'add' => [
                            'title' => 'Add transition',
                            'form' => [
                                'status_from' => 'From status',
                                'status_to' => 'To status',
                                'status_from_color' => 'From status color',
                                'status_to_color' => 'To status color',
                                'submit' => 'Add',
                                'cancel' => 'Cancel',
                            ],
                            'messages' => [
                                'duplicated' => 'Transition already exists!',
                                'submitted' => 'Transition created!'
                            ],
                        ],
                        'add_status' => [
                            'title' => 'Add status',
                            'form' => [
                                'name' => 'Name',
                                'color' => 'Color',
                                'submit' => 'Add',
                                'cancel' => 'Cancel',
                            ],
                            'messages' => [
                                'duplicated' => 'Status already exists!',
                                'submitted' => 'Status created!'
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ]
];
