<?php

namespace pxlrbt\AcfConfigurator\Condition;

use pxlrbt\AcfConfigurator\Traits\ValidateOptions;
use pxlrbt\AcfConfigurator\Component;
use pxlrbt\AcfConfigurator\Field;

class Condition extends Component
{
    use ValidateOptions;

    // Operator constants for autocompletion
    public const OPERATOR_EQUALS = '==';
    public const OPERATOR_NOT_EQUALS = '!=';
    public const OPERATOR_NOT_EMPTY = '!=empty';
    public const OPERATOR_EMPTY = '==empty';
    public const OPERATOR_PATTERN = '==pattern';
    public const OPERATOR_CONTAINS = '==contains';

	protected $field;
	protected $operator;
	protected $value;

    public function __construct($field, $operator, $value = null)
    {
        $this->field($field);
        $this->operator($operator);
        $this->value($value);
    }

    public function field($field)
    {
        if ($field instanceof Field) {
            $this->field = $field->getKey();
        } else {
            $this->field = $field;
        }

        return $this;
    }

    public function operator(string $value)
    {
        $this->validateOptions('operator', $value, [self::OPERATOR_CONTAINS, self::OPERATOR_EMPTY, self::OPERATOR_EQUALS, self::OPERATOR_NOT_EMPTY, self::OPERATOR_NOT_EQUALS, self::OPERATOR_PATTERN]);
        $this->operator = $value;
        return $this;
    }

    public function value($value)
    {
        $this->value = $value;
        return $this;
    }
}