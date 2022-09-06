<?php

namespace Be\App\Company\Controller;

use Be\Be;

/**
 * 首页
 */
class Home
{

    /**
     * 首页
     *
     * @BeMenu("首页")
     * @BeRoute("/company/home")
     */
    public function index()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $page = Be::getConfig('App.Company.Page.Home.index');
        $response->set('title', $page->pageTitle ?? '');
        $response->set('metaKeywords', $page->pageDescription ?? '');
        $response->set('metaDescription', $page->pageKeywords ?? '');

        $response->display();
    }


}
