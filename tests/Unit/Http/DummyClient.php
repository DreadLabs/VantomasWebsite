<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Http;

use DreadLabs\VantomasWebsite\Http\ClientInterface;
use DreadLabs\VantomasWebsite\Http\ResponseInterface;

class DummyClient implements ClientInterface
{

    /**
     * @param string $userAgent
     * @return void
     */
    public function setUserAgent($userAgent)
    {
        // TODO: Implement setUserAgent() method.
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setHeader($key, $value)
    {
        // TODO: Implement setHeader() method.
    }

    /**
     * @param string $url
     * @return void
     */
    public function get($url)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param string $uri
     * @param mixed $query
     * @return void
     */
    public function post($uri, $query)
    {
        // TODO: Implement post() method.
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        // TODO: Implement getStatus() method.
    }

    /**
     * @return string
     */
    public function getBody()
    {
        // TODO: Implement getBody() method.
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        // TODO: Implement getResponse() method.
    }
}
