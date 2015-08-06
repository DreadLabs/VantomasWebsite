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

use DreadLabs\VantomasWebsite\Http\ResponseInterface;

/**
 * Adapter to \Net_Http_Response
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Response implements ResponseInterface
{

    /**
     * @var \Net_Http_Response
     */
    private $response;

    /**
     * @param int $status
     * @param array $headers
     * @param string $body
     */
    public function __construct($status, array $headers, $body = '')
    {
        $this->response = new \Net_Http_Response((int) $status, $headers, $body);
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatus();
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->response->getBody();
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->response->getHeaders();
    }
}
