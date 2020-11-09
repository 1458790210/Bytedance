<?php

namespace Bytedance\Request;

class setUserStorage
{
    private $bizContent;
    private $apiParas = [];

    public function getService()
    {
        return '/api/apps/set_user_storage';
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