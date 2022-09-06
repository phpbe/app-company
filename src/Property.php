<?php

namespace Be\App\Company;


class Property extends \Be\App\Property
{

    protected string $label = '公司';
    protected string $icon = 'el-icon-office-building';
    protected string $description = '公司（公司网站、企业站）';

    public function __construct() {
        parent::__construct(__FILE__);
    }

}
