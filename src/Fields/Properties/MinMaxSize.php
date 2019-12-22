<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait MinMaxSize
{
    protected $min_size;
    protected $max_size;

    public function minSize(int $value) : self
    {
        $this->min_size = $value;
        return $this;
    }

    public function maxSize(int $value) : self
    {
        $this->max_size = $value;
        return $this;
    }
}
