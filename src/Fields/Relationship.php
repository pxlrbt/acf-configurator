<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\MinMax;
use pxlrbt\AcfConfigurator\Fields\Properties\PostType;
use pxlrbt\AcfConfigurator\Fields\Properties\Taxonomy;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Post as ReturnFormatPost;

class Relationship extends Field
{
    use MinMax, PostType, Taxonomy, ReturnFormatPost;

    protected $type = 'relationship';

    protected $filters = [];
    protected $elements = [];

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
}
