<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Link extends Field
{
    public const FORMAT_URL = 'url';
    public const FORMAT_ARRAY = 'array';

    protected $type = 'link';

    protected $return_format = self::FORMAT_ARRAY;


    public function format(string $value)
    {
        $this->validateOptions('format', $value, [self::FORMAT_ARRAY, self::FORMAT_URL]);
        $this->return_format = $value;
        return $this;
    }
}
