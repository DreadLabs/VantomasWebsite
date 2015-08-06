<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;

/**
 * FactoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface FactoryInterface
{

    /**
     * Creates a ResolverHandler by given $name
     *
     * @param string $handlerName Name of the resolver handler to create
     * @param ResolverHandlerInterface $nextHandler Next handler for the resolver
     *
     * @return ResolverHandlerInterface
     */
    public function create($handlerName, ResolverHandlerInterface $nextHandler = null);
}
