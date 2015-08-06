<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Http;

use DreadLabs\VantomasWebsite\Http\ClientInterface;
use DreadLabs\VantomasWebsite\Http\ResponseInterface;

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
    public function setUserAgent($userAgent)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setHeader($key, $value)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function post($uri, $query)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
    }
}
