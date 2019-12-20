<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;



class Group extends Field
{
    public const LAYOUT_TABLE = 'table';
    public const LAYOUT_BLOCK = 'block';
    public const LAYOUT_ROW = 'row';

    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'group';

    /**
     * Field layout
     *
     * @var string
     */
    protected $layout = self::LAYOUT_BLOCK;

    /**
     * Repeater fields
     *
     * @var array
     */
    public $sub_fields = [];



    /**
     * Set layout
     *
     * @throws \Geniem\ACF\Exception Throws error if layout is not valid.
     * @param string $layout New layout.
     * @return self
     */
    public function layout(string $value)
    {
        $this->validateOptions('layout', $value, [self::LAYOUT_BLOCK, self::LAYOUT_ROW, self::LAYOUT_TABLE]);
        $this->layout = $value;
        return $this;
    }

    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $this->field($field);
        }

        return $this;
    }

    public function field(Field $field)
    {
        $this->sub_fields[] = $field;
    }
}
