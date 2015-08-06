<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter;

use DreadLabs\VantomasWebsite\Twitter\CacheInterface;

/**
 * DummyCache
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyCache implements CacheInterface
{

    /**
     * {@inheritdoc}
     */
    public function has($entryIdentifier)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function set($entryIdentifier, $data, array $tags = array(), $lifetime = null)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function get($entryIdentifier)
    {
    }
}
