<?php

namespace Be\App\Company\Controller\Admin;

use Be\App\System\Controller\Admin\Auth;
use Be\Be;

/**
 * @BeMenuGroup("控制台", icon="el-icon-monitor", ordering="99")
 * @BePermissionGroup("控制台",  ordering="99")
 */
class Config extends Auth
{

    /**
     * @BeMenu("参数", icon="el-icon-setting", ordering="99.1")
     * @BePermission("参数", ordering="99.1")
     */
    public function dashboard()
    {
        Be::getAdminPlugin('Config')->setting(['appName' => 'Company', 'title' => '参数'])->execute();
    }


}