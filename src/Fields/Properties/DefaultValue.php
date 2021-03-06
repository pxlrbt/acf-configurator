<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait DefaultValue
{
    protected $default_value;

    /**
     * Set a default value used by ACF if no value has yet been saved
     *
     * @param string $default
     * @return static
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    public function default(string $default)
    {
        $this->default_value = $default;
        return $this;
    }
}
