<?php

namespace Be\App\Company\Service;

use Be\Be;

class Team
{

    /**
     * 获取团队列表
     *
     * @param int $n 数量
     * @return array
     */
    public function getMembers(int $n = 0): array
    {
        $cache = Be::getCache();

        $key = 'Company:Team:Members' . $n;
        $members = $cache->get($key);

        if (!$members) {
            $members = Be::getTable('company_team')
                ->where('is_enable', 1)
                ->getObjects();
        }

        return $members;
    }



}
