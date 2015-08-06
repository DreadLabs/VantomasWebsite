<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Client;

/**
 * API Client resolver interface
 *
 * Use this within your application to resolve a proper API client.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ResolverInterface
{

    /**
     * Resolves a concrete client implementation
     *
     * @param string $clientName
     *
     * @return AbstractClient
     */
    public function resolve($clientName);
}
