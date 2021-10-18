<?php

namespace App\Constants;

use App\Exceptions\ConstantValueNotFound;
use ReflectionClass;

abstract class Constants
{
    /**
     * Get all of the constants.
     *
     * @param string $indexes = 'keys'
     * @return array
     */
    public static function all(string $indexes = 'keys'): array
    {
        $reflection = new ReflectionClass(static::class);

        $constants = $reflection->getConstants();

        if ($indexes === 'values') return array_values($constants);
        if ($indexes === 'keys') return array_keys($constants);

        return $constants;
    }

    /**
     * Get a constant value using the constant's name.
     *
     * @param string $key
     * @return string
     */
    public static function get(string $key): string
    {
        return constant("static::{$key}");
    }

    /**
     * Get the amount of constants.
     *
     * @return int
     */
    public static function count(): int
    {
        return count(static::all('keys'));
    }

    /**
     * Get the constant key name from the given value.
     *
     * @param string $value
     * @return string
     */
    public static function key(string $value): string
    {
        $index = array_search($value, static::all('both'));

        throw_unless($index, new ConstantValueNotFound);

        return $index;
    }
}
