<?php

namespace Be\App\Company\Config\Page\Home;

class index
{


    /**
     * @BeConfigItem("标题",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageTitle = '';

    /**
     * @BeConfigItem("描述",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageDescription = '';

    /**
     * @BeConfigItem("关键词（用于SEO）",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageKeywords = '';


}
