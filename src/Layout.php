<?php

namespace pxlrbt\AcfConfigurator;

use pxlrbt\AcfConfigurator\Fields\Properties\SubFields;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;

class Layout extends Component
{
    use SubFields, ValidateOptions;

    protected static $keyPrefix = 'layout_';

    public static $DISPLAY_BLOCK = 'block';
    public static $DISPLAY_TABLE = 'table';
    public static $DISPLAY_ROW = 'row';

    protected static $keys = [];

	protected $label;
	protected $display = 'block';

    /**
     * Create a new layout.
     * Layouts are used inside flexible content field.
     *
     * @param string $label
     * @param string $name
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function __construct(string $label, string $name)
    {
        $this->name($name);
        $this->label($label);
    }

    /**
     * Set the layouts label.
     *
     * @param string $label
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function label(string $label) : self
    {
        $this->label = $label;
        return $this;
    }

    /**
     * Set layouts diplay type.
     *
     * @param string $value
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function display(string $value) : self
    {
        $this->validateOptions('display', $value, [self::$DISPLAY_BLOCK, self::$DISPLAY_ROW, self::$DISPLAY_TABLE]);
        $this->display = $value;
        return $this;
    }
}
