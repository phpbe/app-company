<?php

namespace Be\App\Company\Controller;

use Be\App\ControllerException;
use Be\Be;
use Be\Util\Validator;

/**
 * 留言
 */
class Message
{

    /**
     * 提交留言
     *
     * @BeRoute("/message")
     */
    public function write()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $pageConfig = $response->getPageConfig();
        $response->set('pageConfig', $pageConfig);

        $response->set('title', $pageConfig->title ?: '');
        $response->set('metaDescription', $pageConfig->metaDescription ?: '');
        $response->set('metaKeywords', $pageConfig->metaKeywords ?: '');
        $response->set('pageTitle', $pageConfig->pageTitle ?: ($pageConfig->title ?: ''));

        $response->display();
    }

    /**
     * 提交留言
     *
     * @BeRoute("/message/save")
     */
    public function save()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();
        try {
            $tupleMessage = Be::getTuple('company_message');

            $pageUrl = $request->post('page_url', '');
            if (mb_strlen($pageUrl) > 300) {
                $pageUrl = mb_substr($pageUrl, 0, 300);
            }
            $tupleMessage->page_url = $pageUrl;

            $pageTitle = $request->post('page_title', '');
            if (mb_strlen($pageTitle) > 300) {
                $pageTitle = mb_substr($pageTitle, 0, 300);
            }
            $tupleMessage->page_title = $pageTitle;

            $name = $request->post('name', '');
            if (!is_string($name)) {
                $name = '';
            }
            $name = trim($name);
            if (mb_strlen($name) > 60) {
                throw new ControllerException('名字最大长度60位！');
            }
            $tupleMessage->name = $name;

            $email = $request->post('email', '');
            if (!is_string($email)) {
                $email = '';
            }
            $email = trim($email);
            if ($email && !Validator::isEmail($email)) {
                throw new ControllerException('邮箱格式不对！');
            }
            if (mb_strlen($name) > 60) {
                throw new ControllerException('邮箱最大长度60位！');
            }
            $tupleMessage->email = $email;

            $mobile = $request->post('mobile', '');
            if (!is_string($mobile)) {
                $mobile = '';
            }
            $mobile = trim($mobile);
            if (mb_strlen($mobile) > 20) {
                throw new ControllerException('手机号最大长度20位！');
            }
            $tupleMessage->mobile = $mobile;

            $content = $request->post('content', '');
            if (!is_string($content)) {
                $content = '';
            }
            $content = trim($content);
            if ($content === '') {
                throw new ControllerException('请输入肉容！');
            }
            if (mb_strlen($mobile) > 500) {
                throw new ControllerException('肉容最大长度500位！');
            }
            $tupleMessage->content = $content;

            $tupleMessage->ip = $request->getIp();
            $tupleMessage->create_time = date('Y-m-d H:i:s');
            $tupleMessage->insert();

            $response->set('success', true);
            $response->set('message', '您的留言已提交！');
            $response->json();
        } catch (\Throwable $t) {
            $response->set('success', false);
            $response->set('message', $t->getMessage());
            $response->json();
        }
    }

}
