<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Twitter\AccessControl\Authentication;

use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthenticationInterface;

/**
 * BearerToken
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class BearerToken implements AuthenticationInterface
{

    /**
     * @var array
     */
    private $attributes = array();

    /**
     * @return bool
     */
    public function isAuthenticated()
    {
        return !empty($this->attributes);
    }

    /**
     * @param string $attribute
     *
     * @eturn void
     */
    public function addAttribute($attribute)
    {
        array_push($this->attributes, $attribute);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return implode('', $this->attributes);
    }
}
