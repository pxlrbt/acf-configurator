<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DisplayFormat;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Plain as ReturnFormatPlain;

class TimePicker extends Field
{
    use DisplayFormat, ReturnFormatPlain;

    protected $type = 'time_picker';
}
