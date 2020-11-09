<?php

namespace Bytedance\Request;

class antidirt
{
    private $bizContent;
    private $apiParas = [];

    public function getService()
    {
        return '/api/v2/tags/text/antidirt';
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