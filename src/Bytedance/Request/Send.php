<?php

namespace Bytedance\Request;

class Send
{
    public function getService()
    {
        return '/api/apps/game/template/send';
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