<?php

namespace pxlrbt\AcfConfigurator;

use pxlrbt\AcfConfigurator\Field;



class CloneField extends Field
{
    public const DISPLAY_SEAMLESS = 'seamless';
    public const DISPLAY_GROUP = 'group';

    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'clone';

    protected $display = self::DISPLAY_SEAMLESS;
    protected $prefix_label = false;
    protected $prefix_name = false;
    protected $clone = [];



    public function display(string $value)
    {
        $this->validateOptions('display', $value, [self::DISPLAY_GROUP, self::DISPLAY_SEAMLESS]);
        $this->display = $value;
        return $this;
    }

    public function prefixLabel(bool $value)
    {
        $this->prefix_label = $value;
        return $this;
    }

    public function prefixName(bool $value)
    {
        $this->prefix_name = $value;
        return $this;
    }

    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $this->field($field);
        }

        return $this;
    }

    public function field($field)
    {
        if ($field instanceof Field) {
            $this->clone[] = $field->getKey();
        } else {
            $this->clone[] = $field;
        }

        return $this;
    }
}
