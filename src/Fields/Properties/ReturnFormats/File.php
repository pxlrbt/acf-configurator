<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats;

trait File
{
    public static $FORMAT_ID = 'id';
    public static $FORMAT_ARRAY = 'array';
    public static $FORMAT_URL = 'url';

    protected $return_format = 'id';

    /**
     * Set the value of format
     *
     * @param   string  $format
     * @return  self
     */
    public function returnFormat(string $value)
    {
        $this->validateOptions('returnFormat', $value, [self::$FORMAT_ID, self::$FORMAT_ARRAY, self::$FORMAT_URL]);
        $this->return_format = $value;
        return $this;
    }
}