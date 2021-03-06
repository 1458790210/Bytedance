<?php

namespace Bytedance\Request;

class RemoveUserStorage
{
    public function getService()
    {
        return '/api/apps/remove_user_storage';
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