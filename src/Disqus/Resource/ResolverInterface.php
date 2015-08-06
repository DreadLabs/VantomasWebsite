<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Resource;

/**
 * Resource resolver
 *
 * Use this in your application in order to resolve to proper
 * resource objects.
 *
 * @Thomas Juhnke <dev@van-tomas.de>
 */
interface ResolverInterface
{

    /**
     * Resolves a concrete resource by topic + action
     *
     * @param string $topic
     * @param string $action
     *
     * @return AbstractResource
     */
    public function resolve($topic, $action);
}
