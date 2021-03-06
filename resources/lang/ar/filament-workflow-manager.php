<?php

return [
    'resources' => [
        'title' => 'سير العمل',
        'workflow' => [
            'table' => [
                'name' => 'الاسم',
                'model' => 'النموذج'
            ],
            'page' => [
                'edit' => [
                    'workflow' => 'إدارة سير العمل'
                ],
                'workflow' => [
                    'heading' => 'انتقالات سير العمل',
                    'actions' => [
                        'add_status' => 'حالة جديدة'
                    ],
                    'modal' => [
                        'edit' => [
                            'title' => 'تعديل الانتقال',
                            'form' => [
                                'status_name' => 'اسم الحالة',
                                'status_color' => 'اللون',
                                'is_end' => 'نهاية سير العمل',
                                'submit' => 'تعديل',
                                'cancel' => 'الغاء',
                            ],
                            'messages' => [
                                'submitted' => 'انتقال مسجل !',
                                'cannot_end_workflow' => 'لا يمكن استخدامه كسير عمل نهائي ، يتم استخدام الحالة اعتبارًا من الحالة!',
                            ],
                        ],
                        'delete' => [
                            'title' => 'حذف الانتقال',
                            'buttons' => [
                                'submit' => 'حذف',
                                'cancel' => 'الغاء',
                            ],
                            'messages' => [
                                'confirmation_title' => 'هل أنت متأكد أنك تريد حذف هذا الانتقال ?',
                                'deleted' => 'تمت إزالة الانتقال !'
                            ],
                        ],
                        'add' => [
                            'title' => 'أضف الانتقال',
                            'form' => [
                                'status_from' => 'من الوضع',
                                'status_to' => 'إلى الوضع',
                                'status_from_color' => 'لون حالة المصدر',
                                'status_to_color' => 'لون حالة الوجهة',
                                'submit' => 'أضف',
                                'cancel' => 'الغاء',
                            ],
                            'messages' => [
                                'duplicated' => 'الانتقال موجود !',
                                'submitted' => 'تمت إضافة الانتقال !'
                            ],
                        ],
                        'add_status' => [
                            'title' => 'أضف الحالة',
                            'form' => [
                                'name' => 'الاسم',
                                'color' => 'اللون',
                                'is_end' => 'نهاية سير العمل',
                                'submit' => 'أضف',
                                'cancel' => 'الغاء',
                            ],
                            'messages' => [
                                'duplicated' => 'الحالة موجودة !',
                                'submitted' => 'تمت إضافة الحالة !'
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'permissions' => [
            'title' => 'أذونات سير العمل',
            'model' => 'الإذن',
            'table' => [
                'role' => 'دور',
                'models' => 'الانتقالات'
            ],
            'form' => [
                'transition' => 'من :status_from الى :status_to'
            ],
            'user-relation' => [
                'title' => 'أذونات سير العمل',
                'label' => 'الإذن',
                'table' => [
                    'workflow' => 'سير العمل',
                    'permission' => 'الإذن',
                    'models' => 'الانتقالات'
                ],
            ],
        ],
    ],
    'page' => [
        'history' => [
            'title' => 'سجل سير العمل',
            'table' => [
                'old_status' => 'الوضع القديم',
                'new_status' => 'الوضع الجديد',
                'changed_by' => 'تم التغيير من قبل',
                'changed_at' => 'تم التغيير في',
                'filter' => [
                    'statuses' => 'الحالات'
                ],
            ],
            'data' => [
                'date_format' => 'Y-m-d H:i:s',
            ],
        ],
    ],
];
