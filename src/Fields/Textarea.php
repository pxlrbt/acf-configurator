<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;
use pxlrbt\AcfConfigurator\Fields\Properties\Newlines;
use pxlrbt\AcfConfigurator\Fields\Properties\Placeholder;
use pxlrbt\AcfConfigurator\Fields\Properties\TextProperties;

class Textarea extends Field
{
    use DefaultValue, Newlines, Placeholder, TextProperties;

    protected $type = 'textarea';
    protected $rows = 8;

    /**
     * Set the number of rows
     *
     * @param   mixed  $rows
     *
     * @return  self
     */
    public function rows(int $value)
    {
        $this->rows = $value;
        return $this;
    }
}
