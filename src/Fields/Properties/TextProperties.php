<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait TextProperties
{

    /**
     * Max length for string
     *
     * @var integer
     */
    protected $maxlength;

    /**
     * Is field read only
     *
     * @var boolean
     */
    protected $readonly = false;

    /**
     * Is field disabled
     *
     * @var boolean
     */
    protected $disabled = false;

    /**
     * Set the value of maxlength
     *
     * @param   mixed  $maxlength
     *
     * @return  static
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
     * @return  static
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
     * @return  static
     */
    public function disabled(bool $value)
    {
        $this->disabled = $value;
        return $this;
    }
}