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

use DreadLabs\VantomasWebsite\Twitter\AccessControl\Exception\AuthorizationFailedException;

/**
 * "What you are authorized to do"
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface AuthorizationInterface
{

    /**
     * Sets credentials on AuthenticationInterface
     *
     * @param AuthenticationInterface $authentication
     * @return void
     * @throws AuthorizationFailedException
     */
    public function authorize(AuthenticationInterface $authentication);
}
