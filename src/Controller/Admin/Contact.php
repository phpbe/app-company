<?php
namespace Be\App\Company\Controller\Admin;

use Be\Be;

/**
 * @BeMenuGroup("联系我们", ordering="1", icon="el-icon-map-location")
 * @BePermissionGroup("联系我们", ordering="1")
 */
class Contact
{

    /**
     * 地址信息 - 设置
     *
     * @BeMenu("地址信息", ordering="1.1", icon="el-icon-map-location")
     * @BePermission("地址信息", ordering="1.1")
     */
    public function config()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();
        if ($request->isAjax()) {
            try {
                Be::getService('App.Contact.Admin.Contact')->edit($request->json('formData'));
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

    /**
     * 地址信息 - 设置
     * @BePermission("地址信息", ordering="1.1")
     */
	public function googleMap()
	{
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Contact.Contact');
        $response->set('configContact', $configContact);

        $response->display();
	}

    /**
     * 地址信息 - 设置
     *
     * @BePermission("地址信息", ordering="1.1")
     */
	public function baiduMap()
	{
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Contact.Contact');
        $response->set('configContact', $configContact);

        $response->display();
	}


	
}