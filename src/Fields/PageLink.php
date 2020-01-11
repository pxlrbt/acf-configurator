<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Multiple;
use pxlrbt\AcfConfigurator\Fields\Properties\Nullable;
use pxlrbt\AcfConfigurator\Fields\Properties\PostType;
use pxlrbt\AcfConfigurator\Fields\Properties\Taxonomy;

class PageLink extends Field
{
    use Nullable, Multiple, PostType, Taxonomy;

    protected $type = 'page_link';

    protected $taxonomy = [];
    protected $allow_archives = false;

    public function allowArchives(bool $value)
    {
        $this->allow_archives = $value;
        return $this;
    }
}
