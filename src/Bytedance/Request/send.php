<?php

namespace Bytedance\Request;

class send
{
    private $bizContent;
    private $apiParas = array();

    public function getService()
    {
        return '/api/apps/game/template/send';
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