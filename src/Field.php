<?php

namespace pxlrbt\AcfConfigurator;

use InvalidArgumentException;
use pxlrbt\AcfConfigurator\Condition\Builder;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;

abstract class Field extends Component
{
    use ValidateOptions;

    protected static $keyPrefix = 'field_';
    protected static $keys = [];

	protected $label;
	protected $instructions = '';
	protected $required = false;
	protected $conditional_logic = [];
	protected $wrapper = [] ;


    public function __construct($label, $name)
    {
        $this->name($name);
        $this->label($label);
    }


    /**
     * Set the label which is visible when editing the field value
     *
     * @param string $label
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function label(string $label)
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
    public function instructions(string $instructions)
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
    public function required(bool $required)
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
    public function condition(callable $callback)
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
    public function wrapper(float $width, string $class = null, string $id = null)
    {
        $this->wrapper = [];
        $this->wrapper['width'] = $width;

        if ($class != null) {
            $this->wrapper['class'] = $class;
        }

        if ($id != null) {
            $this->wrapper['id'] = $id;
        }

        return $this;
    }
}
