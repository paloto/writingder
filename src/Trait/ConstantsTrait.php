<?php

namespace App\Trait;

use ReflectionClass;
use ReflectionException;

/**
 * ConstantsTrait.
 */
trait ConstantsTrait
{
    /**
     * @return array
     *
     * @throws ReflectionException
     */
    public static function getConstants()
    {
        $class = new ReflectionClass(__CLASS__);

        $constants = $class->getConstants();
        ksort($constants);

        return $constants;
    }

    /**
     * @param $key
     *
     * @return int|string
     *
     * @throws ReflectionException
     */
    public static function getName($key)
    {
        $names = self::getNames();
        foreach ($names as $name => $value) {
            if ($value == $key) {
                return $name;
            }
        }
    }

    /**
     * @return array|null
     *
     * @throws ReflectionException
     */
    public static function getNames()
    {
        $class = new ReflectionClass(__CLASS__);

        return array_flip($class->getConstants());
    }
}