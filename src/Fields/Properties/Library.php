<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Library
{

    public static $LIBRARY_ALL = 'all';
    public static $LIBRARY_POST = 'uploadedTo';

    protected $library; // = self::LIBRARY_ALL;
    /**
     * Set the value of library
     *
     * @param   mixed  $library
     * @return  static
     */
    public function library(string $value)
    {
        $this->validateOptions('library', $value, [self::$LIBRARY_ALL, self::$LIBRARY_POST]);
        $this->library = $value;
        return $this;
    }
}