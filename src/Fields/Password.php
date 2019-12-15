<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Password extends Field
{
    protected $type = 'password';

    /* (string) Appears within the input. Defaults to '' */
	protected $placeholder;

	/* (string) Appears before the input. Defaults to '' */
	protected $prepend;

	/* (string) Appears after the input. Defaults to '' */
    protected $append;

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
}
