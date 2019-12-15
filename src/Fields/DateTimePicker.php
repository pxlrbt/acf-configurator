<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class DateTimePicker extends Field
{
    protected $type = 'date_time_picker';

    protected $display_format = 'd.m.Y, H:i:s';
    protected $return_format = 'Y-m-d H-i-s';
    protected $first_day = 1;

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

    public function firstDay(int $value)
    {
        // @TODO: Add validation
        $this->first_day = $value;
        return $this;
    }
}
