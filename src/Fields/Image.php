<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Library;
use pxlrbt\AcfConfigurator\Fields\Properties\MimeTypes;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMaxDimensions;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMaxSize;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\File as ReturnFormatFile;

class Image extends Field
{
    use Library, MinMaxDimensions, MinMaxSize, MimeTypes, ReturnFormatFile;

    protected $type = 'image';

    protected $preview_size = 'thumbnail';

    /**
     * Set the value of preview size
     *
     * @param   string  $preview size name
     * @return  self
     */
    public function preview(string $value)
    {
        $this->preview_size = $value;
        return $this;
    }
}
