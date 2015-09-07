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
 * ResolverPatternProviderInterface
 *
 * Allows exchanging the namespace pattern for the resource
 * resolver. This defaults to a namespace pattern provider
 * with the namespace set to this package.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ResolverPatternProviderInterface
{

    /**
     * Returns the resolver pattern
     *
     * @return string
     */
    public function getPattern();
}
