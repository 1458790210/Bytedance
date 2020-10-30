<?php

namespace Bytedance\Http;

class MultiPartForm
{
    private $forms = array();

    private $files = array();

    private $boundary = '';

    public function __construct($forms = null, $files = null)
    {
        if (!empty($forms)) {
            $this->forms = $forms;
        }

        if (!empty($files)) {
            $this->files = $files;
        }

        $this->boundary = $this->chooseBoundary();
    }

    public function chooseBoundary()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        $result = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < 15; $i++) {
            $result .= $chars[rand(0, $max)];
        }

        $boundary = sprintf('%s%s%s', '------', 'PhplibFormBoundary', $result);

        return $boundary;
    }

    public function getContentType()
    {
        return sprintf('multipart/form-data; boundary=%s', $this->boundary);
    }

    public function addForm($name, $value)
    {
        array_push($this->forms, [$name, $value]);
    }

    public function addForms($forms)
    {
        foreach ($forms as $key => $value) {
            array_push($this->forms, [$key, $value]);
        }
    }

    public function addFile($field, $name, $content, $mimetype = null)
    {
        if (empty($mimetype)) {
            $mimetype = MimeTypes::getMimetype($name);
        }
        array_push($this->files, [$field, $name, $mimetype, $content]);
    }

    public function __toString()
    {
        $parts = array();
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
                $content
            ];
            array_push($parts, $one);
        }

        $parts = array_map(function ($val) {
            return join($val, "\r\n");
        }, $parts);
        $end_boundary = $part_boundary . "--";
        array_push($parts, $end_boundary);

        return join($parts, "\r\n");
    }
}
