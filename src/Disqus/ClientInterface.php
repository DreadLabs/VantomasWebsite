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
 * ClientInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ClientInterface
{

    /**
     * Tells the client to which endpoint it has to connect
     *
     * Implement this method to create ressources, set options of your 3rd party
     * client library etc.
     *
     * @param ResourceInterface $resource
     *
     * @return void
     */
    public function connectTo(ResourceInterface $resource);

    /**
     * Sends the actual request
     *
     * @return void
     */
    public function send();

    /**
     * Disconnects the client
     *
     * Implement this method to destroy ressources, perform cleanup tasks etc.
     *
     * @return void
     */
    public function disconnect();

    /**
     * Returns the response
     *
     * @return ResponseInterface
     */
    public function getResponse();
}
