<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats;

trait User
{
    public static $FORMAT_ARRAY = 'array';
    public static $FORMAT_OBJECT = 'object';
    public static $FORMAT_ID = 'id';

    protected $return_format = 'id';

    public function returnFormat(string $value)
    {
        $this->validateOptions('returnFormat', $value, [self::$FORMAT_ID, self::$FORMAT_OBJECT, self::$FORMAT_ARRAY]);
        $this->return_format = $value;
        return $this;
    }
}
