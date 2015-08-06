<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Twitter;

/**
 * CacheInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface CacheInterface
{

    /**
     * @param string $entryIdentifier
     *
     * @return boolean
     */
    public function has($entryIdentifier);

    /**
     * @param string $entryIdentifier
     * @param mixed $data
     * @param array $tags
     * @param int $lifetime
     *
     * @return void
     */
    public function set($entryIdentifier, $data, array $tags = array(), $lifetime = null);

    /**
     * @param string $entryIdentifier
     *
     * @return mixed
     */
    public function get($entryIdentifier);
}
