<?php

namespace pxlrbt\AcfConfigurator\Location;

class Builder
{
    protected $groups;

    public function __construct()
    {
        $this->groups = [];
    }

    public function if($field, $operator = null, $value = null)
    {
        $this->groups[] = [
            new Location($field, $operator, $value)
        ];

        return $this;
    }

    public function andIf($field, $operator, $value = null)
    {
        $group = $this->getLastGroup();
        $group[] = new Location($field, $operator, $value);
        $this->groups[] = $group;
        return $this;
    }

    private function getLastGroup()
    {
        $group = array_pop($this->groups);
        return $group ?? [];
    }

    public function toArray()
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