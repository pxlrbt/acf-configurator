<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Checkbox extends Field
{
    public const FORMAT_LABEL = 'label';
    public const FORMAT_VALUE = 'value';
    public const FORMAT_ARRAY = 'array';

    public const LAYOUT_VERTICAL = 'horizontal';
    public const LAYOUT_HORIZONTAL = 'vertical';

    protected $type = 'button_group';

    protected $choices = [];
    protected $allow_null = false;
    protected $default;
    protected $layout = self::LAYOUT_HORIZONTAL;
    protected $return_format = self::FORMAT_VALUE;

    public function default(string $value)
    {
        $this->default = $value;
        return $this;
    }

    public function nullable(bool $value)
    {
        $this->allow_null = $value;
        return $this;
    }

    public function layout(string $value)
    {
        $this->validateOptions('layout', $value, [self::LAYOUT_HORIZONTAL, self::LAYOUT_VERTICAL]);
        $this->layout = $value;
        return $this;
    }

    public function format(string $value)
    {
        $this->validateOptions('format', $value, [self::FORMAT_ARRAY, self::FORMAT_LABEL, self::FORMAT_VALUE]);
        $this->return_format = $value;
        return $this;
    }

    public function choices(array $choices)
    {
        foreach ($choices as $key => $value) {
            $this->choice($key, $value);
        }

        return $this;
    }

    public function choice($key, string $value)
    {
        $this->choices[$key] =  $value;
    }
}
