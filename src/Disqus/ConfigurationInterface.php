<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus;

/**
 * ConfigurationInterface
 *
 * Describes the necessary data in order to send a proper resource
 * request to the Disqus API.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ConfigurationInterface
{

    /**
     * @return string
     */
    public function getBaseUrl();

    /**
     * @return string
     */
    public function getApiKey();
}
