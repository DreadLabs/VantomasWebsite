<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Client;

use DreadLabs\VantomasWebsite\Disqus\ResourceInterface;
use DreadLabs\VantomasWebsite\Disqus\ResponseInterface;

/**
 * Abstract Disqus API client
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
abstract class AbstractClient
{

    /**
     * tells the client to which endpoint it has to connect
     *
     * @param ResourceInterface $resource
     *
     * @return void
     */
    abstract public function connectTo(ResourceInterface $resource);

    /**
     * returns the response for further processing or simple content fetching
     *
     * @return ResponseInterface
     */
    abstract public function getResponse();

    /**
     * disconnects the client
     *
     * Implement library dependent cleanup and disconnect logic here
     *
     * @return void
     */
    abstract public function disconnect();
}
