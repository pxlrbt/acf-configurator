<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait DefaultValue
{
    protected $default_value;

    /**
     * Set a default value used by ACF if no value has yet been saved
     *
     * @param string $default
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function default(string $default) : self
    {
        $this->default_value = $default;
        return $this;
    }
}
