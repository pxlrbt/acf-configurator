<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

use InvalidArgumentException;

trait FirstDay
{
    protected $first_day = 1;

    public function firstDay(int $value)
    {
        if ($value < 0 && $value > 6) {
            throw new InvalidArgumentException('firstDay must be between 0 and 6. 0 = Sunday, 6 = Saturday');
        }

        $this->first_day = $value;
        return $this;
    }
}
