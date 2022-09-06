<?php

namespace Be\App\Company\Controller;

use Be\Be;

/**
 * 联系我们
 */
class Contact
{

    /**
     * 联系我们
     *
     * @BeMenu("联系我们")
     * @BeRoute("/contact")
     */
    public function index()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Company.Contact');
        $response->set('configContact', $configContact);

        $response->set('title', $configContact->title);
        $response->set('metaDescription', $configContact->metaDescription);
        $response->set('metaKeywords', $configContact->metaKeywords);

        $response->display();
    }

    /**
     * 谷歌地图
     *
     * @BeRoute("/contact/google-map")
     */
    public function googleMap()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Company.Contact');
        $response->set('configContact', $configContact);

        $response->display();
    }

    /**
     * 百度地图
     *
     * @BeRoute("/contact/baidu-map")
     */
    public function baiduMap()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Company.Contact');
        $response->set('configContact', $configContact);

        $response->display();
    }


}
