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
            $key = substr($field->getKey(), 6);
            $field->key('field_' . $this->key . '__' . $key);
            $this->field($field);
        }

        return $this;
    }
}