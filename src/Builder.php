<?php

namespace pxlrbt\AcfConfigurator;

abstract class Builder
{
    protected static $classname;

    protected $groups;

    /**
     * Create new builder
     *
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->groups = [];
    }

    /**
     * Start a new condition group.
     * Acts as where clause if conditions already exists
     *
     * @param mixed $field
     * @param string $operator
     * @param mixed $value
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function if($field, $operator = null, $value = null)
    {
        $this->groups[] = [
            new static::$classname($field, $operator, $value)
        ];

        return $this;
    }

    /**
     * Add a AND condition to last condition group.
     *
     * @param mixed $field
     * @param string $operator
     * @param mixed $value
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function andIf($field, $operator, $value = null)
    {
        $group = $this->getLastGroup();
        $group[] = new static::$classname($field, $operator, $value);
        $this->groups[] = $group;
        return $this;
    }

    /**
     * Get last added group
     *
     * @return array group or empty array
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    private function getLastGroup() : array
    {
        $group = array_pop($this->groups);
        return $group ?? [];
    }

    /**
     * Cast builders conditions to array
     *
     * @return array $configurations
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function toArray() : array
    {
        $groups = [];
        foreach ($this->groups as $g) {
            $group = [];
            foreach ($g as $rule){
                $group[] = $rule->toArray();
            }

            $groups[] = $group;
        }

        return $groups;
    }
}
