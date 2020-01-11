<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

use pxlrbt\AcfConfigurator\Field;

trait SubFields
{
    protected $sub_fields = [];

    public function field(Field $field) : self
    {
        $this->sub_fields[] = $field;
        return $this;
    }

    public function fields(array $fields) : self
    {
        foreach ($fields as $field) {
            $field->parent = $this;
            $this->field($field);
        }

        return $this;
    }
}