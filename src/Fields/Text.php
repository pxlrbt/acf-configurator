<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\AppendPrepend;
use pxlrbt\AcfConfigurator\Fields\Properties\Placeholder;
use pxlrbt\AcfConfigurator\Fields\Properties\TextProperties;

class Text extends Field
{
    use AppendPrepend, Placeholder, TextProperties;

    protected $type = 'text';
}
