<?php

namespace Bytedance\Request;

class Image
{
    public function getService()
    {
        return '/api/v2/tags/image/';
    }

    public function getType()
    {
        return 'POST';
    }

    public function getHeaders()
    {
        return ['Content-Type' => 'application/json'];
    }
}