<?php

namespace Be\App\Company\Controller;

use Be\Be;

/**
 * 公告
 */
class Announcement
{

    /**
     * 常见问题
     *
     * @BeMenu("客户评价")
     * @BeRoute("/feedback")
     */
    public function index()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $pageConfig = $response->getPageConfig();
        $response->set('pageConfig', $pageConfig);

        $response->set('title', $pageConfig->title ?: '');
        $response->set('metaDescription', $pageConfig->metaDescription ?: '');
        $response->set('metaKeywords', $pageConfig->metaKeywords ?: '');
        $response->set('pageTitle', $pageConfig->pageTitle ?: ($pageConfig->title ?: ''));

        $response->display();
    }


}
