<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Taxonomy as PropertiesTaxonomy;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Post as ReturnFormatPost;


class Taxonomy extends Field
{
    use PropertiesTaxonomy, ReturnFormatPost;

    public static $FIELD_TYPE_CHECKBOX = 'checkbox';
    public static $FIELD_TYPE_MULTISELECT = 'multi_select';
    public static $FIELD_TYPE_RADIO = 'radio';
    public static $FIELD_TYPE_SELECT = 'select';

    protected $type = 'taxonomy';

    protected $field_type = 'checkbox'; //self::$FIELD_TYPE_CHECKBOX;
    protected $add_term = true;
    protected $save_terms = false;
    protected $load_terms = false;

    public function fieldType(string $value)
    {
        $validOptions = [self::$FIELD_TYPE_CHECKBOX, self::$FIELD_TYPE_MULTISELECT, self::$FIELD_TYPE_RADIO, self::$FIELD_TYPE_SELECT];
        $this->validateOptions('fieldType', $value, $validOptions);
        $this->field_type = $value;
        return $this;
    }

    public function addTerm(bool $value)
    {
        $this->add_term = $value;
        return $this;
    }

    public function loadTerms(bool $value)
    {
        $this->load_terms = $value;
        return $this;
    }

    public function saveTerms(bool $value)
    {
        $this->save_terms = $value;
        return $this;
    }
}
