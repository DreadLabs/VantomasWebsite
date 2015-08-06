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
 * The teaser image canvas
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
interface CanvasInterface
{

    /**
     * Initializes the canvas
     *
     * @return void
     */
    public function initialize();

    /**
     * Adds a layer to the canvas
     *
     * @param LayerInterface $layer
     *
     * @return void
     */
    public function addLayer(LayerInterface $layer);

    /**
     * Returns the rendered image resource
     *
     * @return string
     */
    public function render();
}
