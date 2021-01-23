<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

use pxlrbt\AcfConfigurator\Field;

trait SubFields
{
    protected $sub_fields = [];

    public function field(Field $field)
    {
        $this->sub_fields[] = $field;
        return $this;
    }

    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $field->parent($this);
            $this->field($field);
        }

        return $this;
    }
}
