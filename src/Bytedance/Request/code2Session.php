<?php

namespace Bytedance\Request;

class code2Session
{
    public function getService()
    {
        return '/api/apps/jscode2session';
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