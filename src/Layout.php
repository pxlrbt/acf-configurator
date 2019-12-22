<?php

namespace pxlrbt\AcfConfigurator;

use pxlrbt\AcfConfigurator\Fields\Properties\SubFields;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;

class Layout extends Component
{
    use SubFields, ValidateOptions;

    public static $DISPLAY_BLOCK = 'block';
    public static $DISPLAY_TABLE = 'table';
    public static $DISPLAY_ROW = 'row';

    protected static $keys = [];

    protected $key;
	protected $label;
	protected $name;
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
        $this->name = $name;
        $this->key($name);
        $this->label($label);
    }

    /**
     * Set
     *
     * @param string $key
     * @return void
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function key(string $key)
    {
        // if (in_array($key, static::$keys)) {
        //     throw new InvalidArgumentException('Key must be unique');
        // }

        if ($this->key != null) {
            array_splice(static::$keys, array_search($this->key, static::$keys), 1);
        }

        static::$keys[] = $key;
        $this->key = $key;
        return $this;
    }

    /**
     * Get the layouts key
     *
     * @return string
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function getKey() : string
    {
        return $this->key;
    }

    /**
     * Set the layouts name
     *
     * @param string $name
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function name(string $name) : self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the layouts name
     *
     * @return string
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function getName() : string
    {
        return $this->name;
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
