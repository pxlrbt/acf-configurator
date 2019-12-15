<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Tab extends Field
{
    public const PLACEMENT_TOP = 'top';
    public const PLACEMENT_LEFT = 'left';

    protected $type = 'tab';

    protected $placement = false;
    protected $endpoint = false;

    public function placement(string $value)
    {
        $this->validateOptions('placement', $value, [self::PLACEMENT_LEFT, self::PLACEMENT_TOP]);
        $this->placement = $value;
        return $this;
    }

    public function endpoint(string $value)
    {
        $this->endpoint = $value;
        return $this;
    }
}
