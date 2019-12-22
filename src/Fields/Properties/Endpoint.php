<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Endpoint
{
    protected $endpoint = false;

    public function endpoint(string $value)
    {
        $this->endpoint = $value;
        return $this;
    }
}
