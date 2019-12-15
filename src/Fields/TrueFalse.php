<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class TrueFalse extends Field
{
    protected $type = 'true_false';

    protected $message;
    protected $default_value = false;
    protected $ui;
    protected $ui_on_text;
    protected $ui_off_text;

    public function select2(bool $value)
    {
        $this->ui = $value;
        return $this;
    }

    public function message(string $value)
    {
        $this->message = $value;
        return $this;
    }

    public function onText(string $value)
    {
        $this->ui_on_text = $value;
        return $this;
    }

    public function offText(string $value)
    {
        $this->ui_off_text = $value;
        return $this;
    }
}
