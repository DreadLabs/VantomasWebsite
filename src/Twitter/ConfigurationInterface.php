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
 * ConfigurationInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ConfigurationInterface
{

    /**
     * @return string
     */
    public function getUserAgent();

    /**
     * @return int
     */
    public function getBearerCacheLifetime();

    /**
     * @return string
     */
    public function getConsumerKey();

    /**
     * @return string
     */
    public function getConsumerSecret();

    /**
     * @return string
     */
    public function getBearerTokenUrl();
}
