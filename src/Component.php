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
     * Factory function to create a new instance
     *
     * @param array ...$args
     * @return mixed
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public static function make(...$args)
    {
        return new static(...$args);
    }

    /**
     * Get the components key prefix
     *
     * @return string
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
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
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
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
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
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
     * @return self
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
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
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
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
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function parent($value)
    {
        $this->parent = $value;
    }

    /**
     * Get parent component
     *
     * @return Component|null
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function getParent() : ?Component
    {
        return $this->parent;
    }

    /**
     * Generate key based on components name and parent components
     *
     * @return string
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
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
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
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
     * @author Dennis Koch <info@pixelarbeit.de>
     * @since 1.0.0
     */
    public function build()
    {
        if ($this->getKey() === null) {
            $this->key($this->generateKey());
        }

        return $this->toArray();
    }
}
