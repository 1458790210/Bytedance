<?php

namespace Bytedance\Request;

class GetAccessToken
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