<?php

namespace Bytedance\Request;

class setUserStorage
{
    public function getService()
    {
        return '/api/apps/set_user_storage';
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