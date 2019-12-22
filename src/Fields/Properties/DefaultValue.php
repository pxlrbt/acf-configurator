<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait DefaultValue
{
    protected $default;

    public function default(string $value)
    {
        $this->default = $value;
        return $this;
    }
}
