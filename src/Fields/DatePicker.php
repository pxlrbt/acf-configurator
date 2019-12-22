<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DisplayFormat;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Plain as ReturnFormatPlain;

class DatePicker extends Field
{
    use DisplayFormat, ReturnFormatPlain;

    protected $type = 'date_picker';
}
