<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl;

use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthenticationInterface;

/**
 * DummyAuthentication
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyAuthentication implements AuthenticationInterface
{

    /**
     * {@inheritdoc}
     */
    public function isAuthenticated()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function addAttribute($attribute)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
    }
}
