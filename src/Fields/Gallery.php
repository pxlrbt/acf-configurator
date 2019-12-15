<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;



class Gallery extends Field
{
    public const INSERT_APPEND = 'append';
    public const INSERT_PREPEND = 'prepend';

    public const LIBRARY_ALL = 'all';
    public const LIBRARY_POST = 'uploadedTo';

    protected $type = 'gallery';

    protected $library = self::LIBRARY_ALL;

    protected $min;
    protected $max;

    protected $min_width;
    protected $min_height;
    protected $min_size;

    protected $max_width;
    protected $max_height;
    protected $max_size;

    protected $mime_types;



    public function insert(string $value)
    {
        $this->validateOptions('insert', $value, [self::INSERT_APPEND, self::INSERT_PREPEND]);
        $this->insert = $value;
        return $this;
    }

    /**
     * Set the value of library
     *
     * @param   mixed  $library
     *
     * @return  self
     */
    public function library(string $value)
    {
        $this->validateOptions('library', $value, [self::LIBRARY_ALL, self::LIBRARY_POST]);
        $this->library = $value;
        return $this;
    }

    public function mimeTypes(string $value)
    {
        $this->mime_types = $value;
        return $this;
    }

    public function minItems(int $value)
    {
        $this->min = $value;
    }

    public function maxItems(int $value)
    {
        $this->max = $value;
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
