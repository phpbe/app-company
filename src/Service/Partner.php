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

        $key = 'Company:Partners';
        $partners = $cache->get($key);

        if (!$partners) {
            $table =  Be::getTable('company_partner');
            $table->where('is_delete', 0);
            $table->where('is_enable', 1);
            $partners = $table->getObjects();
            $cache->set($key, $partners, 600);
        }

        if ($n > 0 && $n < count($partners)) {
            ;$partners = array_slice($partners, 0, $n);
        }

        return $partners;
    }



}
