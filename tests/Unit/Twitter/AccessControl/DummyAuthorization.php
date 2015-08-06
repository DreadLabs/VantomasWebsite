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
use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthorizationInterface;
use DreadLabs\VantomasWebsite\Twitter\AccessControl\Exception\AuthorizationFailedException;

/**
 * DummyAuthorization
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyAuthorization implements AuthorizationInterface
{

    /**
     * {@inheritdoc}
     */
    public function authorize(AuthenticationInterface $authentication)
    {
    }
}
