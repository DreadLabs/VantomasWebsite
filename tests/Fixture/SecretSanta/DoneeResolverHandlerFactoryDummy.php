<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\FactoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;

/**
 * DoneeResolverHandlerFactoryDummy
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DoneeResolverHandlerFactoryDummy implements FactoryInterface
{

    /**
     * {@inheritdoc}
     */
    public function create($handlerName, ResolverHandlerInterface $nextHandler = null)
    {
    }
}
