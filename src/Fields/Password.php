<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\AppendPrepend;
use pxlrbt\AcfConfigurator\Fields\Properties\Placeholder;

class Password extends Field
{
    use Placeholder, AppendPrepend;

    protected $type = 'password';
}
