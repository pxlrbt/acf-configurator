<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Choices;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;
use pxlrbt\AcfConfigurator\Fields\Properties\Multiple;
use pxlrbt\AcfConfigurator\Fields\Properties\Nullable;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Choices as ReturnFormatChoices;

class Select extends Field
{
    use Choices, DefaultValue, Nullable, Multiple, ReturnFormatChoices;

    protected $type = 'select';
    protected $ui;

    public function select2(bool $value) : self
    {
        $this->ui = $value;
        return $this;
    }
}
