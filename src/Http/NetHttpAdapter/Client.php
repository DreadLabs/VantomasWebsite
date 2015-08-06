<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Http\NetHttpAdapter;

use DreadLabs\VantomasWebsite\Http\ClientInterface;
use DreadLabs\VantomasWebsite\Http\ResponseInterface;

/**
 * Adapter to \Net_Http_Client
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Client implements ClientInterface
{

    /**
     * @var \Net_Http_Client
     */
    private $client;

    /**
     * @param \Net_Http_Client $client
     */
    public function __construct(\Net_Http_Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $userAgent
     *
     * @return void
     */
    public function setUserAgent($userAgent)
    {
        $this->client->setUserAgent($userAgent);
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function setHeader($key, $value)
    {
        $this->client->setHeader($key, $value);
    }

    /**
     * @param string $url
     *
     * @return ResponseInterface
     */
    public function get($url)
    {
        $this->client->get($url);

        return $this->createResponse();
    }

    /**
     * @return ResponseInterface
     */
    private function createResponse()
    {
        return new Response(
            $this->client->getStatus(),
            $this->client->getHeaders(),
            $this->client->getBody()
        );
    }

    /**
     * @param string $uri
     * @param mixed $query
     *
     * @return ResponseInterface
     */
    public function post($uri, $query)
    {
        $this->client->post($uri, $query);

        return $this->createResponse();
    }
}
