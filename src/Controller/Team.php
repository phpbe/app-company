<?php

namespace Be\App\Company\Controller;

use Be\Be;

/**
 * 团队成员
 */
class Team
{

    /**
     * 团队成员
     *
     * @BeMenu("团队成员")
     * @BeRoute("/team")
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
