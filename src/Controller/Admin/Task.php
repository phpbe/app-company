<?php

namespace Be\App\Company\Controller\Admin;

use Be\App\System\Controller\Admin\Auth;
use Be\Be;

/**
 * @BeMenuGroup("控制台")
 * @BePermissionGroup("控制台")
 */
class Task extends Auth
{
    /**
     * @BeMenu("计划任务", icon="el-icon-timer", ordering="99.2")
     * @BePermission("计划任务", ordering="99.2")
     */
    public function dashboard()
    {
        Be::getAdminPlugin('Task')->setting(['appName' => 'Company'])->execute();
    }

}
