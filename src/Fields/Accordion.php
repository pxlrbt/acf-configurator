<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Accordion extends Field
{
    protected $type = 'accordion';

    protected $open = false;
    protected $multi_expand = false;
    protected $endpoint = false;

    public function open(string $value)
    {
        $this->open = $value;
        return $this;
    }

    public function multiExpand(string $value)
    {
        $this->multi_expand = $value;
        return $this;
    }

    public function endpoint(string $value)
    {
        $this->endpoint = $value;
        return $this;
    }
}
