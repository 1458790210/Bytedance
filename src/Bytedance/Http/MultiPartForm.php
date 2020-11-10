<?php

namespace Bytedance\Http;

class MultiPartForm
{
    public $forms = [];

    private $files = [];

    private $boundary = '';

    public function __construct($forms = null, $files = null)
    {
        if (!empty($forms)) {
            $this->forms = $forms;
        }

        if (!empty($files)) {
            $this->files = $files;
        }
    }

    public function addForm($options)
    {
        $this->forms = array_merge($this->forms, $options);
    }

    public function __toString()
    {
        $parts         = [];
        $part_boundary = "--" . $this->boundary;

        foreach ($this->forms as list($key, $val)) {
            $one = [$part_boundary, sprintf('Content-Disposition: form-data; name="%s"', $key), '', $val];
            array_push($parts, $one);
        }

        foreach ($this->files as list($field, $name, $mimetype, $content)) {
            $one = [
                $part_boundary,
                sprintf('Content-Disposition: file; name="%s"; filename="%s"', $field, $name),
                sprintf('Content-Type: %s', $mimetype),
                '',
                $content,
            ];
            array_push($parts, $one);
        }

        $parts        = array_map(function ($val) {
            return join($val, "\r\n");
        }, $parts);
        $end_boundary = $part_boundary . "--";
        array_push($parts, $end_boundary);

        return join($parts, "\r\n");
    }
}
