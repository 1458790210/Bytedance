<?php

namespace Bytedance\Http;

class Response
{
    /**
     * Store the HTTP header information.
     */
    public $headers;

    /**
     * Store the SimpleXML response body.
     */
    public $body;

    /**
     * Store the HTTP response code.
     */
    public $status;

    public function __construct($headers, $body, $status = null)
    {
        $this->headers = $headers;
        $this->body = $body;
        $this->status = $status;

        return $this;
    }

    public function isOK($codes = array(200, 201, 204, 206))
    {
        if (is_array($codes)) {
            return in_array($this->status, $codes);
        }

        return $this->status === $codes;
    }
}
