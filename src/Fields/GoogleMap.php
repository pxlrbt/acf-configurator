<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class GoogleMap extends Field
{
    protected $type = 'google_map';

    protected $center_lat;
    protected $center_lng;
    protected $zoom;
    protected $height;

    public function lat(string $value) : self
    {
        $this->center_lat = $value;
        return $this;
    }

    public function lng(string $value) : self
    {
        $this->center_lng = $value;
        return $this;
    }

    public function zoom(string $value) : self
    {
        $this->zoom = $value;
        return $this;
    }

    public function height(string $value) : self
    {
        $this->height = $value;
        return $this;
    }
}
