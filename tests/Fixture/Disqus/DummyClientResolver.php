<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Fixture\Disqus;

use DreadLabs\VantomasWebsite\Disqus\Client\ResolverInterface;

/**
 * DummyClientResolver
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyClientResolver implements ResolverInterface
{

    /**
     * {@inheritdoc}
     */
    public function resolve($clientName)
    {
    }
}
