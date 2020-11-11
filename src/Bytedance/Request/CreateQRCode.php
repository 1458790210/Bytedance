<?php

namespace Bytedance\Request;

class CreateQRCode
{
    public function getService()
    {
        return '/api/apps/qrcode';
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