<?php

namespace pxlrbt\AcfConfigurator;

use InvalidArgumentException;

abstract class Component
{
    protected static $keyPrefix = 'key_';

    protected $parent;
    protected $key;
    protected $name;

    /**
     * Get the components key prefix
     *
     * @return string
     */
    public function getKeyPrefix() : string
    {
        return static::$keyPrefix;
    }

    /**
     * Set the fields key
     * Unique identifier for the component.
     *
     * @param string $key
     * @return void
     */
    public function key(string $key)
    {
        if (strpos($key, $this->getKeyPrefix()) === false) {
            throw new InvalidArgumentException('Key must start with "' . $this->getKeyPrefix() .'"');
        }

        if ($this->key !== null) {
            KeyStore::remove($this->key);
        }

        if (KeyStore::contains($key)) {
            throw new InvalidArgumentException('Key must be unique');
        }

        KeyStore::add($key);

        $this->key = $key;
        return $this;
    }

    /**
     * Get the components key
     *
     * @return string|null $key
     */
    public function getKey() : ?string
    {
        return $this->key;
    }


    /**
     * Set the components name
     * Used to save and load data. Single word, no spaces. Underscores and dashes allowed.
     *
     * @param string $name
     * @return static
     */
    public function name(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the fields name
     *
     * @return void
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the components parent component
     *
     * @param Component $value
     * @return void
     */
    public function parent($value)
    {
        $this->parent = $value;
    }

    /**
     * Get parent component
     *
     * @return Component|null
     */
    public function getParent() : ?Component
    {
        return $this->parent;
    }

    /**
     * Generate key based on components name and parent components
     *
     * @return string
     */
    public function generateKey() : string
    {
        $key = $this->getName();
        $parent = $this->getParent();

        while ($parent !== null) {
            $key = substr($parent->getKey(), strlen($parent->getKeyPrefix())) . '__' . $key;
            $parent = $parent->getParent();
        }

        $key = preg_replace('/[^\da-z_]/i', '', $key);

        return $this->getKeyPrefix() . $key;
    }

    /**
     * Cast component and sub fields to array
     *
     * @return array $config
     */
    public function toArray()
    {
        $config = [];

        foreach (get_object_vars($this) as $key => $value) {
            if ($key == 'parent') continue;

            if (is_array($value)) {
                $value = array_map(function($item) {
                    if (is_object($item)) {
                        return $item->build();
                    }

                    return $item;
                }, $value);
            }
            else if (is_object($value)) {
                $value = $value->build();
            }

            $config[$key] = $value;
        }

        return $config;
    }

    /**
     * Build components configuration
     *
     * @return void
     */
    public function build()
    {
        if ($this->getKey() === null) {
            $this->key($this->generateKey());
        }

        return $this->toArray();
    }
}
