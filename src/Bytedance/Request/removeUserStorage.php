<?php

namespace Bytedance\Request;

class removeUserStorage
{
    private $bizContent;
    private $apiParas = array();

    public function getService()
    {
        return '/api/apps/remove_user_storage';
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