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
     * Queries the API
     *
     * The concrete endpoint is resolved from $resourceSignature. It will get
     * the $parameters passed.
     *
     * @param string $resourceSignature Format is "topic/endpoint.format". E.g. forums/listPosts.json
     * @param array $parameters Resource parameters
     *
     * @return ResponseInterface
     */
    public function query($resourceSignature, array $parameters = array());
}
