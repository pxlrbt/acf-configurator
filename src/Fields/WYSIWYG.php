<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Fields\Properties\DefaultValue;

class WYSIWYG extends Field
{
    use DefaultValue;

    public static $TABS_TEXT = 'text';
    public static $TABS_VISUAL = 'visual';
    public static $TABS_BOTH = 'all';

    public static $TOOLBAR_BASIC = 'basic';
    public static $TOOLBAR_FULL = 'full';

    protected $type = 'wysiwyg';

    protected $tabs = 'all';
    protected $toolbar = 'full';
    protected $media_upload = false;
    protected $delay = false;

    /**
     * Set the value of tabs
     *
     * @param   string  $tabs
     * @return  static
     */
    public function tabs(string $value)
    {
        $this->validateOptions('tabs', $value, [self::$TABS_TEXT, self::$TABS_VISUAL, self::$TABS_BOTH]);
        $this->tabs = $value;
        return $this;
    }

    /**
     * Set the value of toolbar
     *
     * @param   string  $toolbar
     * @return  static
     */
    public function toolbar(string $value)
    {
        $this->validateOptions('toolbar', $value, [self::$TOOLBAR_BASIC, self::$TOOLBAR_FULL]);
        $this->toolbar = $value;
        return $this;
    }

    public function mediaUpload(bool $value)
    {
        $this->media_upload = $value;
        return $this;
    }

    public function delay(bool $value)
    {
        $this->delay = $value;
        return $this;
    }
}
