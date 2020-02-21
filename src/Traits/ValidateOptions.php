<?php

namespace pxlrbt\AcfConfigurator\Traits;

use InvalidArgumentException;

trait ValidateOptions
{
    /**
     * Validate options for a given value.
     * Trows an exception of value is not valid.
     *
     * @param string $name
     * @param string $value
     * @param array $options
     * @return void
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    protected function validateOptions(string $name, string $value, array $options)
    {
        if (!in_array($value, $options)) {
            throw new InvalidArgumentException('Attribute ' . $name . ' must be one of ' . implode(', ', $options));
        }
    }
}
