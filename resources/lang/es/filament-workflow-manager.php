<?php

return [
    'resources' => [
        'title' => 'Flujo de Trabajo',
        'workflow' => [
            'table' => [
                'name' => 'Nombre',
                'model' => 'Modelo'
            ],
            'page' => [
                'edit' => [
                    'workflow' => 'Administra Flujo de Trabajo'
                ],
                'workflow' => [
                    'heading' => 'Transiciones de Estado',
                    'actions' => [
                        'add_status' => 'Nuevo estado'
                    ],
                    'modal' => [
                        'edit' => [
                            'title' => 'Editar transición',
                            'form' => [
                                'status_name' => 'Nombre del Estado',
                                'status_color' => 'Color',
                                'is_end' => 'Fin del Flujo de Trabajo',
                                'submit' => 'Editar',
                                'cancel' => 'Cancelar',
                            ],
                            'messages' => [
                                'submitted' => '¡Transition guardada!',
                                'cannot_end_workflow' => 'No puede ser guardado como fin del flujo de trabajo si este estado comienza una transición.',
                            ],
                        ],
                        'delete' => [
                            'title' => 'Eliminar transición',
                            'buttons' => [
                                'submit' => 'Eliminar',
                                'cancel' => 'Cancelar',
                            ],
                            'messages' => [
                                'confirmation_title' => '¿Seguro que desea eliminar esta transición?',
                                'deleted' => '¡Transition eliminada!'
                            ],
                        ],
                        'add' => [
                            'title' => 'Agregar Transición',
                            'form' => [
                                'status_from' => 'Del estado',
                                'status_to' => 'Al estado',
                                'status_from_color' => 'Color de procedencia',
                                'status_to_color' => 'Color de destino',
                                'submit' => 'Agregar',
                                'cancel' => 'Cancelar',
                            ],
                            'messages' => [
                                'duplicated' => '¡La transición ya existe!',
                                'submitted' => '¡Transición creada!'
                            ],
                        ],
                        'add_status' => [
                            'title' => 'Agregar Estado',
                            'form' => [
                                'name' => 'Nombre',
                                'color' => 'Color',
                                'is_end' => 'Finalizar Flujo de Trabajo',
                                'submit' => 'Agregar',
                                'cancel' => 'Cancelar',
                            ],
                            'messages' => [
                                'duplicated' => '¡El estado ya existe!',
                                'submitted' => '¡Estado creado!'
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'permissions' => [
            'title' => 'Permiso del flujo de trabajo',
            'model' => 'Permiso',
            'table' => [
                'role' => 'Rol',
                'models' => 'Transición'
            ],
            'form' => [
                'transition' => 'De :status_from A :status_to'
            ],
            'user-relation' => [
                'title' => 'Permisos del flujo de trabajo',
                'label' => 'permiso',
                'table' => [
                    'workflow' => 'Flujo de Trabajo',
                    'permission' => 'Permiso',
                    'models' => 'Transiciones'
                ],
            ],
        ],
    ],
    'page' => [
        'history' => [
            'title' => 'Historial del flujo de trabajo',
            'table' => [
                'old_status' => 'Estado anterior',
                'new_status' => 'Estado actual',
                'changed_by' => 'Cambiado por',
                'changed_at' => 'Cambiado en',
                'filter' => [
                    'statuses' => 'Estados'
                ],
            ],
            'data' => [
                'date_format' => 'Y-m-d g:i a',
            ],
        ],
    ],
];
