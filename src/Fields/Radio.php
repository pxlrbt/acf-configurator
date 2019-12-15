<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Radio extends Field
{
    public const FORMAT_LABEL = 'label';
    public const FORMAT_VALUE = 'value';
    public const FORMAT_ARRAY = 'array';

    public const LAYOUT_VERTICAL = 'label';
    public const LAYOUT_HORIZONTAL = 'label';

    protected $type = 'radio';

    protected $choices = [];
    protected $allow_null = false;
    protected $other_choice = false;
    protected $default;
    protected $layout = self::LAYOUT_VERTICAL;
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

    public function otherChoice(bool $value)
    {
        $this->other_choice = $value;
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

    public function choices(array $items)
    {
        foreach ($items as $key => $value) {
            $this->choice($key, $value);
        }
        return $this;
    }

    public function choice($key, string $value)
    {
        $this->choices[$key] =  $value;
    }

}
