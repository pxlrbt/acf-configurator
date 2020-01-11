<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Choices;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;
use pxlrbt\AcfConfigurator\Fields\Properties\Layouts\Choices as LayoutChoices;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Choices as ReturnFormatChoices;

class Checkbox extends Field
{
    use Choices, DefaultValue, LayoutChoices, ReturnFormatChoices;

    protected $type = 'checkbox';

    protected $allow_custom = false;
    protected $toggle = false;

    public function allowCustom(bool $value)
    {
        $this->allow_custom = $value;
        return $this;
    }

    public function toggle(bool $value)
    {
        $this->toggle = $value;
        return $this;
    }
}
