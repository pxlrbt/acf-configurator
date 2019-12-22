<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats;

trait Plain
{
    protected $return_format;

    public function returnFormat(string $value)
    {
        $this->return_format = $value;
        return $this;
    }
}