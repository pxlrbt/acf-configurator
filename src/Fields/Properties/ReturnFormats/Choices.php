<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats;

trait Choices
{
    public static $FORMAT_LABEL = 'label';
    public static $FORMAT_VALUE = 'value';
    public static $FORMAT_ARRAY = 'array';

    protected $return_format = 'id';

    public function returnFormat(string $value)
    {
        $this->validateOptions('returnFormat', $value, [self::$FORMAT_ARRAY, self::$FORMAT_LABEL, self::$FORMAT_VALUE]);
        $this->return_format = $value;
        return $this;
    }
}
