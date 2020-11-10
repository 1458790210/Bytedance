<?php

namespace Bytedance\Request;

class getAccessToken
{
    public function getService()
    {
        return '/api/apps/token';
    }

    public function getType()
    {
        return 'GET';
    }

    public function getHeaders()
    {
        return [];
    }
}