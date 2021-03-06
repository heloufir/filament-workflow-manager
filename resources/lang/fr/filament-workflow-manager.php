<?php

return [
    'resources' => [
        'title' => 'Flux de travail',
        'workflow' => [
            'table' => [
                'name' => 'Nom',
                'model' => 'Modèle'
            ],
            'page' => [
                'edit' => [
                    'workflow' => 'Gérer le flux de travail'
                ],
                'workflow' => [
                    'heading' => 'Transitions de flux de travail',
                    'actions' => [
                        'add_status' => 'Nouveau statut'
                    ],
                    'modal' => [
                        'edit' => [
                            'title' => 'Modifier la transition',
                            'form' => [
                                'status_name' => 'Nom du statut',
                                'status_color' => 'Couleur',
                                'is_end' => 'Fin du flux de travail',
                                'submit' => 'Modifier',
                                'cancel' => 'Annuler',
                            ],
                            'messages' => [
                                'submitted' => 'Transition enregistrée !',
                                'cannot_end_workflow' => 'Ne peut pas être utilisé comme workflow de fin, le statut est utilisé comme statut de départ!',
                            ],
                        ],
                        'delete' => [
                            'title' => 'Supprimer la transition',
                            'buttons' => [
                                'submit' => 'Supprimer',
                                'cancel' => 'Annuler',
                            ],
                            'messages' => [
                                'confirmation_title' => 'Voulez-vous vraiment supprimer cette transition ?',
                                'deleted' => 'Transition supprimée !'
                            ],
                        ],
                        'add' => [
                            'title' => 'Ajouter une transition',
                            'form' => [
                                'status_from' => 'Depuis le statut',
                                'status_to' => 'Vers le statut',
                                'status_from_color' => 'Couleur du statut source',
                                'status_to_color' => 'Couleur du statut destination',
                                'submit' => 'Ajouter',
                                'cancel' => 'Annuler',
                            ],
                            'messages' => [
                                'duplicated' => 'La transition existe déjà !',
                                'submitted' => 'Transition ajoutée !'
                            ],
                        ],
                        'add_status' => [
                            'title' => 'Ajouter un statut',
                            'form' => [
                                'name' => 'Nom',
                                'color' => 'Couleur',
                                'is_end' => 'Fin du flux de travail',
                                'submit' => 'Ajouter',
                                'cancel' => 'Annuler',
                            ],
                            'messages' => [
                                'duplicated' => 'Le statut existe déjà !',
                                'submitted' => 'Status ajoutée !'
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'permissions' => [
            'title' => 'Permissions du flux de travail',
            'model' => 'Permission',
            'table' => [
                'role' => 'Rôle',
                'models' => 'Transitions'
            ],
            'form' => [
                'transition' => 'De :status_from A :status_to'
            ],
            'user-relation' => [
                'title' => 'Permissions du flux de travail',
                'label' => 'permission',
                'table' => [
                    'workflow' => 'Flux de travail',
                    'permission' => 'Permission',
                    'models' => 'Transitions'
                ],
            ],
        ],
    ],
    'page' => [
        'history' => [
            'title' => 'Historique du flux de travail',
            'table' => [
                'old_status' => 'Ancien statut',
                'new_status' => 'Nouveau statut',
                'changed_by' => 'Modifié par',
                'changed_at' => 'Modifié le',
                'filter' => [
                    'statuses' => 'Statuts'
                ],
            ],
            'data' => [
                'date_format' => 'Y-m-d H:i:s',
            ],
        ],
    ],
];
