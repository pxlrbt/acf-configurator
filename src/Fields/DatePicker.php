<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use InvalidArgumentException;



class DatePicker extends Field
{
    protected $type = 'date_picker';

    protected $display_format = 'd.m.Y';
    protected $return_format = 'Y-m-d';
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
        if ($value < 0 && $value > 6) {
            throw new InvalidArgumentException('firstDay must be between 0 and 6. 0 = Sunday, 6 = Saturday');
        }

        $this->first_day = $value;
        return $this;
    }
}
