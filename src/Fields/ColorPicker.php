<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;

class ColorPicker extends Field
{
    use DefaultValue;

    protected $type = 'color_picker';
}
