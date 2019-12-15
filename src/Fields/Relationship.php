<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Relationship extends Field
{
    public const FORMAT_OBJECT = 'object';
    public const FORMAT_ID = 'id';

    protected $type = 'relationship';

    protected $post_type = [];
    protected $taxonomy = [];
    protected $filters = [];
    protected $elements = [];

    protected $min;
    protected $max;
    protected $return_format = self::FORMAT_OBJECT;

    public function postType(string $value)
    {
        $this->post_type[] = $value;
        return $this;
    }

    public function taxonomy(string $value)
    {
        $this->taxonomy[] = $value;
        return $this;
    }

    public function filter(string $value)
    {
        $this->filters[] = $value;
        return $this;
    }

    public function element(string $value)
    {
        $this->elements[] = $value;
        return $this;
    }

    public function min(string $value)
    {
        $this->min = $value;
        return $this;
    }

    public function max(string $value)
    {
        $this->max = $value;
        return $this;
    }

    public function format(string $value)
    {
        $this->validateOptions('format', $value, [self::FORMAT_ID, self::FORMAT_OBJECT]);
        $this->return_format = $value;
        return $this;
    }
}
