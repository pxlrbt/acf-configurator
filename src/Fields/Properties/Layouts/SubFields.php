<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties\Layouts;

trait SubFields
{
    public static $LAYOUT_TABLE = 'table';
    public static $LAYOUT_BLOCK = 'block';
    public static $LAYOUT_ROW = 'row';

    protected $layout = 'block'; //self::$LAYOUT_BLOCK;

    /**
     * Set layout
     *
     * @throws InvalidArgumentException Throws error if layout is not valid.
     * @param string $layout New layout.
     * @return self
     */
    public function layout(string $value)
    {
        $this->validateOptions('layout', $value, [self::$LAYOUT_BLOCK, self::$LAYOUT_ROW, self::$LAYOUT_TABLE]);
        $this->layout = $value;
        return $this;
    }
}
