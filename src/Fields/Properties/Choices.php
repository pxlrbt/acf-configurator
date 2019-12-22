<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Choices
{
    protected $choices = [];

    public function choices(array $choices)
    {
        foreach ($choices as $key => $value) {
            $this->choice($key, $value);
        }

        return $this;
    }

    public function choice($key, string $value)
    {
        $this->choices[$key] =  $value;
    }
}