<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;
use pxlrbt\AcfConfigurator\Fields\Properties\Layouts\Choices as LayoutChoices;
use pxlrbt\AcfConfigurator\Fields\Properties\Nullable;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Choices as ReturnFormatChoices;

class ButtonGroup extends Field
{
    use DefaultValue, LayoutChoices, Nullable, ReturnFormatChoices;

    protected $type = 'button_group';
}
