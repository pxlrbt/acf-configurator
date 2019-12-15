<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Range extends Field
{
    protected $type = 'range';

    protected $default;
    protected $min;
    protected $max;
    protected $step;
    protected $prepend;
    protected $append;


    /**
     * Set the value of default
     *
     * @param   mixed  $default
     *
     * @return  self
     */
    public function default(string $value)
    {
        $this->default = $value;
        return $this;
    }

    /**
     * Set the value of prepend
     *
     * @param   mixed  $prepend
     *
     * @return  self
     */
    public function prepend(string $value)
    {
        $this->prepend = $value;
        return $this;
    }

    /**
     * Set the value of append
     *
     * @param   mixed  $append
     *
     * @return  self
     */
    public function append(string $value)
    {
        $this->append = $value;
        return $this;
    }

    /**
     * Set the value of min
     *
     * @param   int  $max
     * @return  self
     */
    public function min(int $value)
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
    public function max(int $value)
    {
        $this->max = $value;
        return $this;
    }

    /**
     * Set the value of step
     *
     * @param   mixed  $step
     * @return  self
     */
    public function step(int $value)
    {
        $this->step = $value;
        return $this;
    }
}
