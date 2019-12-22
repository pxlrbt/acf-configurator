<?php

namespace pxlrbt\AcfConfigurator\Fields\Properties;

trait PostType
{
    protected $post_type = [];

    public function postType(string $value)
    {
        $this->post_type[] = $value;
        return $this;
    }
}
