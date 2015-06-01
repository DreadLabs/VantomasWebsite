<?php
namespace DreadLabs\VantomasWebsite\Http;

/**
 * Simple HTTP client interface.
 */
interface ClientInterface
{

    /**
     * @param string $userAgent
     * @return void
     */
    public function setUserAgent($userAgent);

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setHeader($key, $value);

    /**
     * @param string $url
     * @return ResponseInterface
     */
    public function get($url);

    /**
     * @param string $uri
     * @param mixed $query
     * @return ResponseInterface
     */
    public function post($uri, $query);
}
