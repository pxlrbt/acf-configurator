<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Nullable
{
    protected $allow_null = false;

    public function nullable(bool $value)
    {
        $this->allow_null = $value;
        return $this;
    }
}
