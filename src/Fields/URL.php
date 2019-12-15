<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class URL extends Field
{
    protected $type = 'url';

    /* (string) Appears within the input. Defaults to '' */
	protected $placeholder = '';

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
}
