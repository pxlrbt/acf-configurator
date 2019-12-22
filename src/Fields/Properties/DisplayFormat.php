<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait DisplayFormat
{
    protected $display_format;

    public function displayFormat(string $value)
    {
        $this->display_format = $value;
        return $this;
    }
}