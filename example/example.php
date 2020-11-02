<?php

require_once __DIR__ . '/autoload.php';

class TestClient
{
    private $client;

    public function client($request, $options)
    {
        $this->client = Bytedance\Http\Client::instance();
        $headers = [
            'Cache-Control' => 'no-cache'
        ];
        $this->client->setHeaders($headers);
        return $this->client->request($request, $options);
    }

    public function test()
    {
        $init = [
            'apiKey'    => '',
            'apiSecret' => ''
        ];
        $forms = ['args' => ''];
        Bytedance\Http\Config::$config = $init;//直接添加配置 或写在env中自动加载
        $r = new Bytedance\Request\getAccessToken();
        $v = $this->client($r, $forms);
        return $v;
    }
}

$tester = new TestClient();
$resp = $tester->test();
var_dump($resp);