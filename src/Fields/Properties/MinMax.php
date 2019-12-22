<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait MinMax
{
    protected $min;
    protected $max;

    /**
     * Set the value of min
     *
     * @param   int  $max
     * @return  self
     */
    public function min(int $value) : self
    {
        $this->min = $value;
        return $this;
    }

    /**
     * Set the value of max
     *
     * @param   int  $max
     * @return  self
     */
    public function max(int $value) : self
    {
        $this->max = $value;
        return $this;
    }
}