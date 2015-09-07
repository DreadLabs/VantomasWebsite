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

use DreadLabs\VantomasWebsite\Disqus\ClientInterface;
use DreadLabs\VantomasWebsite\Disqus\ResourceInterface;
use DreadLabs\VantomasWebsite\Disqus\ResponseInterface;

/**
 * Curl implementation for the API client
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Curl implements ClientInterface
{

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * holds the client API connection
     *
     * @var resource
     */
    protected $connection = null;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function connectTo(ResourceInterface $resource)
    {
        $this->connection = curl_init();

        if (false === $this->connection) {
            throw new Exception('Unable to create a new cURL connection handle', 1367315078);
        }

        curl_setopt($this->connection, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->connection, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->connection, CURLOPT_MAXREDIRS, 5);

        curl_setopt($this->connection, CURLOPT_URL, $resource->getUrl());

        $this->response->setFormat($resource->getFormat());
    }

    /**
     * {@inheritdoc}
     */
    public function send()
    {
        $result = curl_exec($this->connection);

        if (false === $result) {
            throw new Exception($this->getPreparedCurlErrorMessage(), 1367314822);
        }

        $this->response->setContent($result);
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * prepares the exception message if curl_exec() fails
     *
     * @return string
     */
    protected function getPreparedCurlErrorMessage()
    {
        $errorCode = curl_errno($this->connection);
        $errorMessage = curl_error($this->connection);

        return sprintf('An error occurred while querying the disqus API. Error: %s (%s)', $errorMessage, $errorCode);
    }

    /**
     * {@inheritdoc}
     */
    public function disconnect()
    {
        curl_close($this->connection);
    }
}
