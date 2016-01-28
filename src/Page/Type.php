<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Page;

/**
 * Type
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Type
{

    /**
     * @var int
     */
    private $value;

    private function __construct()
    {
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return Type
     */
    public static function fromString($value)
    {
        $type = new Type;
        $type->value = (int) $value;

        return $type;
    }
}
