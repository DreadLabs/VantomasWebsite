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

use DreadLabs\VantomasWebsite\Disqus\ClientInterface;
use DreadLabs\VantomasWebsite\Disqus\ResourceInterface;
use DreadLabs\VantomasWebsite\Disqus\ResponseInterface;

/**
 * DummyClient
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyClient implements ClientInterface
{

    /**
     * {@inheritdoc}
     */
    public function connectWith($clientName)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function connectTo(ResourceInterface $resource)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function send()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function disconnect()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
    }
}
