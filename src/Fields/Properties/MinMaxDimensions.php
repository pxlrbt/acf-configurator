<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait MinMaxDimensions
{
    protected $min_width;
    protected $min_height;
    protected $max_width;
    protected $max_height;

    public function minWidth(int $value) : self
    {
        $this->min_width = $value;
        return $this;
    }

    public function maxWidth(int $value) : self
    {
        $this->max_width = $value;
        return $this;
    }

    public function minHeight(int $value) : self
    {
        $this->min_height = $value;
        return $this;
    }

    public function maxHeight(int $value) : self
    {
        $this->max_height = $value;
        return $this;
    }
}
