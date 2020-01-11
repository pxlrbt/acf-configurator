<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Endpoint;

class Tab extends Field
{
    use Endpoint;

    public static $PLACEMENT_TOP = 'top';
    public static $PLACEMENT_LEFT = 'left';

    protected $type = 'tab';
    protected $placement = false;

    public function placement(string $value)
    {
        $this->validateOptions('placement', $value, [self::$PLACEMENT_LEFT, self::$PLACEMENT_TOP]);
        $this->placement = $value;
        return $this;
    }
}
