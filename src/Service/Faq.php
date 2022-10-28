<?php

namespace Be\App\Company\Service;

use Be\Be;

class Faq
{

    /**
     * 获取常见问题
     *
     * @param int $n 数量
     * @return array
     */
    public function getQuestions(int $n = 0): array
    {
        $cache = Be::getCache();

        $key = 'Company:Faq:Questions' . $n;
        $questions = $cache->get($key);

        if (!$questions) {
            $questions = Be::getTable('company_faq')
                ->where('is_enable', 1)
                ->limit($n)
                ->getObjects();

            $cache->set($key, $questions, 600);
        }

        return $questions;
    }



}
