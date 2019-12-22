<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;
use pxlrbt\AcfConfigurator\Fields\Properties\Placeholder;

class URL extends Field
{
    use DefaultValue, Placeholder;

    protected $type = 'url';
}
