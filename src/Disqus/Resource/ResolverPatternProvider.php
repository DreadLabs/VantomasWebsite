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
 * ResolverPatternProvider
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ResolverPatternProvider implements ResolverPatternProviderInterface
{

    /**
     * Returns the resolver pattern
     *
     * @return string
     */
    public function getPattern()
    {
        return 'DreadLabs\\VantomasWebsite\\Disqus\\Resource\\%s\\%s';
    }
}
