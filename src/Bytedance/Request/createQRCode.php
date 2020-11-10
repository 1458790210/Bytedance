<?php

namespace Bytedance\Request;

class createQRCode
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