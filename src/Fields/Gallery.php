<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Library;
use pxlrbt\AcfConfigurator\Fields\Properties\MimeTypes;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMax;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMaxDimensions;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMaxSize;

class Gallery extends Field
{
    use Library, MinMax, MinMaxSize, MinMaxDimensions, MimeTypes;

    public static $INSERT_APPEND = 'append';
    public static $INSERT_PREPEND = 'prepend';

    protected $type = 'gallery';

    public function insert(string $value)
    {
        $this->validateOptions('insert', $value, [self::$INSERT_APPEND, self::$INSERT_PREPEND]);
        $this->insert = $value;
        return $this;
    }
}
