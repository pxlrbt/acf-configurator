<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Newlines
{

    public static $NEWLINES_NONE = '';
    public static $NEWLINES_TO_BR = 'br';
    public static $NEWLINES_TO_PARAGRAPHS = 'wpautop';

    protected $new_lines;

    /**
     * Set the value of append
     *
     * @param   mixed  $append
     *
     * @return  static
     */
    public function newlines(string $value)
    {
        $this->validateOptions('newlines', $value, [self::$NEWLINES_NONE, self::$NEWLINES_TO_BR, self::$NEWLINES_TO_PARAGRAPHS]);
        $this->new_lines = $value;
        return $this;
    }
}