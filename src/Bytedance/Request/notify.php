<?php

namespace Bytedance\Request;

class notify
{
    public function getService()
    {
        return '/api/apps/subscribe_notification/developer/v1/notify';
    }

    public function getType()
    {
        return 'POST';
    }

    public function getHeaders()
    {
        return [];
    }
}