<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Response;

/**
 * Response resolver
 *
 * Use this in your application to resolve proper response objects.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ResolverInterface
{

    /**
     * @param string $format
     *
     * @return AbstractResponse
     */
    public function resolve($format);
}
