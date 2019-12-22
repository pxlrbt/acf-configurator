<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\AppendPrepend;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMax;
use pxlrbt\AcfConfigurator\Fields\Properties\Placeholder;
use pxlrbt\AcfConfigurator\Fields\Properties\Step;

class Number extends Field
{
    use DefaultValue, Placeholder, AppendPrepend, MinMax, Step;

    protected $type = 'number';
}
