<?php

namespace Be\App\Company\Service;

use Be\Be;

class Feedback
{

    /**
     * 获取客户评价
     *
     * @param int $n 数量
     * @return array
     */
    public function getFeedbacks(int $n = 0): array
    {
        $cache = Be::getCache();

        $key = 'Company:Feedback:Feedbacks' . $n;
        $feedbacks = $cache->get($key);

        if (!$feedbacks) {
            $feedbacks = Be::getTable('company_feedback')
                ->where('is_enable', 1)
                ->limit($n)
                ->getObjects();

            $cache->set($key, $feedbacks, 600);
        }

        return $feedbacks;
    }



}
