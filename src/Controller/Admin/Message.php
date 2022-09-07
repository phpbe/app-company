<?php

namespace Be\App\Company\Controller\Admin;

use Be\AdminPlugin\Form\Item\FormItemDatePickerRange;
use Be\AdminPlugin\Table\Item\TableItemSelection;
use Be\AdminPlugin\Toolbar\Item\ToolbarItemDropDown;
use Be\Be;

/**
 * @BeMenuGroup("联系我们")
 * @BePermissionGroup("联系我们")
 */
class Message
{

    /**
     * 留言
     *
     * @BeMenu("留言", ordering="2.2", icon="el-icon-message")
     * @BePermission("留言", ordering="2.2")
     */
    public function messages()
    {
        Be::getAdminPlugin('Curd')->setting([

            'label' => '留言',
            'table' => 'company_contact_message',

            'grid' => [
                'title' => '留言列表',

                'orderBy' => 'create_time',
                'orderByDir' => 'DESC',

                'form' => [
                    'items' => [
                        [
                            'name' => 'name',
                            'label' => '名称',
                        ],
                        [
                            'name' => 'email',
                            'label' => '邮箱',
                        ],
                        [
                            'name' => 'create_time',
                            'label' => '时间范围',
                            'driver' => FormItemDatePickerRange::class
                        ],
                    ],
                ],

                'titleToolbar' => [
                    'items' => [
                        [
                            'label' => '导出',
                            'driver' => ToolbarItemDropDown::class,
                            'ui' => [
                                'icon' => 'el-icon-download',
                            ],
                            'menus' => [
                                [
                                    'label' => 'CSV',
                                    'task' => 'export',
                                    'postData' => [
                                        'driver' => 'csv',
                                    ],
                                    'target' => 'blank',
                                ],
                                [
                                    'label' => 'EXCEL',
                                    'task' => 'export',
                                    'postData' => [
                                        'driver' => 'excel',
                                    ],
                                    'target' => 'blank',
                                ],
                            ]
                        ],
                    ]
                ],

                'tableToolbar' => [
                    'items' => [
                        [
                            'label' => '批量删除',
                            'task' => 'delete',
                            'target' => 'ajax',
                            'confirm' => '确认要删除吗？',
                            'ui' => [
                                'icon' => 'el-icon-delete',
                                'type' => 'danger'
                            ]
                        ],
                    ]
                ],

                'table' => [

                    // 未指定时取表的所有字段
                    'items' => [
                        [
                            'driver' => TableItemSelection::class,
                            'width' => '50',
                        ],
                        [
                            'name' => 'name',
                            'label' => '名称',
                        ],
                        [
                            'name' => 'email',
                            'label' => '邮箱',
                        ],
                        [
                            'name' => 'mobile',
                            'label' => '手机号',
                        ],
                        [
                            'name' => 'content',
                            'label' => '内容',
                            'value' => function ($row) {
                                return \Be\Util\Str\Formatter::limit($row['content'], 60);
                            }
                        ],
                        [
                            'name' => 'ip',
                            'label' => 'IP',
                            'value' => function ($row) {
                                return $row['ip'] . '(' . Be::getLib('Ip')->convert($row['ip']) . ')';
                            }
                        ],
                        [
                            'name' => 'create_time',
                            'label' => '创建时间',
                            'width' => '180',
                            'sortable' => true,
                        ],
                    ],
                    'operation' => [
                        'label' => '操作',
                        'width' => '180',
                        'items' => [
                            [
                                'label' => '',
                                'tooltip' => '查看',
                                'task' => 'detail',
                                'target' => 'drawer',
                                'ui' => [
                                    'type' => 'success',
                                    ':underline' => 'false',
                                    'style' => 'font-size: 20px;',
                                ],
                                'icon' => 'el-icon-view',
                            ],
                            [
                                'label' => '',
                                'tooltip' => '删除',
                                'task' => 'delete',
                                'confirm' => '确认要删除么？',
                                'target' => 'ajax',
                                'ui' => [
                                    'type' => 'danger',
                                    ':underline' => 'false',
                                    'style' => 'font-size: 20px;',
                                ],
                                'icon' => 'el-icon-delete',
                            ],
                        ]
                    ],
                ],
            ],

            'detail' => [
                'title' => '留言详情',
                'form' => [
                    'items' => [
                        [
                            'name' => 'id',
                            'label' => 'ID',
                        ],
                        [
                            'name' => 'name',
                            'label' => '名称',
                        ],
                        [
                            'name' => 'email',
                            'label' => '邮箱',
                        ],
                        [
                            'name' => 'mobile',
                            'label' => '手机号',
                        ],
                        [
                            'name' => 'content',
                            'label' => '内容',
                        ],
                        [
                            'name' => 'page_url',
                            'label' => '页面网址',
                        ],
                        [
                            'name' => 'page_title',
                            'label' => '页面标题',
                        ],
                        [
                            'name' => 'ip',
                            'label' => 'IP',
                            'value' => function ($row) {
                                return $row['ip'] . '(' . Be::getLib('Ip')->convert($row['ip']) . ')';
                            }
                        ],
                        [
                            'name' => 'create_time',
                            'label' => '创建时间',
                        ],
                    ]
                ],
            ],

        ])->execute();
    }


}