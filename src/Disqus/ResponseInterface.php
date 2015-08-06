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
 * ResponseInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ResponseInterface
{

    /**
     * sets the response format which is necessary to initiate a concrete response
     *
     * Must initialize the concrete response implementation.
     *
     * @param string $format
     *
     * @return void
     */
    public function setFormat($format);

    /**
     * passes $content to the concrete response which performs further processing on it
     *
     * @param string $content
     *
     * @return void
     */
    public function setContent($content);

    /**
     * returns the response content
     *
     * @return \stdClass
     */
    public function getContent();
}
