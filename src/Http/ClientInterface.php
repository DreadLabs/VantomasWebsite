<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Http;

/**
 * Simple HTTP client interface.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ClientInterface
{

    /**
     * @param string $userAgent
     *
     * @return void
     */
    public function setUserAgent($userAgent);

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function setHeader($key, $value);

    /**
     * @param string $url
     *
     * @return ResponseInterface
     */
    public function get($url);

    /**
     * @param string $uri
     * @param mixed $query
     *
     * @return ResponseInterface
     */
    public function post($uri, $query);
}
