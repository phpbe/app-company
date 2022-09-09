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

        $pageConfig = $response->getPageConfig();
        $response->set('pageConfig', $pageConfig);

        $response->set('title', $pageConfig->title ?: '');
        $response->set('metaDescription', $pageConfig->metaDescription ?: '');
        $response->set('metaKeywords', $pageConfig->metaKeywords ?: '');
        $response->set('pageTitle', $pageConfig->pageTitle ?: ($pageConfig->title ?: ''));

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
