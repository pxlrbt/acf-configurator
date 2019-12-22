<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;

class TrueFalse extends Field
{
    use DefaultValue;

    protected $type = 'true_false';

    protected $message;
    protected $ui;
    protected $ui_on_text;
    protected $ui_off_text;

    public function select2(bool $value) : self
    {
        $this->ui = $value;
        return $this;
    }

    public function message(string $value) : self
    {
        $this->message = $value;
        return $this;
    }

    public function onText(string $value) : self
    {
        $this->ui_on_text = $value;
        return $this;
    }

    public function offText(string $value) : self
    {
        $this->ui_off_text = $value;
        return $this;
    }
}
