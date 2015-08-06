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

use DreadLabs\VantomasWebsite\Disqus\Resource\AbstractResource;
use DreadLabs\VantomasWebsite\Disqus\Resource\ResolverInterface;

/**
 * DummyResourceResolver
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyResourceResolver implements ResolverInterface
{

    /**
     * {@inheritdoc}
     */
    public function resolve($topic, $action)
    {
    }
}
