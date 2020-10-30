<?php

namespace Bytedance\Request;

class antidirt
{
    private $bizContent;
    private $apiParas = array();

    public function getService()
    {
        return '/api/v2/tags/text/antidirt';
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