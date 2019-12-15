<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Select extends Field
{
    public const FORMAT_LABEL = 'label';
    public const FORMAT_VALUE = 'value';
    public const FORMAT_ARRAY = 'array';

    protected $type = 'select';

    protected $choices = [];
    protected $default;
    protected $allow_null;
    protected $multiple;
    protected $ui;
    protected $return_format;


    public function default($value)
    {
        $this->default = $value;
        return $this;
    }

    public function nullable(bool $value)
    {
        $this->allow_null = $value;
        return $this;
    }

    public function multiple(bool $value)
    {
        $this->multiple = $value;
        return $this;
    }

    public function select2(bool $value)
    {
        $this->ui = $value;
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
