<?php

namespace Bytedance\Request;

class image
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