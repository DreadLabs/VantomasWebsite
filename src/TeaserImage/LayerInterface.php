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
 * A teaser image layer
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface LayerInterface
{

    /**
     * @param mixed $width
     *
     * @return void
     */
    public function setWidth($width);

    /**
     * @param mixed $height
     *
     * @return void
     */
    public function setHeight($height);

    /**
     * @param mixed $minimumWidth
     *
     * @return void
     */
    public function setMinimumWidth($minimumWidth);

    /**
     * @param Offset $offset
     *
     * @return void
     */
    public function setOffset(Offset $offset);

    /**
     * Provides an array representation of the layer
     *
     * @return array
     */
    public function toArray();
}
