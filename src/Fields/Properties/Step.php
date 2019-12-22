<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait Step
{
    protected $step;

    /**
     * Set the value of step
     *
     * @param   mixed  $step
     * @return  self
     */
    public function step(int $value) : self
    {
        $this->step = $value;
        return $this;
    }
}
