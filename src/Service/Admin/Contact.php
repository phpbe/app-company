<?php
namespace Be\App\Company\Service\Admin;

use Be\Be;
use Be\Config\ConfigHelper;


class Contact
{


    public function edit($data)
    {
        $configContact = Be::getConfig('App.Company.Contact');
        foreach ($data as $key => $val) {
            if (isset($configContact->$key)) {
                $configContact->$key = $val;
            }
        }
        ConfigHelper::update('App.Company.Contact', $configContact);
	}

}