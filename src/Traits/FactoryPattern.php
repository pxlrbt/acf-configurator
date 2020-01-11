<?php

namespace pxlrbt\AcfConfigurator\Traits;

trait FactoryPattern
{
    /**
     * Factory function to create a new instance
     *
     * @param array ...$args
     * @return Component
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public static function make(...$args) : self
    {
        return new static(...$args);
    }
}
