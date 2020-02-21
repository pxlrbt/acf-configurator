<?php

namespace pxlrbt\AcfConfigurator\Traits;

trait ToArray
{
    /**
     * Cast component and sub fields to array
     *
     * @return array $config
     * @author Dennis Koch <info@pixelarbeit.de>
     */
    public function toArray()
    {
        $config = [];

        foreach (get_object_vars($this) as $key => $value) {
            if (is_array($value)) {
                $value = array_map(function($item) {
                    if (is_object($item)) {
                        return $item->toArray();
                    }

                    return $item;
                }, $value);
            }
            else if (is_object($value)) {
                $value = $value->toArray();
            }

            $config[$key] = $value;
        }

        return $config;
    }
}