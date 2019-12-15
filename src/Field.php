<?php

namespace pxlrbt\AcfConfigurator;

use InvalidArgumentException;
use pxlrbt\AcfConfigurator\Condition\Builder;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;

class Field extends Component
{
    use ValidateOptions;

    protected static $keys = [];

   	/* (string) Unique identifier for the field. Must begin with 'field_' */
	protected $key;

	/* (string) Visible when editing the field value */
	protected $label;

	/* (string) Used to save and load data. Single word, no spaces. Underscores and dashes allowed */
	protected $name;

	/* (string) Instructions for authors. Shown when submitting data */
	protected $instructions = '';

	/* (int) Whether or not the field value is required. Defaults to 0 */
	protected $required = false;

	/* (mixed) Conditionally hide or show this field based on other field's values.
	Best to use the ACF UI and export to understand the array structure. Defaults to 0 */
	protected $conditional_logic = [];

	/* (array) An array of attributes given to the field element */
	protected $wrapper = [] ;

	/* (mixed) A default value used by ACF if no value has yet been saved */
	protected $default_value = '';


    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->key('field_' . $name);
        $this->label($label);
    }

    public function key(string $key)
    {
        if (strpos($key, 'field') === false) {
            throw new InvalidArgumentException('Key must start with "field_"');
        }

        if (in_array($key, static::$keys)) {
            throw new InvalidArgumentException('Key must be unique');
        }

        if ($this->key != null) {
            array_splice(static::$keys, array_search($this->key, static::$keys), 1);
        }

        static::$keys[] = $key;
        $this->key = $key;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function name(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function label(string $label)
    {
        $this->label = $label;
        return $this;
    }

    public function instructions(string $instructions)
    {
        $this->instructions = $instructions;
        return $this;
    }

    public function required(bool $required)
    {
        $this->required = $required;
        return $this;
    }

    public function condition(callable $callback)
    {
        $builder = new Builder();
        $callback($builder);
        $this->conditional_logic = $builder->toArray();
        return $this;
    }

    public function wrapper(array $wrapper)
    {
        // Width, class, id

        $this->wrapper = $wrapper;
        return $this;
    }

    public function default(string $default)
    {
        $this->default_value = $default;
        return $this;
    }
}