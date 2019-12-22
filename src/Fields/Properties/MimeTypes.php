<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait MimeTypes
{
    protected $mime_types;

    public function mimeTypes(string $value)
    {
        $this->mime_types = $value;
        return $this;
    }
}