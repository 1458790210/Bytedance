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
        $r     = new Bytedance\Request\GetAccessToken();
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
        $r     = new Bytedance\Request\Code2Session();
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
            'kv_list'      => [['key' => 'test', 'value' => ['ttgame' => ['score' => 1]]]],
        ];
        $r     = new Bytedance\Request\SetUserStorage();
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
            'kv_list'      => ["test"],
        ];
        $r     = new Bytedance\Request\RemoveUserStorage();
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
        $r     = new Bytedance\Request\CreateQRCode();
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
        $r       = new Bytedance\Request\Image();
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

        $r = new Bytedance\Request\Antidirt();
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

        $r = new Bytedance\Request\Notify();
        $v = $this->client($r, $forms);
        return $v;
    }
}

$tester = new TestClient();
$resp   = $tester->getAccessToken();
var_dump($resp);