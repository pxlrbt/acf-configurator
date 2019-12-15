<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Number extends Field
{
    protected $type = 'number';

    protected $default;
    protected $placeholder;
    protected $prepend;
    protected $append;

    protected $min;
    protected $max;
    protected $step;

    /**
     * Set the value of default
     *
     * @param   mixed  $default
     * @return  self
     */
    public function default(string $value)
    {
        $this->default = $value;
        return $this;
    }

    /**
     * Set the value of placeholder
     *
     * @param   mixed  $placeholder
     *
     * @return  self
     */
    public function placeholder(string $value)
    {
        $this->placeholder = $value;
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
