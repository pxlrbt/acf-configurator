<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Placeholder;

class URL extends Field
{
    use Placeholder;

    protected $type = 'url';
}
