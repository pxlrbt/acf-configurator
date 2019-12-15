<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Image extends Field
{
    public const FORMAT_ID = 'id';
    public const FORMAT_ARRAY = 'array';
    public const FORMAT_URL = 'url';

    public const LIBRARY_ALL = 'all';
    public const LIBRARY_POST = 'uploadedTo';

    protected $type = 'image';

    protected $return_format = self::FORMAT_ID;
    protected $library = self::LIBRARY_ALL;
    protected $preview_size = 'thumbnail';

    protected $min_width;
    protected $min_height;
    protected $min_size;

    protected $max_width;
    protected $max_height;
    protected $max_size;

    protected $mime_types;

    /**
     * Set the value of format
     *
     * @param   string  $format
     * @return  self
     */
    public function format(string $value)
    {
        $this->validateOptions('format', $value, [self::FORMAT_ID, self::FORMAT_ARRAY, self::FORMAT_URL]);
        $this->return_format = $value;
        return $this;
    }

    /**
     * Set the value of library
     *
     * @param   mixed  $library
     * @return  self
     */
    public function library(string $value)
    {
        $this->validateOptions('library', $value, [self::LIBRARY_ALL, self::LIBRARY_POST]);
        $this->library = $value;
        return $this;
    }

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

    public function mimeTypes(string $value)
    {
        $this->mime_types = $value;
        return $this;
    }

    public function min(int $width = null, int $height = null, int $size = null)
    {
        $this->min_width = $width;
        $this->min_height = $height;
        $this->min_size = $size;
        return $this;
    }

    public function max(int $width = null, int $height = null, int $size = null)
    {
        $this->max_width = $width;
        $this->max_height = $height;
        $this->max_size = $size;
        return $this;
    }
}
