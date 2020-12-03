<?php

namespace pxlrbt\AcfConfigurator\Condition;

use pxlrbt\AcfConfigurator\Field;
use pxlrbt\AcfConfigurator\Traits\ValidateOptions;
use pxlrbt\AcfConfigurator\Traits\ToArray;

class Condition
{
    use ToArray, ValidateOptions;

    // Operator constants for autocompletion
    public static $OPERATOR_EQUALS = '==';
    public static $OPERATOR_NOT_EQUALS = '!=';
    public static $OPERATOR_NOT_EMPTY = '!=empty';
    public static $OPERATOR_EMPTY = '==empty';
    public static $OPERATOR_PATTERN = '==pattern';
    public static $OPERATOR_CONTAINS = '==contains';

	protected $field;
	protected $operator;
	protected $value;

    /**
     * Create a new condition
     *
     * @param string  $field
     * @param string  $operator
     * @param mixed $value
     */
    public function __construct(string $field, string $operator, $value = null)
    {
        $this->field($field);
        $this->operator($operator);
        $this->value($value);
    }

    /**
     * Set field for condition.
     * This field the condition is validated against.
     *
     * @param Field|string $field
     * @return static
     */
    public function field($field)
    {
        if ($field instanceof Field) {
            $this->field = $field->getKey();
        } else {
            $this->field = $field;
        }

        return $this;
    }

    /**
     * Set conditions operator
     *
     * @param string $value
     * @return static
     */
    public function operator(string $value)
    {
        $validOptions = [
            self::$OPERATOR_CONTAINS, self::$OPERATOR_EMPTY, self::$OPERATOR_EQUALS,
            self::$OPERATOR_NOT_EMPTY, self::$OPERATOR_NOT_EQUALS, self::$OPERATOR_PATTERN
        ];

        $this->validateOptions('operator', $value, $validOptions);
        $this->operator = $value;
        return $this;
    }
    /**
     * Set conditions value
     *
     * @param string $value
     * @return static this
     */
    public function value($value)
    {
        $this->value = $value;
        return $this;
    }
}
