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
     */
    public static function make(...$args)
    {
        return new static(...$args);
    }
}
