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
 * Api interface.
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface ApiInterface
{

    /**
     * sets the client to use as API connection client
     *
     * @param string $clientName Client name in lower_underscored_format.
     *
     * @return ApiInterface
     */
    public function connectWith($clientName);

    /**
     * tells the API which resource to call
     *
     * @link http://disqus.com/api/docs/#resources full list of available DISQUS API resources.
     *
     * @param string $resourceSignature Format is: "topic/endpoint.format". E.g.: forums/listPosts.json.
     *
     * @return ApiInterface
     */
    public function execute($resourceSignature);

    /**
     * sets the resources parameters
     *
     * This method must set the API key.
     *
     * @param array $parameters Resource parameters
     *
     * @return ResponseInterface
     */
    public function with(array $parameters);
}
