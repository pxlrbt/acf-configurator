<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Taxonomy extends Field
{
    public const FORMAT_OBJECT = 'object';
    public const FORMAT_ID = 'id';

    public const FIELD_TYPE_CHECKBOX = 'checkbox';
    public const FIELD_TYPE_MULTISELECT = 'multi_select';
    public const FIELD_TYPE_RADIO = 'radio';
    public const FIELD_TYPE_SELECT = 'select';

    protected $type = 'taxonomy';

    protected $taxonomy;
    protected $field_type = self::FIELD_TYPE_CHECKBOX;
    protected $add_term = true;
    protected $save_terms = false;
    protected $load_terms = false;
    protected $return_format = self::FORMAT_ID;



    public function taxonomy(string $value)
    {
        $this->taxonomy = $value;
        return $this;
    }

    public function fieldType(string $value)
    {
        $this->validateOptions('fieldType', $value, [self::FIELD_TYPE_CHECKBOX, self::FIELD_TYPE_MULTISELECT, self::FIELD_TYPE_RADIO, self::FIELD_TYPE_SELECT]);
        $this->field_type = $value;
        return $this;
    }

    public function addTerm(bool $value)
    {
        $this->add_term = $value;
        return $this;
    }

    public function saveTerms(bool $value)
    {
        $this->save_terms = $value;
        return $this;
    }

    public function loadTerms(bool $value)
    {
        $this->load_terms = $value;
        return $this;
    }

    public function format(string $value)
    {
        $this->validateOptions('format', $value, [self::FORMAT_ID, self::FORMAT_OBJECT]);
        $this->return_format = $value;
        return $this;
    }
}
