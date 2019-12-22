<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Choices;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;
use pxlrbt\AcfConfigurator\Fields\Properties\Nullable;
use pxlrbt\AcfConfigurator\Fields\Properties\Layouts\Choices as LayoutChoices;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Choices as ReturnFormatChoices;

class Radio extends Field
{
    use Choices, DefaultValue, LayoutChoices, Nullable, ReturnFormatChoices;

    protected $type = 'radio';
    protected $other_choice = false;

    public function otherChoice(bool $value) : self
    {
        $this->other_choice = $value;
        return $this;
    }
}
