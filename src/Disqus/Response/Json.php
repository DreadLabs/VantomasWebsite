<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Response;

/**
 * JSON response
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Json extends AbstractResponse
{

    /**
     * performs a json_decode() call on the passed $content parameter
     *
     * @param string $content
     *
     * @return void
     */
    public function setContent($content)
    {
        $this->content = json_decode($content);
    }
}
