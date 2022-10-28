<?php

namespace Be\App\Company\Service;

use Be\Be;

class Link
{

    /**
     * 获取友情链接
     *
     * @param int $n 数量
     * @return array
     */
    public function getLinks(int $n = 0): array
    {
        $cache = Be::getCache();

        $key = 'Company:Link:Links' . $n;
        $links = $cache->get($key);

        if (!$links) {
            $links = Be::getTable('company_link')
                ->where('is_enable', 1)
                ->limit($n)
                ->getObjects();

            $cache->set($key, $links, 600);
        }

        return $links;
    }



}
