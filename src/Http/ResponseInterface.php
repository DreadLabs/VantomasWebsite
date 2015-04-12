<?php
namespace DreadLabs\VantomasWebsite\Http;

/**
 * Simple HTTP response interface
 */
interface ResponseInterface
{

    /**
     * @return string
     */
    public function getBody();
}
