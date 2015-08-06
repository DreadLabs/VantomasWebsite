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
 * ResourceInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ResourceInterface
{

    /**
     * sets the base url for the resource
     *
     * @param string $baseUrl
     *
     * @return void
     */
    public function setBaseUrl($baseUrl);

    /**
     * sets the resource signature and initiates the concrete resource implementation initialization
     *
     * @param string $resourceSignature
     *
     * @return void
     */
    public function setResourceSignature($resourceSignature);

    /**
     * sets the resource parameters
     *
     * @param array $parameters
     *
     * @return void
     */
    public function setParameters(array $parameters);

    /**
     * returns the URL which is build depending on the given parameters & base url
     *
     * @return string
     */
    public function getUrl();

    /**
     * returns the format of the given resource signature
     *
     * @return string
     */
    public function getFormat();
}
