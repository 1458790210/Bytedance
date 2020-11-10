<?php

require_once __DIR__ . '/autoload.php';

class TestClient
{
    private $client;

    public function client($request, $options, $headers = [])
    {
        $this->client = Bytedance\Http\Client::instance();
        $this->client->setHeaders($headers);
        return $this->client->request($request, $options);
    }

    public function getAccessToken()
    {
        $r     = new Bytedance\Request\getAccessToken();
        $forms = [
            'appid'      => '',
            'secret'     => '',
            'grant_type' => 'client_credential',
        ];
        $v     = $this->client($r, $forms);
        return $v;
    }

    public function code2Session()
    {
        $forms = ['code' => '', 'anonymous_code' => ''];
        $r     = new Bytedance\Request\code2Session();
        $v     = $this->client($r, $forms);
        return $v;
    }

    public function setUserStorage()
    {
        $forms = [
            'access_token' => '',
            'openid'       => '',
            'signature'    => '',
            'sig_method'   => 'hmac_sha256',
            'kv_list'      => [],
        ];
        $r     = new Bytedance\Request\setUserStorage();
        $v     = $this->client($r, $forms);
        return $v;
    }

    public function removeUserStorage()
    {
        $forms = [
            'access_token' => '',
            'openid'       => '',
            'signature'    => '',
            'sig_method'   => 'hmac_sha256',
            'kv_list'      => [],
        ];
        $r     = new Bytedance\Request\removeUserStorage();
        $v     = $this->client($r, $forms);
        return $v;
    }

    public function createQRCode()
    {
        $forms = [
            'access_token' => '',
            'appname'      => 'toutiao',
            'path'         => '',
            'width'        => 430,
            'line_color'   => ['r' => 0, 'g' => 0, 'b' => 0],
            'background'   => ['r' => 255, 'g' => 255, 'b' => 255],
            'set_icon'     => false,
        ];
        $r     = new Bytedance\Request\createQRCode();
        $v     = $this->client($r, $forms);
        return $v;
    }

    public function image()
    {
        $forms   = [
            'targets'    => ["ad", "porn", "politics", "disgusting"],
            'tasks'      => [['image' => 'https://image.url']],
            'image'      => '',
            'image_data' => '',
        ];
        $headers = [
            'X-Token' => '',
        ];
        $r       = new Bytedance\Request\image();
        $v       = $this->client($r, $forms, $headers);
        return $v;
    }

    public function antidirt()
    {
        $forms = [
            'tasks'   => [['content' => '你好']],
            'content' => '你好',
        ];

        $headers = [
            'X-Token' => '',
        ];

        $r = new Bytedance\Request\antidirt();
        $v = $this->client($r, $forms, $headers);
        return $v;
    }

    public function notify()
    {
        $forms = [
            'access_token' => '',
            'app_id'       => '',
            'tpl_id'       => '',
            'open_id'      => '',
            'data'         => ['版本号' => 'v1.0'],
            'page'         => 'pages/index?a=b',
        ];

        $r = new Bytedance\Request\notify();
        $v = $this->client($r, $forms);
        return $v;
    }
}

$tester = new TestClient();
//$resp   = $tester->getAccessToken();
//var_dump($resp);
$resp = $tester->antidirt();
var_dump($resp);