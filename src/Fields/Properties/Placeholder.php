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
     * @return  static
     */
    public function placeholder(string $value)
    {
        $this->placeholder = $value;
        return $this;
    }
}
