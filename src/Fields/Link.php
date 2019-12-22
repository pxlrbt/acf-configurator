<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Link extends Field
{
    public static $FORMAT_URL = 'url';
    public static $FORMAT_ARRAY = 'array';

    protected $type = 'link';

    protected $return_format = 'array';

    public function returnFormat(string $value) : self
    {
        $this->validateOptions('format', $value, [self::$FORMAT_ARRAY, self::$FORMAT_URL]);
        $this->return_format = $value;
        return $this;
    }
}
