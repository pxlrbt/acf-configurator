<?php

namespace pxlrbt\AcfConfigurator\Traits;



trait WPML
{
    public static $WPML_NO_TRANSLATE = 0;
    public static $WPML_COPY = 1;
    public static $WPML_COPY_ONCE = 2;
    public static $WPML_TRANLATE = 3;

    protected $wpml_cf_preferences = self::WPML_NO_TRANSLATE;
}