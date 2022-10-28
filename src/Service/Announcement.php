<?php

namespace Be\App\Company\Service;

use Be\Be;

class Announcement
{

    /**
     * 获取公告
     *
     * @param int $n 数量
     * @return array
     */
    public function getAnnouncements(int $n = 0): array
    {
        $cache = Be::getCache();

        $key = 'Company:Announcement:Announcements' . $n;
        $announcements = $cache->get($key);

        if (!$announcements) {
            $announcements = Be::getTable('company_announcement')
                ->where('is_enable', 1)
                ->limit($n)
                ->getObjects();

            $cache->set($key, $announcements, 600);
        }

        return $announcements;
    }



}
