<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Message extends Field
{
    public const NEWLINES_NONE = '';
    public const NEWLINES_TO_BR = 'br';
    public const NEWLINES_TO_PARAGRAPHS = 'wpautop';

    protected $type = 'message';

    protected $new_lines = self::NEWLINES_TO_PARAGRAPHS;
    protected $esc_html = false;



    public function escapeHtml(bool $value)
    {
        $this->esc_html = $value;
        return $this;
    }

    public function newlines(string $value)
    {
        $this->validateOptions('newlines', $value, [self::NEWLINES_NONE, self::NEWLINES_TO_BR, self::NEWLINES_TO_PARAGRAPHS]);
        $this->newlines = $value;
        return $this;
    }
}
