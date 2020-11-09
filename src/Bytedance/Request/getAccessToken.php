<?php

namespace Bytedance\Request;

class getAccessToken
{
    private $bizContent;
    private $apiParas = array();

    public function getService()
    {
        return '/api/apps/token';
    }

    public function getType()
    {
        return 'GET';
    }

    public function setBizContent($bizContent)
    {
        $this->bizContent = $bizContent;
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