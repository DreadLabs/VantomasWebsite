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

use DreadLabs\VantomasWebsite\Disqus\Client\AbstractClient;
use DreadLabs\VantomasWebsite\Disqus\ResourceInterface;

/**
 * DummyConcreteClient
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyConcreteClient extends AbstractClient
{

    /**
     * {@inheritdoc}
     */
    public function connectTo(ResourceInterface $resource)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function disconnect()
    {
    }
}
