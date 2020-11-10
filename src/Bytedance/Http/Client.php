<?php

namespace Bytedance\Http;

class Client
{
    private $host;

    private $connectTimeout;

    private $socketTimeout;

    private $sslVerification = true;

    private $curlOpts = [];

    private $headers = [];

    private $adapter;

    public static $instance;

    public static function instance()
    {
        if (!static::$instance instanceof static) {
            static::$instance = new static(...func_get_args());
        }
        return static::$instance;
    }

    public function __construct($connectTimeout = 10000, $socketTimeout = 120000)
    {
        $host = trim(trim(Config::$host), "/");

        if (empty($host)) {
            throw new RequestException("host is empty");
        }

        $this->host           = $host;
        $this->connectTimeout = $connectTimeout;
        $this->socketTimeout  = $socketTimeout;
    }

    public function getAdapter()
    {
        $adapter = $this->adapter;
        if (!isset($adapter)) {
            $adapter = new Adapter($this->headers, $this->connectTimeout, $this->socketTimeout);
            $adapter->setCacertLocation(false);
            $adapter->setCurlOpts($this->curlOpts);
            $this->adapter = $adapter;
        }

        return $adapter;
    }

    public function request($request, $options)
    {
        $forms = new MultiPartForm();

        foreach ($options as $key => $value) {
            if (@is_file($value)) {
                $forms->addFile($key, $value, file_get_contents($value));
            } else {
                $forms->addForm($key, $value);
            }
        }

        $adapter = $this->getAdapter();
        //接口名
        $apiMethodName = $request->getService();

        $url   = $this->generateUrl($apiMethodName);
        $quest = $request->getType();

        $this->headers = array_merge($this->headers, $request->getHeaders());

        return $adapter->$quest($url, $forms, $forms->forms, $this->headers);
    }

    public function generateUrl($path)
    {
        return $this->host . '/' . trim($path, '/');
    }

    public function setSocketTimeout($ms)
    {
        $this->socketTimeout = $ms;
    }

    public function setConnectTimeout($ms)
    {
        $this->connectTimeout = $ms;
    }

    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function setSslVerification($ssl)
    {
        $this->sslVerification = $ssl;
    }

    public function setCurlOpts($conf)
    {
        $this->curlOpts = $conf;
    }
}