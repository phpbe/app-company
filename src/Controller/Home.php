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

        $pageConfig = $response->getPageConfig();
        $response->set('pageConfig', $pageConfig);

        $response->set('title', $pageConfig->title ?: '');
        $response->set('metaKeywords', $pageConfig->metaDescription ?: '');
        $response->set('metaDescription', $pageConfig->metaKeywords ?: '');
        $response->set('pageTitle', $pageConfig->pageTitle ?: ($pageConfig->title ?: ''));

        $response->display();
    }


}
