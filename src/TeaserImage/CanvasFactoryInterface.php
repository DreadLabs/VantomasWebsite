<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\TeaserImage;

/**
 * CanvasFactoryInterface
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface CanvasFactoryInterface
{

    /**
     * Creates a teaser image canvas instance
     *
     * @param string $baseImage A valid base image resource string
     *
     * @return CanvasInterface
     */
    public function create($baseImage);
}
