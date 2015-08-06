<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\SecretSanta\AccessControl;

/**
 * GuardInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface GuardInterface
{

    /**
     * Flags if the current request has an authenticated user
     *
     * @return void
     *
     * @throws UnauthenticatedException
     */
    public function assertAuthenticatedUser();
}
