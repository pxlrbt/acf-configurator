<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class PostObject extends Field
{
    public const FORMAT_OBJECT = 'object';
    public const FORMAT_ID = 'id';

    protected $type = 'post_object';

    protected $post_type = [];
    protected $taxonomy = [];
    protected $allow_null = false;
    protected $multiple = false;
    protected $format = self::FORMAT_OBJECT;


    public function format(string $value)
    {
        $this->validateOptions('format', $value, [self::FORMAT_ID, self::FORMAT_OBJECT]);
        $this->format = $value;
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

    public function taxonomy(string $value)
    {
        $this->taxonomy[] = $value;
        return $this;
    }

    public function postType(string $value)
    {
        $this->post_type[] = $value;
        return $this;
    }
}
