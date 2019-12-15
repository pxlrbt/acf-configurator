<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class PageLink extends Field
{
    protected $type = 'page_link';

    protected $post_type = [];
    protected $taxonomy = [];
    protected $allow_null = false;
    protected $allow_archives = false;
    protected $multiple = false;



    public function nullable(bool $value)
    {
        $this->allow_null = $value;
        return $this;
    }

    public function multiple(bool $value)
    {
        $this->multiple = $value;
        return $this;
    }

    public function allowArchives(bool $value)
    {
        $this->allow_archives = $value;
        return $this;
    }

    public function taxonomy(string $value)
    {
        $this->taxonomy[] = $value;
        return $this;
    }

    public function postType(string $value)
    {
        $this->post_type[] = $value;
        return $this;
    }
}
