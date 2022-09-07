<?php
namespace Be\App\Company\Controller\Admin;

use Be\AdminPlugin\Detail\Item\DetailItemAvatar;
use Be\AdminPlugin\Detail\Item\DetailItemSwitch;
use Be\AdminPlugin\Form\Item\FormItemAvatar;
use Be\AdminPlugin\Form\Item\FormItemSelect;
use Be\AdminPlugin\Form\Item\FormItemStorageImage;
use Be\AdminPlugin\Form\Item\FormItemSwitch;
use Be\AdminPlugin\Table\Item\TableItemAvatar;
use Be\AdminPlugin\Table\Item\TableItemImage;
use Be\AdminPlugin\Table\Item\TableItemLink;
use Be\AdminPlugin\Table\Item\TableItemSelection;
use Be\AdminPlugin\Table\Item\TableItemSwitch;
use Be\AdminPlugin\Toolbar\Item\ToolbarItemDropDown;
use Be\Be;
use Be\Db\Tuple;
use Be\Util\Crypt\Random;

/**
 * @BePermissionGroup("团队", ordering="1")
 */
class Team
{


    /**
     * 团队 - 设置
     *
     * @BeMenu("团队成员", ordering="1.1", icon="el-icon-user-solid")
     * @BePermission("团队成员", ordering="1.1")
     */
    public function members()
    {
        Be::getAdminPlugin('Curd')->setting([
            'label' => '团队成员',
            'table' => 'company_team',
            'grid' => [
                'title' => '团队成员',

                'filter' => [
                    ['is_delete', '=', '0'],
                ],

                'tab' => [
                    'name' => 'is_enable',
                    'value' => Be::getRequest()->request('is_enable', '-1'),
                    'nullValue' => '-1',
                    'counter' => true,
                    'keyValues' => [
                        '-1' => '全部',
                        '1' => '已公开',
                        '0' => '已屏蔽',
                    ],
                ],

                'form' => [
                    'items' => [
                        [
                            'name' => 'name',
                            'label' => '名称',
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

                'titleRightToolbar' => [
                    'items' => [
                        [
                            'label' => '新增团队成员',
                            'task' => 'create',
                            'target' => 'drawer', // 'ajax - ajax请求 / dialog - 对话框窗口 / drawer - 抽屉 / self - 当前页面 / blank - 新页面'
                            'ui' => [
                                'icon' => 'el-icon-plus',
                                'type' => 'primary',
                            ]
                        ],
                    ]
                ],

                'tableToolbar' => [
                    'items' => [
                        [
                            'label' => '批量公开',
                            'task' => 'fieldEdit',
                            'postData' => [
                                'field' => 'is_enable',
                                'value' => '1',
                            ],
                            'target' => 'ajax',
                            'confirm' => '确认要公开吗？',
                            'ui' => [
                                'icon' => 'el-icon-check',
                                'type' => 'success',
                            ]
                        ],
                        [
                            'label' => '批量屏蔽',
                            'task' => 'fieldEdit',
                            'postData' => [
                                'field' => 'is_enable',
                                'value' => '0',
                            ],
                            'target' => 'ajax',
                            'confirm' => '确认要屏蔽吗？',
                            'ui' => [
                                'icon' => 'el-icon-close',
                                'type' => 'warning',
                            ]
                        ],
                        [
                            'label' => '批量删除',
                            'task' => 'fieldEdit',
                            'target' => 'ajax',
                            'confirm' => '确认要删除吗？',
                            'postData' => [
                                'field' => 'is_delete',
                                'value' => '1',
                            ],
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
                            'name' => 'avatar',
                            'label' => '头像',
                            'width' => '90',
                            'align' => 'left',
                            'driver' => TableItemAvatar::class,
                            'value' => function ($row) {
                                if ($row['avatar']) {
                                    return $row['avatar'];
                                } else {
                                    return Be::getProperty('App.Company')->getWwwUrl() . '/images/team/avatar/default.jpg';
                                }
                            },
                            'ui' => [
                                'style' => 'max-width: 60px; max-height: 60px'
                            ],
                        ],
                        [
                            'name' => 'name',
                            'label' => '名称',
                            'align' => 'left',
                            'driver' => TableItemLink::class,
                            'task' => 'detail',
                            'target' => 'drawer',
                        ],
                        [
                            'name' => 'is_enable',
                            'label' => '公开',
                            'driver' => TableItemSwitch::class,
                            'target' => 'ajax',
                            'task' => 'fieldEdit',
                            'width' => '90',
                            'exportValue' => function ($row) {
                                return $row['is_enable'] ? '公开' : '屏蔽';
                            },
                        ],
                    ],

                    'operation' => [
                        'label' => '操作',
                        'width' => '150',
                        'items' => [
                            [
                                'label' => '',
                                'tooltip' => '编辑',
                                'task' => 'edit',
                                'target' => 'drawer',
                                'ui' => [
                                    ':underline' => 'false',
                                    'style' => 'font-size: 20px;',
                                ],
                                'icon' => 'el-icon-edit',
                            ],
                            [
                                'label' => '',
                                'tooltip' => '删除',
                                'task' => 'fieldEdit',
                                'confirm' => '确认要删除么？',
                                'target' => 'ajax',
                                'postData' => [
                                    'field' => 'is_delete',
                                    'value' => 1,
                                ],
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
                'theme' => 'Blank',
                'form' => [
                    'items' => [
                        [
                            'name' => 'id',
                            'label' => 'ID',
                        ],
                        [
                            'name' => 'avatar',
                            'label' => '头像',
                            'driver' => DetailItemAvatar::class,
                        ],
                        [
                            'name' => 'name',
                            'label' => '名称',
                        ],
                        [
                            'name' => 'job',
                            'label' => '职位',
                        ],
                        [
                            'name' => 'im_facebook',
                            'label' => 'Facebook',
                        ],
                        [
                            'name' => 'im_twitter',
                            'label' => 'Twitter',
                        ],
                        [
                            'name' => 'im_instagram',
                            'label' => 'Instagram',
                        ],
                        [
                            'name' => 'im_wechat',
                            'label' => '微信',
                        ],
                        [
                            'name' => 'im_weibo',
                            'label' => '微博',
                        ],
                        [
                            'name' => 'is_enable',
                            'label' => '启用/禁用',
                            'driver' => DetailItemSwitch::class,
                        ],
                        [
                            'name' => 'create_time',
                            'label' => '创建时间',
                        ],
                        [
                            'name' => 'update_time',
                            'label' => '更新时间',
                        ],
                    ]
                ],
            ],

            'create' => [
                'title' => '新增团队成员',
                'theme' => 'Blank',
                'form' => [
                    'items' => [
                        [
                            'name' => 'avatar',
                            'label' => '头像',
                            'driver' => FormItemStorageImage::class,
                        ],
                        [
                            'name' => 'name',
                            'label' => '名称',
                            'required' => true,
                        ],
                        [
                            'name' => 'job',
                            'label' => '职位',
                            'required' => true,
                        ],
                        [
                            'name' => 'im_facebook',
                            'label' => 'Facebook',
                        ],
                        [
                            'name' => 'im_twitter',
                            'label' => 'Twitter',
                        ],
                        [
                            'name' => 'im_instagram',
                            'label' => 'Instagram',
                        ],
                        [
                            'name' => 'im_wechat',
                            'label' => '微信',
                        ],
                        [
                            'name' => 'im_weibo',
                            'label' => '微博',
                        ],
                        [
                            'name' => 'is_enable',
                            'label' => '启用/禁用',
                            'value' => 1,
                            'driver' => FormItemSwitch::class,
                        ],
                    ]
                ],
                'events' => [
                    'before' => function (Tuple &$tuple) {
                        $tuple->create_time = date('Y-m-d H:i:s');
                        $tuple->update_time = date('Y-m-d H:i:s');
                    },
                ],
            ],

            'edit' => [
                'title' => '编辑团队成员',
                'theme' => 'Blank',
                'form' => [
                    'items' => [
                        [
                            'name' => 'avatar',
                            'label' => '头像',
                            'driver' => FormItemStorageImage::class,
                        ],
                        [
                            'name' => 'name',
                            'label' => '名称',
                            'required' => true,
                        ],
                        [
                            'name' => 'job',
                            'label' => '职位',
                            'required' => true,
                        ],
                        [
                            'name' => 'im_facebook',
                            'label' => 'Facebook',
                        ],
                        [
                            'name' => 'im_twitter',
                            'label' => 'Twitter',
                        ],
                        [
                            'name' => 'im_instagram',
                            'label' => 'Instagram',
                        ],
                        [
                            'name' => 'im_wechat',
                            'label' => '微信',
                        ],
                        [
                            'name' => 'im_weibo',
                            'label' => '微博',
                        ],
                        [
                            'name' => 'is_enable',
                            'label' => '启用/禁用',
                            'driver' => FormItemSwitch::class,
                        ],
                    ]
                ],
                'events' => [
                    'before' => function (Tuple &$tuple) {
                        $tuple->update_time = date('Y-m-d H:i:s');
                    }
                ]
            ],

            'fieldEdit' => [
                'events' => [
                    'before' => function ($tuple) {
                        $tuple->update_time = date('Y-m-d H:i:s');
                    },
                ],
            ],

            'export' => [],

        ])->execute();
    }


}