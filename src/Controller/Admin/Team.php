<?php
namespace Be\App\Company\Controller\Admin;

use Be\Be;

/**
 * @BeMenuGroup("团队", ordering="1", icon="el-icon-map-location")
 * @BePermissionGroup("团队", ordering="1")
 */
class Team
{

    /**
     * 团队 - 设置
     *
     * @BeMenu("地址信息", ordering="1.1", icon="el-icon-map-location")
     * @BePermission("地址信息", ordering="1.1")
     */
    public function members()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();
        if ($request->isAjax()) {
            try {
                Be::getService('App.Company.Admin.Team')->edit($request->json('formData'));
                $response->set('success', true);
                $response->set('message', '保存地址信息成功！');
                $response->json();
            } catch (\Throwable $t) {
                $response->set('success', false);
                $response->set('message', $t->getMessage());
                $response->json();
            }
        } else {
            $configContact = Be::getConfig('App.Contact.Contact');
            $response->set('configContact', $configContact);

            $response->set('title', '地址信息');

            $response->display();
        }
	}


	
}