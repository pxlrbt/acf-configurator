<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait ButtonLabel
{
    protected $button_label;

    /**
     * Set add row button label
     *
     * @param string $button_label Text to show inside button.
     * @return static
     */
    public function buttonLabel(string $value)
    {
        $this->button_label = $value;
        return $this;
    }
}