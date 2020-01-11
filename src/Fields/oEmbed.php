<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class oEmbed extends Field
{
    protected $type = 'oembed';

    protected $width;
    protected $height;

    public function width(int $value)
    {
        $this->width = $value;
        return $this;
    }

    public function height(int $value)
    {
        $this->height = $value;
        return $this;
    }
}
