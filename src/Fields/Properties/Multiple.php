<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Multiple
{
    protected $multiple = false;

    public function multiple(bool $value)
    {
        $this->multiple = $value;
        return $this;
    }
}
