<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\Multiple;
use pxlrbt\AcfConfigurator\Fields\Properties\Nullable;
use pxlrbt\AcfConfigurator\Fields\Properties\PostType;
use pxlrbt\AcfConfigurator\Fields\Properties\Taxonomy;
use pxlrbt\AcfConfigurator\Fields\Properties\ReturnFormats\Post as ReturnFormatPost;

class PostObject extends Field
{
    use Nullable, Multiple, PostType, Taxonomy, ReturnFormatPost;

    protected $type = 'post_object';
}
