<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties\Layouts;

trait Choices
{
    protected $layout;

    public static $LAYOUT_VERTICAL = 'horizontal';
    public static $LAYOUT_HORIZONTAL = 'vertical';

    public function layout(string $value)
    {
        $this->validateOptions('layout', $value, [self::$LAYOUT_HORIZONTAL, self::$LAYOUT_VERTICAL]);
        $this->layout = $value;
        return $this;
    }
}
