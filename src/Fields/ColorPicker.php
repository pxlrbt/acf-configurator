<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class ColorPicker extends Field
{
    protected $type = 'color_picker';

    protected $default = '#FFFFFF';

    public function default(string $value)
    {
        $this->default = $value;
        return $this;
    }
}
