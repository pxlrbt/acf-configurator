<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Endpoint;

class Accordion extends Field
{
    use Endpoint;

    protected $type = 'accordion';

    protected $open = false;
    protected $multi_expand = false;

    public function open(string $value) : self
    {
        $this->open = $value;
        return $this;
    }

    public function multiExpand(string $value) : self
    {
        $this->multi_expand = $value;
        return $this;
    }
}
