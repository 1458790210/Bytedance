<?php

namespace Bytedance\Http;

class Config
{
    public static $config = [];
    public static $host = 'https://developer.toutiao.com';

    public static function getConfig()
    {
        if (!empty(self::$config['apiKey'])) {
            return self::$config;
        }

        if (is_file('.env')) {
            $env = parse_ini_file('.env', true);

            foreach ($env as $key => $val) {
                $name = strtoupper($key);

                if (is_array($val)) {
                    foreach ($val as $k => $v) {
                        $item = $name . '_' . strtoupper($k);
                        putenv("$item=$v");
                    }
                } else {
                    putenv("$name=$val");
                }
            }
        }

        self::$config = ['apiKey' => getenv('apiKey'), 'apiSecret' => getenv('apiSecret')];
        return self::$config;
    }
}