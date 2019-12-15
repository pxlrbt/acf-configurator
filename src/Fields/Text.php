<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Text extends Field
{
    protected $type = 'text';

    /* (string) Appears within the input. Defaults to '' */
	protected $placeholder;

	/* (string) Appears before the input. Defaults to '' */
	protected $prepend;

	/* (string) Appears after the input. Defaults to '' */
	protected $append;

	/* (string) Restricts the character limit. Defaults to '' */
	protected $maxlength;

	/* (bool) Makes the input readonly. Defaults to 0 */
	protected $readonly = false;

	/* (bool) Makes the input disabled. Defaults to 0 */
    protected $disabled = false;

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
     * Set the value of maxlength
     *
     * @param   mixed  $maxlength
     *
     * @return  self
     */
    public function maxlength(string $value)
    {
        $this->maxlength = $value;
        return $this;
    }

    /**
     * Set the value of readonly
     *
     * @param   mixed  $readonly
     *
     * @return  self
     */
    public function readonly(bool $value)
    {
        $this->readonly = $value;
        return $this;
    }

    /**
     * Set the value of disabled
     *
     * @param   mixed  $disabled
     *
     * @return  self
     */
    public function disabled(bool $value)
    {
        $this->disabled = $value;
        return $this;
    }
}
