<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DisplayFormat;
use pxlrbt\AcfConfigurator\Fields\Properties\FirstDay;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Plain as ReturnFormatPlain;

class DateTimePicker extends Field
{
    use DisplayFormat, FirstDay, ReturnFormatPlain;

    protected $type = 'date_time_picker';
}
