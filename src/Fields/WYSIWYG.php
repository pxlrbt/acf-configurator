<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class WYSIWYG extends Field
{
    public const TABS_TEXT = 'text';
    public const TABS_VISUAL = 'visual';
    public const TABS_BOTH = 'all';

    public const TOOLBAR_BASIC = 'basic';
    public const TOOLBAR_FULL = 'full';

    protected $type = 'wysiwyg';

    protected $tabs = self::TABS_BOTH;
    protected $toolbar = self::TOOLBAR_FULL;
    protected $media_upload = false;
    protected $delay = false;


    /**
     * Set the value of tabs
     *
     * @param   string  $tabs
     * @return  self
     */
    public function tabs(string $value)
    {
        $this->validateOptions('tabs', $value, [self::TABS_TEXT, self::TABS_VISUAL, self::TABS_BOTH]);
        $this->tabs = $value;
        return $this;
    }

    /**
     * Set the value of toolbar
     *
     * @param   string  $toolbar
     * @return  self
     */
    public function toolbar(string $value)
    {
        $this->validateOptions('toolbar', $value, [self::TOOLBAR_BASIC, self::TOOLBAR_FULL]);
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
