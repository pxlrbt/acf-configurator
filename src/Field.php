<?php

namespace pxlrbt\AcfConfigurator;

use InvalidArgumentException;
use pxlrbt\AcfConfigurator\Condition\Builder;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;

abstract class Field extends Component
{
    use ValidateOptions;

    protected static $keys = [];

	protected $key;
	protected $label;
	protected $name;
	protected $instructions = '';
	protected $required = false;
	protected $conditional_logic = [];
	protected $wrapper = [] ;


    public function __construct($label, $name)
    {
        $this->name = $name;
        $this->key('field_' . $name);
        $this->label($label);
    }

    /**
     * Set the fields key
     * Unique identifier for the field. Must begin with 'field_'.
     *
     * @param string $key
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function key(string $key) : self
    {
        if (strpos($key, 'field_') === false) {
            throw new InvalidArgumentException('Key must start with "field_"');
        }

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
     * Get the fields key
     *
     * @return String $key
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function getKey() : string
    {
        return $this->key;
    }

    /**
     * Set the fields name
     * Used to save and load data. Single word, no spaces. Underscores and dashes allowed.
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
     * Get the fields name
     *
     * @return void
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set the label which is visible when editing the field value
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
     * Set the fields instructions for authors.
     * Shown when submitting data.
     *
     * @param string $instructions
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function instructions(string $instructions) : self
    {
        $this->instructions = $instructions;
        return $this;
    }

    /**
     * Set hether or not the field value is required
     *
     * @param boolean $required
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function required(bool $required) : self
    {
        $this->required = $required;
        return $this;
    }

    /**
     * Conditionally hide or show this field based on other field's values.
     * Expects a callable which is passed a condition builder.
     *
     * @param callable $callback
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function condition(callable $callback) : self
    {
        $builder = new Builder();
        $callback($builder);
        $this->conditional_logic = $builder->toArray();
        return $this;
    }

    /**
     * Set width, CSS class, CSS ID for fields wrapper element.
     *
     * @param float $width
     * @param string $class
     * @param string $id
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function wrapper(float $width, string $class = null, string $id = null) : self
    {
        $this->wrapper = [
            'width' => $width,
            'class' => $class,
            'id' => $id
        ];

        return $this;
    }
}
