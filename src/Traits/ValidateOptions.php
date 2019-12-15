<?php

namespace pxlrbt\AcfConfigurator\Traits;

use InvalidArgumentException;


trait ValidateOptions
{
    protected function validateOptions($name, $value, $options)
    {
        if (!in_array($value, $options)) {
            throw new InvalidArgumentException('Attribute ' . $name . ' must be one of ' . implode(', ', $options));
        }
    }
}