<?php

namespace Bytedance\Request;

class Antidirt
{
    public function getService()
    {
        return '/api/v2/tags/text/antidirt';
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