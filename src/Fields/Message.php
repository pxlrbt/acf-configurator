<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Newlines;

class Message extends Field
{
    use Newlines;

    protected $type = 'message';

    protected $esc_html = false;

    public function escapeHtml(bool $value)
    {
        $this->esc_html = $value;
        return $this;
    }
}
