<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Placeholder
{
    protected $placeholder;

     /**
     * Set the value of placeholder
     *
     * @param   mixed  $placeholder
     *
     * @return  self
     */
    public function placeholder(string $value) : self
    {
        $this->placeholder = $value;
        return $this;
    }
}
