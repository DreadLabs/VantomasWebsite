<?php
namespace DreadLabs\VantomasWebsite\Http;

/**
 * Simple HTTP response interface
 */
interface ResponseInterface
{

    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @return array
     */
    public function getHeaders();

    /**
     * @return string
     */
    public function getBody();
}
