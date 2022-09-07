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

        $configContact = Be::getConfig('App.Company.Contact');
        $response->set('configContact', $configContact);

        $response->set('title', $configContact->title);
        $response->set('metaDescription', $configContact->metaDescription);
        $response->set('metaKeywords', $configContact->metaKeywords);

        $response->display();
    }


}
