<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Nullable;
use pxlrbt\AcfConfigurator\Fields\Properties\Multiple;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\User as ReturnFormatUser;

class User extends Field
{
    use Nullable, Multiple, ReturnFormatUser;

    protected $type = 'user';
    protected $role = [];

    public function role(string $value) : self
    {
        $this->role[] = $value;
        return $this;
    }
}
