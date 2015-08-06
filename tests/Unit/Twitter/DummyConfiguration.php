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

use DreadLabs\VantomasWebsite\Twitter\ConfigurationInterface;

/**
 * DummyConfiguration
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyConfiguration implements ConfigurationInterface
{

    /**
     * {@inheritdoc
     */
    public function getUserAgent()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBearerCacheLifetime()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getConsumerKey()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getConsumerSecret()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getBearerTokenUrl()
    {
    }
}
