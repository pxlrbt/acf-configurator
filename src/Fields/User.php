<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class User extends Field
{
    public const FORMAT_ARRAY = 'array';
    public const FORMAT_OBJECT = 'object';
    public const FORMAT_ID = 'id';

    protected $type = 'user';

    protected $role = [];
    protected $allow_null = false;
    protected $multiple = false;
    protected $return_format = self::FORMAT_ID;


    public function format(string $value)
    {
        $this->validateOptions('format', $value, [self::FORMAT_ID, self::FORMAT_OBJECT, self::FORMAT_ARRAY]);
        $this->return_format = $value;
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

    public function role(string $value)
    {
        $this->role[] = $value;
        return $this;
    }
}
