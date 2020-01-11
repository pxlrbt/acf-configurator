<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;


trait AppendPrepend
{
	protected $prepend;
    protected $append;

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
