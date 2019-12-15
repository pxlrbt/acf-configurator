<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class TimePicker extends Field
{
    protected $type = 'time_picker';

    protected $display_format;
    protected $return_format;

    public function displayFormat(string $value)
    {
        $this->display_format = $value;
        return $this;
    }

    public function returnFormat(string $value)
    {
        $this->return_format = $value;
        return $this;
    }
}
