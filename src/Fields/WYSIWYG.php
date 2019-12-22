<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class WYSIWYG extends Field
{
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
     * @return  self
     */
    public function tabs(string $value) : self
    {
        $this->validateOptions('tabs', $value, [self::$TABS_TEXT, self::$TABS_VISUAL, self::$TABS_BOTH]);
        $this->tabs = $value;
        return $this;
    }

    /**
     * Set the value of toolbar
     *
     * @param   string  $toolbar
     * @return  self
     */
    public function toolbar(string $value) : self
    {
        $this->validateOptions('toolbar', $value, [self::$TOOLBAR_BASIC, self::$TOOLBAR_FULL]);
        $this->toolbar = $value;
        return $this;
    }

    public function mediaUpload(bool $value) : self
    {
        $this->media_upload = $value;
        return $this;
    }

    public function delay(bool $value) : self
    {
        $this->delay = $value;
        return $this;
    }
}
