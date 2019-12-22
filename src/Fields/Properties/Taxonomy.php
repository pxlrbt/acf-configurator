<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Taxonomy
{
    protected $taxonomy = [];

    public function taxonomy(string $value)
    {
        $this->taxonomy[] = $value;
        return $this;
    }
}
