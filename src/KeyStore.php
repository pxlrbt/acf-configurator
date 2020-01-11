<?php

namespace pxlrbt\AcfConfigurator;

class KeyStore
{
    private static $keys = [];

    /**
     * Check whether store contains key
     *
     * @param string $key
     * @return boolean
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    public static function contains(string $key) : bool
    {
        return in_array($key, self::$keys);
    }

    /**
     * Add key to store
     *
     * @param string $key
     * @return void
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    public static function add(string $key)
    {
       array_push(self::$keys, $key);
    }

    /**
     * Remove key from store
     *
     * @param string $key
     * @return void
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    public static function remove(string $key)
    {
        array_splice(self::$keys, array_search($key, self::$keys), 1);
    }
}
