<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Twitter\AccessControl;

/**
 * "Who you are"
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface AuthenticationInterface
{

    /**
     * "has a token?"
     *
     * @return bool
     */
    public function isAuthenticated();

    /**
     * @param string $attribute
     *
     * @return void
     */
    public function addAttribute($attribute);

    /**
     * Returns a string representation of authentication attributes.
     *
     * E.g. a username / password combination, separated by a colon.
     *
     * @return string
     */
    public function toString();
}
