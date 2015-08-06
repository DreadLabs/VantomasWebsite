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

use DreadLabs\VantomasWebsite\Disqus\ResourceInterface;

/**
 * DummyResource
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DummyResource implements ResourceInterface
{

    /**
     * {@inheritdoc}
     */
    public function setBaseUrl($baseUrl)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setResourceSignature($resourceSignature)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function setParameters(array $parameters)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat()
    {
    }
}
