<?php

namespace pxlrbt\AcfConfigurator\Fields;

use pxlrbt\AcfConfigurator\Field;

class Textarea extends Field
{
    public const NEWLINES_NONE = '';
    public const NEWLINES_TO_BR = 'br';
    public const NEWLINES_TO_PARAGRAPHS = 'wpautop';

    /**
     * Field type
     *
     * @var string
     */
    protected $type = 'textarea';

    /**
     * Field placeholder
     *
     * @var string
     */
    protected $placeholder;

    /**
     * Max length for string
     *
     * @var integer
     */
    protected $maxlength;

    /**
     * How new lines are treated
     *
     * @var string
     */
    protected $new_lines = self::NEWLINES_TO_BR;

    /**
     * Max amount of rows
     *
     * @var integer
     */
    protected $rows = 8;

    /**
     * Is field read only
     *
     * @var boolean
     */
    protected $readonly = false;

    /**
     * Is field disabled
     *
     * @var boolean
     */
    protected $disabled = false;

    /**
     * Set the value of placeholder
     *
     * @param   mixed  $placeholder
     *
     * @return  self
     */
    public function placeholder(string $value)
    {
        $this->placeholder = $value;
        return $this;
    }

    /**
     * Set the value of rows
     *
     * @param   mixed  $rows
     *
     * @return  self
     */
    public function rows(int $value)
    {
        $this->rows = $value;
        return $this;
    }

    /**
     * Set the value of append
     *
     * @param   mixed  $append
     *
     * @return  self
     */
    public function newlines(string $value)
    {
        $this->validateOptions('newlines', $value, [self::NEWLINES_NONE, self::NEWLINES_TO_BR, self::NEWLINES_TO_PARAGRAPHS]);
        $this->new_lines = $value;
        return $this;
    }

    /**
     * Set the value of maxlength
     *
     * @param   mixed  $maxlength
     *
     * @return  self
     */
    public function maxlength(string $value)
    {
        $this->maxlength = $value;
        return $this;
    }

    /**
     * Set the value of readonly
     *
     * @param   mixed  $readonly
     *
     * @return  self
     */
    public function readonly(bool $value)
    {
        $this->readonly = $value;
        return $this;
    }

    /**
     * Set the value of disabled
     *
     * @param   mixed  $disabled
     *
     * @return  self
     */
    public function disabled(bool $value)
    {
        $this->disabled = $value;
        return $this;
    }
}
