<?php

namespace Bytedance\Request;

class notify
{
    private $bizContent;
    private $apiParas = [];

    public function getService()
    {
        return '/api/apps/subscribe_notification/developer/v1/notify';
    }

    public function getType()
    {
        return 'POST';
    }

    public function setBizContent($bizContent)
    {
        $this->bizContent              = $bizContent;
        $this->apiParas['biz_content'] = $bizContent;
    }

    public function getBizContent()
    {
        return $this->bizContent;
    }

    public function getApiParas()
    {
        return $this->apiParas;
    }

}