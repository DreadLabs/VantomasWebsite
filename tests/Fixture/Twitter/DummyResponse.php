<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Fixture\Twitter;

use DreadLabs\VantomasWebsite\Http\ResponseInterface;

/**
 * DummyResponse
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyResponse implements ResponseInterface
{

    /**
     * {@inheritdoc}
     */
    public function getBody()
    {
        return file_get_contents(__DIR__ . '/DummyToken.json');
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusCode()
    {
        return 200;
    }

    /**
     * {@inheritdoc}
     */
    public function getHeaders()
    {
    }
}
