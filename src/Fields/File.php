<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Library;
use pxlrbt\AcfConfigurator\Fields\Properties\MimeTypes;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMaxSize;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\File as ReturnFormatFile;

class File extends Field
{
    use Library, MinMaxSize, MimeTypes, ReturnFormatFile;

    protected $type = 'file';
}
