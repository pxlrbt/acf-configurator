<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Layouts\SubFields as LayoutSubFields;
use pxlrbt\AcfConfigurator\Fields\Properties\SubFields;

class Group extends Field
{
    use SubFields, LayoutSubFields;

    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'group';
}
