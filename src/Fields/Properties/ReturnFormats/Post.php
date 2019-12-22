<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats;

trait Post
{
    public static $FORMAT_OBJECT = 'object';
    public static $FORMAT_ID = 'id';

    protected $return_format = 'object';

    public function returnFormat(string $value)
    {
        $this->validateOptions('returnFormat', $value, [self::$FORMAT_ID, self::$FORMAT_OBJECT]);
        $this->return_format = $value;
        return $this;
    }
}
