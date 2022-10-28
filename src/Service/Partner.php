<?php

namespace Be\App\Company\Service;

use Be\Be;

class Partner
{

    /**
     * 获取合作伙伴
     *
     * @param int $n 数量
     * @return array
     */
    public function getPartners(int $n = 0): array
    {
        $cache = Be::getCache();

        $key = 'Company:Partner:Partners' . $n;
        $partners = $cache->get($key);

        if (!$partners) {
            $partners = Be::getTable('company_partner')
                ->where('is_enable', 1)
                ->limit($n)
                ->getObjects();

            $cache->set($key, $partners, 600);
        }

        return $partners;
    }



}
