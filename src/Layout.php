<?php

namespace pxlrbt\AcfConfigurator;

use InvalidArgumentException;

class Layout extends Component
{
    public const DISPLAY_BLOCK = 'block';
    public const DISPLAY_TABLE = 'table';
    public const DISPLAY_ROW = 'row';

    protected static $keys = [];

   	/* (string) Unique identifier for the field. Must begin with 'field_' */
	protected $key;

	/* (string) Visible when editing the field value */
	protected $label;

	/* (string) Used to save and load data. Single word, no spaces. Underscores and dashes allowed */
	protected $name;

	/* (string) Instructions for authors. Shown when submitting data */
	protected $display = self::DISPLAY_BLOCK;

    protected $sub_fields = [];


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

    public function display(string $value)
    {
        $this->validateOptions('display', $value, [self::DISPLAY_BLOCK, self::DISPLAY_ROW, self::DISPLAY_TABLE]);
        $this->display = $value;
        return $this;
    }

    public function fields(array $fields)
    {
        foreach ($fields as $field) {
            $this->field($field);
        }

        return $this;
    }

    public function field(Field $field)
    {
        $this->sub_fields[] = $field;
    }

    protected function validateOptions($name, $value, $options)
    {
        if (!in_array($value, $options)) {
            throw new InvalidArgumentException('Attribute ' . $name . ' must be one of ' . implode(', ', $options));
        }
    }
}